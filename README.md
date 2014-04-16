[![Build Status](https://secure.travis-ci.org/omerucel/generator.png)](http://travis-ci.org/omerucel/generator)

# About

Data generator library for PHP.

# Requirements

- PHP 5.3+

# Usage

This is the sample model builder class. You must create for your models.
```php
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

$builder = new ModelBuilder();
$model = $builder->build();

$this->assertInstanceOf('Generator\Fake\Model', $model);
$this->assertEquals(1, $model->id);
$this->assertEquals('name1', $model->name);
$this->assertTrue($model->age > 17 && $model->age < 51);
$this->assertTrue($model->gender == 'male' || $model->gender == 'female');

$model = $builder->build();
$this->assertInstanceOf('Generator\Fake\Model', $model);
$this->assertEquals(2, $model->id);
$this->assertEquals('name2', $model->name);
$this->assertTrue($model->age > 17 && $model->age < 51);
$this->assertTrue($model->gender == 'male' || $model->gender == 'female');
```

# Installation

conposer.json:
```json
{
    "require-dev": {
        "omerucel/generator": "dev-master"
    },
}
```

```bash
$ composer install
```

# TODO

[ ] Regex generator.

# License

The MIT License (MIT)

Copyright © Ömer ÜCEL 2014

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
