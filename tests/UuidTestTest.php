<?php
use App\Services\UuidService;

class UuidTestTest extends TestCase
{
    public function testUuid()
    {
        // Generate a version 5, name-based using SHA-1 hashing, UUID
        print UuidService::generate(5,'test2', UuidService::NS_DNS);
        $this->assertEquals(1,1);
    }

    public function testPass()
    {
        print bcrypt('admin123');
    }
}
