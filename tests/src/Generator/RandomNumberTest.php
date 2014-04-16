<?php

namespace Generator;

class RandomNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new RandomNumber(0, 3);
        $this->assertContains($generator->generate(), array(0, 1, 2, 3));
        $this->assertContains($generator->generate(), array(0, 1, 2, 3));
        $this->assertContains($generator->generate(), array(0, 1, 2, 3));
        $this->assertContains($generator->generate(), array(0, 1, 2, 3));
        $this->assertContains($generator->generate(), array(0, 1, 2, 3));
    }
}
