# PHP-II Class Notes

## TODO
* reinstall the database

## HOMEWORK
* For Sun 17 Nov 2019
  * Review the OrderApp
  * Do all the database labs
  * http://collabedit.com/5dt6j
* For Thu 14 Nov 2019
  * Abe: Lab: Build Custom Exception Class
  * Charlene: Lab: Traits
  * http://collabedit.com/rtsax
* For Tue 12 Nov 2019
  * Charlene: Lab: Type Hinting
  * http://collabedit.com/wuesq
  * NOTE: please have a look here first: https://github.com/dbierer/php-ii-nov-2019/tree/master/Homework/Charlene
    * I made a few slight changes to your namespace structuring to make it more generic

* For Sun 10 Nov 2019
  * Charlene: Magic Lab
  * Abe: Abstract Classes and Methods Lab
  * All: Lab: Interfaces
  * http://collabedit.com/dgra2
* For Thu 7 Nov 2019
  * All: Lab: Create a Class
  * Abe: Lab: Create an Extensible Super Class
  * http://collabedit.com/u8u24
* For Tue 5 Nov 2019
  * Get VM up and running
  * ALL: Lab: Namespace

## CLASS NOTES
* Traits
  * NOTE: often you will find traits and interfaces are used together
  * https://github.com/zendframework/zend-eventmanager/blob/master/src/EventManagerAwareTrait.php
  * https://github.com/zendframework/zend-eventmanager/blob/master/src/EventManagerAwareInterface.php
* Static
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_static.php
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_static_storage_exercise.php
  * Singleton:
    * https://en.wikipedia.org/wiki/Singleton_pattern
    * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_singleton_getinstance_example.php

* Log Files
  * For the VM: it's straight Apache, so: `/var/log/apache2/error.log`
  * For Zend Server: `/usr/local/zend/var/log/php.log`
* Example of Throwable
```
<?php
$args = ['dsn' => 'xxx', 'user' => 'yyy', 'pwd' => 'zzz'];
try {
	$pdo = new PDO($args['dsn'], $args['user'], $args['pwd']);
	//$pdo = new PDO();
} catch (Exception $e) {
	echo get_class($e) . ':' . $e->getMessage();
} catch (Error $e) {
	echo get_class($e) . ':' . $e->getMessage();
} catch (Throwable $e) {
	echo get_class($e) . ':' . $e->getMessage();
}
echo PHP_EOL;
```

* Creating pull requests on github: https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request

* Running stand-alone PHP webserver:
```
cd /path/to/desired/project
php -S localhost:9999
````
* Modify the `php.ini` file to add `display_errors=on`
```
sudo gedit /etc/php/7.3/cli/php.ini
```

* Composer
  * https://packagist.org/
* Autoloading examples
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_autoload_example.php
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_autoload_class_example.php
* Magic Methods
  * https://www.php.net/manual/en/language.oop5.magic.php
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_magic_get_set.php
* Interfaces
  * Example: https://github.com/zendframework/zend-db/blob/master/src/Adapter/AdapterInterface.php
