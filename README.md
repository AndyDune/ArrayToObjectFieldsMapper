# ArrayToObjectFieldsMapper

[![Build Status](https://travis-ci.org/AndyDune/ArrayToObjectFieldsMapper.svg?branch=master)](https://travis-ci.org/AndyDune/ArrayToObjectFieldsMapper)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/andydune/array-to-object-fields-mapper.svg?style=flat-square)](https://packagist.org/packages/andydune/array-to-object-fields-mapper)
[![Total Downloads](https://img.shields.io/packagist/dt/andydune/array-to-object-fields-mapper.svg?style=flat-square)](https://packagist.org/packages/andydune/array-to-object-fields-mapper)


It maps array data to object fields and vise versa.

Data was retrieved from db. Next I need to work with it, edit it and update. 
It is better to encapsulate data in object witch control data and describe it.

```php
use AndyDune\ArrayToObjectFieldsMapper\ClassMetaDataMapper;
use AndyDune\ArrayToObjectFieldsMapper\Example\SimpleData;

$simpleExample = new SimpleData();

$array = [
    'ID' => 12,
    'TYPE' => 'good'
];

$mapper = new ClassMetaDataMapper($simpleExample);
$mapper->setArray($array);

$simpleExample->getId(); // 12
$simpleExample->getType(); // good
```  
