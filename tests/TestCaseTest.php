<?php
/**
 * The file for the test-case tests
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2016 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\TestCase;

/**
 * The tests for the test-case
 */
class TestCaseTest extends \PHPUnit_Framework_TestCase
{
    /* !getProperty() */
    
    /**
     * getProperty() should throw exception if $object is not object
     */
    public function testGetPropertyThrowsExceptionIfObjectIsNotObject()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        (new TestCase())::getProperty('foo', 'bar');
        
        return;
    }
    
    /**
     * getProperty() should throw exception if $name is not property of object
     */
    public function testGetPropertyThrowsExceptionIfNameIsNotProperty()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        (new TestCase())::getProperty('foo', new class {});
    }
    
    /**
     * getProperty() should return value if $name is property of object
     */
    public function testGetPropertyReturnsValueIfNameIsProperty()
    {
        return $this->assertEquals(
            'bar', 
            (new TestCase())::getProperty('foo', new class { private $foo = 'bar'; })
        );
    }
    
    
    /* !setProperty() */
    
    /**
     * setProperty() should throw exception if $object is not object
     */
    public function testSetPropertyThrowsExceptionIfObjectIsNotObject()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        (new TestCase())::setProperty('foo', 'bar', 'baz');
        
        return;
    }
    
    /**
     * setProperty() should throw exception if $name is not property of object
     */
    public function testSetPropertyThrowsExceptionIfNameIsNotProperty()
    {
        $this->setExpectedException('InvalidArgumentException');
        
        (new TestCase())::setProperty('foo', new class {}, 'bar');
    }
    
    /**
     * setProperty() should if $name is property of object
     */
    public function testSetPropertyIfNameIsProperty()
    {
        // define the class
        $class = new class { private $foo; };
        
        // set the property
        (new TestCase())::setProperty('foo', $class, 'bar');
        
        // use reflection to test
        $reflection = new \ReflectionObject($class);
        $property = $reflection->getProperty('foo');
        $property->setAccessible(true);
        
        $this->assertEquals('bar', $property->getValue($class));
        
        return;
    }
}
