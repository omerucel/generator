<?php

namespace Generator;

class RandomItemTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new RandomItem(array('a', 'b', 'c'));
        $this->assertContains($generator->generate(), array('a', 'b', 'c'));
        $this->assertContains($generator->generate(), array('a', 'b', 'c'));
        $this->assertContains($generator->generate(), array('a', 'b', 'c'));
    }
}
