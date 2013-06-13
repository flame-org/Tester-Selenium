<?php
/**
 * Class HomePresenterTest
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */
namespace Flame\Tester\Tests;

use Flame\Tester\Selenium\TestCase;
use Flame\WebDriver\Element;
use Tester\Assert;

$container = require __DIR__ . '/bootstrap.php';

class HomePresenterTest extends TestCase
{

	protected $testingUrl = 'www.jsifalda.name';

	public function testName()
	{
		$this->browserCase->open('/');
		Assert::equal(
			'Jiří Šifalda',
			$this->browserCase->findElementBy(Element::CLASS_NAME, 'nine')
				->element(Element::TAG_NAME, 'h1')
				->text()
		);
	}

	public function testAboutMe()
	{
		$this->browserCase->open();

		Assert::equal('Freelance Web Developer', $this->browserCase->findElementBy(Element::CLASS_NAME, 'subhead')->text());
	}

	public function testTitle()
	{
		$this->browserCase->open();

		$titleElement = $this->browserCase->findElementBy(Element::TAG_NAME, 'title');
		Assert::equal('Jiří Šifalda - Freelance Web Developer', $titleElement->text());
	}

	public function testClickRedirect()
	{
		$this->browserCase->open();

		$this->browserCase->findElementBy(Element::LINK_TEXT, 'Github')->click();
		$this->browserCase->getSession()->focusWindow($this->browserCase->getSession()->getWindow(1));
		Assert::equal('https://github.com/jsifalda', $this->browserCase->getCurrentUrl());
	}

}

id(new HomePresenterTest)->run();