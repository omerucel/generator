<?php

namespace Generator\Fake;

use Generator\BaseBuilder;
use Generator\IntegerSequence;
use Generator\RandomItem;
use Generator\RandomNumber;
use Generator\StringSequence;

class ModelBuilder extends BaseBuilder
{
    protected function init()
    {
        $this->setGenerator('id', new IntegerSequence())
            ->setGenerator('name', new StringSequence('name{n}'))
            ->setGenerator('age', new RandomNumber(18, 50))
            ->setGenerator('gender', new RandomItem(array('male', 'female')));
    }

    public function build()
    {
        $model = new Model();
        $model->id = $this->generateFor('id');
        $model->name = $this->generateFor('name');
        $model->age = $this->generateFor('age');
        $model->gender = $this->generateFor('gender');

        return $model;
    }
}
