<?php
/**
 * Class HomePresenterTest
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */
namespace Flame\Tester\Example;

use Flame\Tester\SeleniumTestCase;

$container = require __DIR__ . '/bootstrap.php';

class HomePresenterTest extends SeleniumTestCase
{


	public function testOpen()
	{
		$this->open('http://www.facebook.com');
	}

}

id(new HomePresenterTest)->run();