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

### 2.0.0, July 4, 2017

* Update PHPUnit's major version from `^5.4` to `^6.2`.

### 1.0.0, August 13, 2016

* Stable release

### 0.1.0, July 28, 2016

* Initial release
