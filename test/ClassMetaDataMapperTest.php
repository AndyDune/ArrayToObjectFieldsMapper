<?php
/**
 * ----------------------------------------------
 * | Author: Andrey Ryzhov (Dune) <info@rznw.ru> |
 * | Site: www.rznw.ru                           |
 * | Phone: +7 (4912) 51-10-23                   |
 * | Date: 18.08.2018                            |
 * -----------------------------------------------
 *
 */


namespace AndyDuneTest\ArrayToObjectFieldsMapper;


use AndyDune\ArrayToObjectFieldsMapper\ClassMetaDataMapper;
use AndyDune\ArrayToObjectFieldsMapper\Example\SimpleData;
use PHPUnit\Framework\TestCase;

class ClassMetaDataMapperTest extends TestCase
{
    public function testWithSimpleExample()
    {
        $simpleExample = new SimpleData();

        $array = [
            'ID' => 12,
            'TYPE' => 'good'
        ];

        $mapper = new ClassMetaDataMapper($simpleExample);
        $mapper->setArray($array);

        $this->assertEquals(12, $simpleExample->getId());
        $this->assertEquals('good', $simpleExample->getType());
    }
}