<?php
/**
 * PHP version 5.6, 7.X
 *
 *
 * @package andydune/array-to-object-fields-mapper
 * @link  https://github.com/AndyDune/ArrayToObjectFieldsMapper for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2018 Andrey Ryzhov
 */


namespace AndyDune\ArrayToObjectFieldsMapper;

class ClassMetaDataMapper
{

    protected $object;
    protected $class;

    static $reflectionsForClass = [];

    public function __construct($object)
    {
        $this->object = $object;
        $this->class = get_class($object);
    }

    public function setArray($array)
    {
        $class = $this->getReflectionForClass();
        $properties = $class->getProperties();
        /** @var \ReflectionProperty $property */
        foreach($properties as $property) {
            $comment = $property->getDocComment();
            if (!$comment) {
                continue;
            }

            if (!preg_match('/@field\s*=\s*([a-z_0-9]+)\s*\r?\n/mui', $comment, $matches)){
                continue;
            }
            $field = $matches[1];
            if (!array_key_exists($field, $array)) {
                continue;
            }
            $property->setAccessible(true);
            $property->setValue($this->object, $array[$field]);
        }
    }

    public function getArray()
    {
        $array = [];
        $class = $this->getReflectionForClass();
        $properties = $class->getProperties();
        /** @var \ReflectionProperty $property */
        foreach($properties as $property) {
            $comment = $property->getDocComment();
            if (!$comment) {
                continue;
            }

            if (!preg_match('/@field\s*=\s*([a-z_0-9]+)\s*\r?\n/mui', $comment, $matches)){
                continue;
            }
            $field = $matches[1];

            $property->setAccessible(true);
            $array[$field] = $property->getValue($this->object);
        }
        return $array;
    }

    protected function getReflectionForClass()
    {
        if (array_key_exists($this->class, self::$reflectionsForClass)) {
            return self::$reflectionsForClass[$this->class];
        }
        self::$reflectionsForClass[$this->class] = new \ReflectionClass($this->class);
        return self::$reflectionsForClass[$this->class];
    }


}