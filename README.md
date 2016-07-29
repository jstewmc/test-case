# test-case
Access private properties in unit tests.

```php
use Jstewmc\TestCase\TestCase;

class Test extends TestCase
{
    public function testFoo()
    {
        $class = new class { private $foo = 'bar'; };
        
        $this->assertEquals('bar', $this->getProperty('foo', $class));
        
        return;
    }    
}
```

## License

[MIT](https://github.com/jstewmc/test-case/blob/master/LICENSE)

## Author

[Jack Clayton](mailto:clayjs0@gmail.com)

## Version 

### 0.1.0, July 28, 2016

* Initial release
