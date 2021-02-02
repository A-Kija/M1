<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Author;

class MySuperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $author = new Author;
        
        $this->assertInstanceOf('App\Models\Book', $author);
    }

    public function test_example1()
    {
        $this->assertTrue(true);
    }
}
