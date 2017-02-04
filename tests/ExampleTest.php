<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/index')
             ->see('Cili.Cili');
    }

    public function testDatabase()
    {
        $this->seeInDatabase('users', ['email' => 'admin123@example.com']);
    }
}
