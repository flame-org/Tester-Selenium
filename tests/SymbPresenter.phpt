<?php
/**
 * Test: Flame\Tests\Tester\Selenium\SymbPresenter.
 *
 * @testCase Flame\Tests\Tester\Selenium\SymbPresenterTest
 * @package Flame\Tests\Tester\Selenium
 */
 
namespace Flame\Tests\Tester\Selenium;

use Flame\Tester\Selenium\TestCase;
use Tester\Assert;
use WebDriverBy;

require_once __DIR__ . '/bootstrap.php';

class SymbPresenterTest extends TestCase
{

	protected $testingUrl = 'symb.me';

	public function testLoginBoxLoginFormSubmit()
	{
		$this->driver->open();

		$lightBox = $this->getLightBox();

		$lightBox->findElement(WebDriverBy::id('frm-signInForm'))->submit();

		Assert::true($this->driver
			->findElement(WebDriverBy::className('modalWindow'))
			->isDisplayed());
	}

	public function testValidLoginFormSubmit()
	{
		$this->driver->open();

		$lightBox = $this->getLightBox();

		$loginForm = $lightBox->findElement(WebDriverBy::id('frm-signInForm'));

		$loginForm->findElement(WebDriverBy::xpath('//input[@name="email"]'))
			->sendKeys('example@domain.com');
		Assert::same(
			'password',
			$loginForm->findElement(WebDriverBy::xpath('//input[@name="password"]'))
				->sendKeys('password')
				->getAttribute('value'));
		$loginForm->submit();

		Assert::true($this->driver->findElement(WebDriverBy::className('messages'))->isDisplayed());
	}

	public function testLoginBoxRegisterFormSubmit()
	{
		$this->driver->open();

		$lightBox = $this->getLightBox();

		$lightBox->findElement(WebDriverBy::id('frm-signUpForm'))->submit();

		$modal = $this->driver->findElement(WebDriverBy::className('modalWindow'));
		Assert::true($modal->isDisplayed());
	}


	public function testOpenLoginBox()
	{
		$this->driver->open();
		$this->getLightBox();
	}

	/**
	 * @return \WebDriverElement
	 */
	protected function getLightBox()
	{
		$this->driver->findElement(WebDriverBy::className('nofacebook'))->click();

		$lightBox = $this->driver->findElement(WebDriverBy::className('symblogin'));
		Assert::true($lightBox->isDisplayed());

		return $lightBox;
	}

}

run(new SymbPresenterTest());