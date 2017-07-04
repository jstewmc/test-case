<?php
/**
 * The file for the test-case
 *
 * @author     Jack Clayton <claysj0@gmail.com>
 * @copyright  2016 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\TestCase;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase as Test;
use ReflectionObject;

/**
 * The test-case
 *
 * @since  0.1.0
 */
class TestCase extends Test
{
    /* !Public methods */
    
    /**
     * Gets a private property's value
     *
     * @param   string  $name    the property's name
     * @param   mixed   $object  the property's object
     * @return  mixed
     * @param   InvalidArgumentException  if $object is not an object
     * @throws  InvalidArgumentException  if $name is not a property of $object
     * @since   0.1.0
     */
    public static function getProperty(string $name, $object)
    {
        // if $object is not an object, short-circuit
        if ( ! is_object($object)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter two, object, to be an object"
            );    
        }
        
        $class = new ReflectionObject($object);
        
        // if $name is not a property of $object, short-circuit
        if ( ! $class->hasProperty($name)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter one, name, to be a property of "
                    . "class " . get_class($object)
            );
        }
        
        // otherwise, get the property's value
        $property = $class->getProperty($name);
        $property->setAccessible(true);
        
        return $property->getValue($object);
    }
    
    /**
     * Sets a private property's value
     *
     * @param   string  $name    the property's name
     * @param   mixed   $object  the property's object
     * @param   mxied   $value   the property's value
     * @return  mixed
     * @param   InvalidArgumentException  if $object is not an object
     * @throws  InvalidArgumentException  if $name is not a property of $object
     * @since   0.1.0
     */
    public static function setProperty(string $name, $object, $value)
    {
        // if $object is not an object, short-circuit
        if ( ! is_object($object)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter two, object, to be an object"
            );    
        }
        
        $class = new ReflectionObject($object);
        
        // if $name is not a property of $object, short-circuit
        if ( ! $class->hasProperty($name)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter one, name, to be a property of "
                    . "class " . get_class($object)
            );
        }
        
        $property = $class->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($object, $value);
        
        return;
    } 
}
