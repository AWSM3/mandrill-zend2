<?php
/**
 * AbstractStruct.php
 * Freax, started: Oct 26, 2015 4:52:43 PM.
 *
 * @author based on https://github.com/jlinn/mandrill-api-php
 *
 * @see https://mandrillapp.com/api/docs/
 */

/**
 * @namespace
 */
namespace Mandrill\Struct;

/**
 * Class AbstractStruct.
 */
abstract class AbstractStruct implements \IteratorAggregate
{
    /**
     * Create a Struct from an associative array.
     *
     * @param array $data   associative array array('property'=>data)
     * @param bool  $filter (optional) if true, $data array keys which are not defined as properties in the Struct will be ignored
     *
     * @return AbstractStruct
     */
    public static function fromArray(array $data, $filter = false)
    {
        $class = get_called_class();
        $object = new static();

        foreach ($data as $key => $value) {
            if (!$filter || property_exists($class, $key)) {
                $object->$key = $value;
            }
        }

        return $object;
    }

    /**
     * @return array associative array of property=>value pairs
     */
    public function toArray()
    {
        $reflection = new \ReflectionClass($this);
        $publicProperties = $reflection->getProperties(~\ReflectionProperty::IS_STATIC & \ReflectionProperty::IS_PUBLIC);

        $properties = [];

        foreach ($publicProperties as $property) {
            if (!$property->isStatic() && $property->getValue($this) !== null) {
                $properties[$property->getName()] = $property->getValue($this);
            }
        }

        return $properties;
    }

    /**
     * Retrieve an external iterator.
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     *
     * @return \Traversable an instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }
}
