<?php

namespace Generator;

include_once 'Fake/Model.php';
include_once 'Fake/ModelBuilder.php';

use Generator\Fake\ModelBuilder;

class BaseBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BaseBuilder
     */
    protected $builder;

    protected function setUp()
    {
        $this->builder = $this->getMockBuilder('Generator\BaseBuilder')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
    }

    public function testSetterGetterGenerate()
    {
        $this->builder->setGenerator('id', new IntegerSequence());
        $this->assertInstanceOf('Generator\IntegerSequence', $this->builder->getGenerator('id'));
        $this->assertEquals(1, $this->builder->generateFor('id'));
        $this->assertEquals(2, $this->builder->generateFor('id'));
    }

    public function testGeneratorNotFound()
    {
        $this->setExpectedException('\Exception', 'Generator(name) not found!');
        $this->builder->getGenerator('name');
    }

    public function testInit()
    {
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
    }
}
