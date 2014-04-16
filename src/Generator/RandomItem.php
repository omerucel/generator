<?php

namespace Generator;

class RandomItem implements IGenerator
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
        $this->count = count($array);
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        return $this->array[rand(0, $this->count - 1)];
    }
}
