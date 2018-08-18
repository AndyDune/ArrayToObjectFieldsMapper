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

namespace AndyDune\ArrayToObjectFieldsMapper\Example;


class SimpleData
{
    /**
     * @field=TYPE
     */
    protected $type;

    /**
     * @field=ID
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}