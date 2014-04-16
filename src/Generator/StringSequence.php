<?php

namespace Generator;

class StringSequence extends IntegerSequence
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @param string $string
     * @param int $step
     */
    public function __construct($string = '{n}', $step = 1)
    {
        parent::__construct($step);
        $this->string = $string;
    }

    /**
     * @return mixed|void
     */
    public function generate()
    {
        $value = parent::generate();
        return preg_replace('/\{n\}/', $value, $this->string);
    }
}
