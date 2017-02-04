<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Predis\Client;

class RedisTest extends TestCase
{
    protected $redis;

    public function setUp()
    {
        parent::setUp();

        $this->redis = new Client(array(
        'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 15
        ));
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->redis->flushdb();
    }

    /**
     * 普通set/get操作
     *
     * @return void
     */
    public function testString()
    {
        // set and get 操作
        $this->redis->set('info', 'this is a test db');
        $actual = $this->redis->get('info');
        $this->assertEquals('this is a test db', $actual);
        // append 连接到已存在字符串
        $this->redis->append('info','_123'); //返回累加后的字符串
        $actual = $this->redis->get('info');
        $this->assertEquals('this is a test db_123', $actual);
    }

    public function testExist()
    {
        $this->redis->set('foo', 1);
        $actual = $this->redis->exists('foo');
        $this->assertEquals(1, $actual);
    }

    public function testInc()
    {
        $this->redis->set('foo',1);
        $this->redis->incr('foo');
        $actual = $this->redis->get('foo');
        $this->assertEquals(2, $actual);

        $this->redis->incrby('foo',2);
        $actual = $this->redis->get('foo');
        $this->assertEquals(4, $actual);
    }

    public function testBit()
    {
        $this->redis->setbit('binary',31,1);  //表示在第31位存入1
        $actual = $this->redis->getbit('binary',31);    //返回1
        $this->assertEquals(1, $actual);
    }

    public function testTtl()
    {
        $this->redis->set('time', 'hello');
        $this->redis->expire('time', 1); //设置有效期为1秒
        $actual = $this->redis->ttl('time'); //返回有效期值1s
        $this->assertEquals(1, $actual);
        $this->redis->persist('time'); //取消expire行为
        $actual = $this->redis->ttl('time'); //返回有效期值1s
        $this->assertNotEquals(1, $actual);
    }

    public function testList()
    {
        $this->redis->rpush('fooList', 'bar1'); //返回一个列表的长度1
        $this->redis->lpush('fooList', 'bar0'); //返回一个列表的长度2
        $this->redis->rpushx('fooList', 'bar2'); //返回3,rpushx只对已存在的队列做添加,否则返回0
        // llen返回当前列表长度
        $actual = $this->redis->llen('fooList');
        $this->assertEquals(3, $actual);
        // lrange 返回队列中一个区间的元素
        $actual = $this->redis->lrange('fooList', 0, 1); //返回数组包含第0个至第1个共2个元素
        $this->assertEquals(array('bar0', 'bar1'), $actual);
        $actual = $this->redis->lrange('fooList', 0, -1);//返回第0个至倒数第一个,相当于返回所有元素,注意redis中很多时候会用到负数,下同
        $this->assertEquals(array('bar0', 'bar1', 'bar2'), $actual);
    }

    public function testZset()
    {
        //sadd 增加元素,并设置序号,返回true,重复返回false
        $this->redis->zadd('zsets',1,'ab');
        $this->redis->zadd('zsets',2,'cd');
        $this->redis->zadd('zsets',3,'ef');

        //返回11
        $actual = $this->redis->zincrby('zsets',10,'ab');
        $this->assertEquals(11, $actual);

        //zrem 移除指定元素
        $actual = $this->redis->zrem('zsets','ef'); //true or false
        $this->assertEquals(1, $actual);

        $actual = $this->redis->zrange('zsets', 0, -1);
        // 从小到大
        $this->assertEquals(array( 'cd', 'ab'), $actual);

        //zrevrange 同上,返回表中指定区间的元素,按次序倒排
        $actual = $this->redis->zrevrange('zsets', 0, -1); //元素顺序和zrange相反
        // 得分高的在前
        $this->assertEquals(array('ab', 'cd'), $actual);

        // 统计个数
        $actual = $this->redis->zcard('zsets');
        $this->assertEquals(2, $actual);
    }
}
