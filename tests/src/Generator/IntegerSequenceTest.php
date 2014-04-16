<?php

namespace Generator;

class IntegerSequenceTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $generator = new IntegerSequence();
        $this->assertEquals(1, $generator->generate());
        $this->assertEquals(2, $generator->generate());
    }

    public function testGenerateCustomStep()
    {
        $generator = new IntegerSequence(2);
        $this->assertEquals(2, $generator->generate());
        $this->assertEquals(4, $generator->generate());
    }
}
