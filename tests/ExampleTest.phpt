<?php
/**
 * Class ExampleTest
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium\Tests;


use Flame\Tester\Selenium\TestCase;
use Flame\WebDriverBy;
use Tester\Assert;

$container = require __DIR__ . '/bootstrap.php';

class ExampleTest extends TestCase
{

	/** @var string */
	protected $testingUrl = 'jsifalda.name';

	public function testName()
	{
		$this->open();

		Assert::equal(
			'Jiří Šifalda',
			$this->driver->findElement(WebDriverBy::className('nine'))
			->findElement(WebDriverBy::tagName('h1'))
			->getText()
		);
	}

	public function testAboutMe()
	{
		$this->open();

		Assert::equal('Freelance Web Developer', $this->driver->findElement(WebDriverBy::className('subhead'))->getText());
	}

	public function testTitle()
	{
		$this->open();

		Assert::equal('Jiří Šifalda - Freelance Web Developer', $this->driver->getTitle());
	}

	public function testClickRedirect()
	{
		$this->open();

		$this->driver->findElement(WebDriverBy::linkText('Github'))->click();
		$this->driver->focusWindow($this->driver->getWindow(1));

		Assert::equal('https://github.com/jsifalda', $this->driver->getCurrentURL());
	}

}

id(new ExampleTest)->run();