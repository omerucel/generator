<?php

namespace Generator;

abstract class BaseBuilder
{
    /**
     * @var array
     */
    protected $generators = array();

    public function __construct()
    {
        $this->init();
    }

    /**
     * @return mixed
     */
    abstract protected function init();

    /**
     * @return mixed
     */
    abstract public function build();

    /**
     * @param $name
     * @param IGenerator $generator
     * @return $this
     */
    public function setGenerator($name, IGenerator $generator)
    {
        $this->generators[$name] = $generator;
        return $this;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function generateFor($name)
    {
        return $this->getGenerator($name)->generate();
    }

    /**
     * @param $name
     * @return IGenerator
     * @throws \Exception
     */
    public function getGenerator($name)
    {
        if (!isset($this->generators[$name])) {
            throw new \Exception('Generator(' . $name . ') not found!');
        }

        return $this->generators[$name];
    }
}
