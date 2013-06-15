Nette/Tester selenium 2 extension
===============

The simple way for support of testing with Selenium 2 on nette/tester

##Example
Look at [**tests** folder](https://github.com/flame-org/Tester-Selenium/blob/master/tests/ExampleTest.phpt)

```php
class LoginPresenterTest extends \Flame\Tester\Selenium\TestCase
{

	/** @var string  */
	protected $testingUrl = 'symb.me';

    public function testLoginBoxElements()
    {
	    $this->open();

		$lightBox = $this->testOpenLoginBox(false);

	    //login form
	    $loginForm = $lightBox->findElement(WebDriverBy::id('frm-signInForm'));
	    Assert::true($loginForm->hasElement(WebDriverBy::xpath('//input[@name="email"][@type="text"]')));
	    Assert::true($loginForm->hasElement(WebDriverBy::xpath('//input[@name="password"][@type="password"]')));
	    Assert::true($loginForm->hasElement(WebDriverBy::xpath('//input[@name="send"][@type="submit"]')));

	    //register form
	    $registerForm = $lightBox->findElement(WebDriverBy::id('frm-signUpForm'));
	    Assert::true($registerForm->hasElement(WebDriverBy::xpath('//input[@name="email"][@type="text"]')));
	    Assert::true($registerForm->hasElement(WebDriverBy::xpath('//input[@name="password"][@type="password"]')));
	    Assert::true($registerForm->hasElement(WebDriverBy::xpath('//input[@name="passwordConfirm"][@type="password"]')));
	    Assert::true($registerForm->hasElement(WebDriverBy::xpath('//input[@name="send"][@type="submit"]')));
    }

	public function testLoginBoxLoginFormSubmit()
	{
		$this->open();

		$lightBox = $this->testOpenLoginBox(false);

		$loginForm = $lightBox->findElement(WebDriverBy::id('frm-signInForm'));
		$loginForm->submit();

		$modal = $this->driver->findElement(WebDriverBy::className('modalWindow'));
		Assert::true($modal->isDisplayed());

		$modal->findElement(WebDriverBy::tagName('a'))->click();

		Assert::false($this->driver->hasElement(WebDriverBy::className('modalWindow')));
	}

	public function testValidLoginFormSubmit()
	{
		$this->open();

		$lightBox = $this->testOpenLoginBox(false);

		$loginForm = $lightBox->findElement(WebDriverBy::id('frm-signInForm'));

		$loginForm->findElement(WebDriverBy::xpath('//input[@name="email"]'))->setValue('example@domain.com');
		Assert::same('password', $loginForm->findElement(WebDriverBy::xpath('//input[@name="password"]'))->setValue('password')->getValue());
		$loginForm->submit();

		Assert::true($this->driver->findElement(WebDriverBy::className('messages'))->isDisplayed());
	}

	public function testLoginBoxRegisterFormSubmit()
	{
		$this->open();

		$lightBox = $this->testOpenLoginBox(false);

		$loginForm = $lightBox->findElement(WebDriverBy::id('frm-signUpForm'));
		$loginForm->submit();

		$modal = $this->driver->findElement(WebDriverBy::className('modalWindow'));
		Assert::true($modal->isDisplayed());
	}

	/**
	 * @param bool $open
	 * @return \Flame\WebDriverElement
	 */
	public function testOpenLoginBox($open = true)
	{
		if($open === true) {
			$this->open();
		}

		$this->driver->findElement(WebDriverBy::className('nofacebook'))->click();

		$lightBox = $this->driver->findElement(WebDriverBy::className('symblogin'));
		Assert::true($lightBox->isDisplayed());

		return $lightBox;
	}
}
```

##Instalation
1. Add `flame/tester-selenium` in your dev-dependencies
2. Install tester's dependencies with composer
3. Download java server from [http://code.google.com/p/selenium/downloads/list](http://code.google.com/p/selenium/downloads/list)
4. Run java server
	`java -jar selenium-server-standalone-<version>.jar`
5. Run your tests

#### How to run exmaple selenium tests?
`php libs/bin/tester tests/`

###Requirements
* [nette/tester](https://github.com/nette/tester)
* [flame/php-webdriver](https://github.com/flame-org/PHP-WebDriver)
* [nette/nette](https://github.com/nette/nette) - For running example tests only

#### More information

Check out the Selenium docs and wiki at http://docs.seleniumhq.org/docs/ and https://code.google.com/p/selenium/wiki
