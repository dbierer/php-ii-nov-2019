# PHP-II Class Notes

## HOMEWORK
* For Thu 21 Nov 2019
  * Lab: Create Regex for Validating Email Address
  * collabedit.com/ex6q4
* For Tue 19 Nov 2019
  * Abe: Lab: Email
  * Charlene: Lab: Composer
  * http://collabedit.com/gwhf4
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
* Regex examples:
  * https://github.com/dbierer/classic_php_examples/tree/master/regex
  * https://github.com/dbierer/php7_examples/blob/master/php_7_0/preg_replace_callback_array.php
  * RFC 5322 for email: https://tools.ietf.org/html/rfc5322
  * https://www.regextester.com/97668
  * https://emailregex.com/
* `preg_replace_callback_array()` example
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter01/chap_01_php5_to_php7_code_converter.php
  * https://github.com/dbierer/php7cookbook/blob/master/source/Application/Parse/Convert.php
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter01/chap_01_php5_to_php7_code_converter_test_file.php
* Composer:
  * Composer itself: https://getcomposer.org/
  * Packages: https://packagist.org/
* ETag Example: https://github.com/dbierer/classic_php_examples/blob/master/web/etag.php
* "Official" list HTTP headers: https://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14
  * Example of setting the content type to JSON:
```
header('Content-Type: application/json');
$data = ['status' => 'success', 'value' => 12345];
echo json_encode($data);
```

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
* Example of searching for contents of an `<a href="xxx">yyy</a>` tag:
```
<?php
$string = [
	'<a href="http://zend.com/">xxx</a>',
	"<a href='https://roguewave.com/'>yyy</a>",
	'<a title="test" href="https://perforce.com/">zzz</a>',
];
$pattern = '!<a.*?href=("|\')(.*?)("|\')>(.*?)</a>!';
foreach ($string as $item) {
	echo $item . ':';
	preg_match($pattern, $item, $matches);
	var_dump($matches);
	echo PHP_EOL;
}

```
* Another example using `^` inside the square brackets
```
<?php
$string = [
	'12345',
	'Number 456',
	'Alpha Only',
];
$pattern = '/^[^A-Za-z ]+$/';
foreach ($string as $item) {
	echo $item . ':';
	$result = preg_match($pattern, $item, $matches);
	echo ($result) ? 'MATCH' : 'NO MATCH';
	echo PHP_EOL;
	var_dump($matches);
	echo PHP_EOL;
}

```
* Example of using the object to get its own JSON + error trapping
```
<?php
class Test
{
	public $first = 'Fred';
	public $last = 'Flintstone';
	protected $status = 'Caveman';
	private $address = '123 Granite Lane';
	private $password = 'password';
	public $amount = 123.00;

	public function getFullName()
	{
		return $this->first . ' ' . $this->last;
	}
	public function getSerialized()
	{
		return serialize($this);
	}
	public function getJson()
	{
		ob_start();
		$result = '';
		try {
			$data = get_object_vars($this);
			$status = 200;
		} catch (Throwable $t) {
			$status = 500;
			$data   = ['error'];
		}
		$output = ob_get_contents();
		error_log(__METHOD__ . ':' . $output);
		ob_end_clean();
		return json_encode(['status' => $status, 'data' => $data], JSON_PRETTY_PRINT | JSON_PRESERVE_ZERO_FRACTION);
	}
}

$test = new Test();
echo $test->getFullName();
echo PHP_EOL;

$json = $test->getJson();
echo $json;
$result = json_decode($json);
echo PHP_EOL;
var_dump($result);

// Notice the diff using PHP serialize
$string = $test->getSerialized();
echo $string;
$result = unserialize($string);
echo PHP_EOL;
var_dump($result);
echo $result->getFullName();

```
* Using negative offsets to remove unwanted syntax:
```
<?php
$fields = ['first','last','status','date'];
$sql = 'SELECT ';
foreach ($fields as $item) $sql .= $item . ',';
if ($sql[-1] == ',') $sql = substr($sql, 0, -1);
$sql .= ' FROM users';
echo $sql;
```
