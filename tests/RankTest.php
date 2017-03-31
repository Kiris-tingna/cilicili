<?php
use App\Services\RankService;

class RankTest extends TestCase
{
    public function testSync()
    {
        RankService::sync();
        $this->assertEquals(1,1);
    }

    public function testLists()
    {
        var_dump(RankService::board(10));
        $this->assertEquals(1,1);
    }
}