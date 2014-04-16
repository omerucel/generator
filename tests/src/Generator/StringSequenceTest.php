<?php

namespace Generator;

class StringSequenceTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new StringSequence();
        $this->assertEquals('1', $generator->generate());
        $this->assertEquals('2', $generator->generate());
    }

    public function testGenerateCustomString()
    {
        $generator = new StringSequence('name{n}');
        $this->assertEquals('name1', $generator->generate());
        $this->assertEquals('name2', $generator->generate());
    }

    public function testGenerateCustomStep()
    {
        $generator = new StringSequence('name{n}', 2);
        $this->assertEquals('name2', $generator->generate());
        $this->assertEquals('name4', $generator->generate());
    }
}
