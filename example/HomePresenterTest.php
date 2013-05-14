<?php
/**
 * Class HomePresenterTest
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */
namespace Flame\Tester\Example;

use Flame\Tester\SeleniumTestCase;
use Flame\WebDriver\Element;
use Tester\Assert;

$container = require __DIR__ . '/bootstrap.php';

class HomePresenterTest extends SeleniumTestCase
{

	public function setUp()
	{
		parent::setUp();

		$this->setTestingUrl('jsifalda.name');
	}


	public function testName()
	{
		$this->open('/');
		Assert::equal(
			'Jiří Šifalda',
			$this->findElementBy(Element::CLASS_NAME, 'nine')
				->element(Element::TAG_NAME, 'h1')
				->text()
		);
	}

	public function testAboutMe()
	{
		$this->open('/');

		Assert::equal('Freelance Web Developer', $this->findElementBy(Element::CLASS_NAME, 'subhead')->text());
	}

}

id(new HomePresenterTest)->run();