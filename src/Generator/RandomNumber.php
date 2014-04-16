<?php

namespace Generator;

class RandomNumber implements IGenerator
{
    /**
     * @var int
     */
    protected $min = 0;

    /**
     * @var int
     */
    protected $max = 0;

    /**
     * @param $min
     * @param $max
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        return rand($this->min, $this->max);
    }
}
