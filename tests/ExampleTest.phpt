<?php
/**
 * Class ExampleTest
 *
 * @testCase \Flame\Tester\Selenium\Tests\ExampleTest
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium\Tests;


use Flame\Tester\Selenium\TestCase;
use Tester\Assert;
use WebDriverBy;

require __DIR__ . '/bootstrap.php';

class ExampleTest extends TestCase
{

	/** @var string */
	protected $testingUrl = /*http://www.*/'jsifalda.name';

	public function testName()
	{
		$this->driver->open();

		Assert::equal(
			'Jiří Šifalda',
			$this->driver->findElement(WebDriverBy::className('nine'))
				->findElement(WebDriverBy::tagName('h1'))
				->getText()
		);
	}

	public function testAboutMe()
	{
		$this->driver->open();

		Assert::equal('Freelance Web Developer', $this->driver
			->findElement(WebDriverBy::className('subhead'))
			->getText());
	}

	public function testTitle()
	{
		$this->driver->open();

		Assert::equal('Jiří Šifalda - Freelance Web Developer', $this->driver->getTitle());
	}

	public function testAttribute()
	{
		$this->driver->open();

		Assert::same('Jiří Šifalda (JSifalda)', $this->driver
			->findElement(WebDriverBy::xpath('/html/body/div/div[1]/div[1]/img'))
			->getAttribute('alt'));
	}

	public function testFindNotExistingElement()
	{
		$this->driver->open();

		//This way is bad a idea! Throwing exception in driver
//		Assert::throws(function () {
//			$this->driver->findElement(WebDriverBy::id('very-bad-id'));
//		}, '\NoSuchElementWebDriverError');

		//For now correct way
		Assert::false($this->driver->hasElement(WebDriverBy::id('very-bad-id')));
	}

	public function testClickToLink()
	{
		$this->driver->open();

		$this->driver
			->findElement(WebDriverBy::linkText('Symb.me'))
			->click();

		Assert::true($this->driver->isUrlFragment('symb.me', false));
	}

}

run(new ExampleTest());