<?php

namespace Generator;

class IntegerSequence implements IGenerator
{
    /**
     * @var int
     */
    protected $counter = 0;

    /**
     * @var int
     */
    protected $step = 1;

    /**
     * @param int $step
     */
    public function __construct($step = 1)
    {
        $this->step = $step;
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        return $this->counter = $this->counter + $this->step;
    }
}
