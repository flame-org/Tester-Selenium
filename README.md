Nette/Tester selenium 2 extension
===============

The simple way for support of testing with Selenium 2 on nette/tester

##Example

```php

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

	public function testTitle()
	{
		$this->open('/');

		$titleElement = $this->findElementBy(Element::TAG_NAME, 'title');
		Assert::equal('Jiří Šifalda - Freelance Web Developer', $titleElement->text());
	}

	public function testClickRedirect()
	{
		$this->open('/');

		$this->findElementBy(Element::LINK_TEXT, 'Github')->click();
		$this->session->focusWindow($this->session->window_handles()[1]);
		Assert::equal('https://github.com/jsifalda', $this->getCurrentUrl());
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
`php libs/bin/tester example/`

###Requirements
* [nette/tester](https://github.com/nette/tester)
* [element-34/php-webdriver](https://github.com/Element-34/php-webdriver)
* [nette/nette](https://github.com/nette/nette) - For running example tests only

**For more information please visit documentation of [php webdriver](https://github.com/Element-34/php-webdriver).**

**There are [more examples](https://github.com/facebook/php-webdriver/wiki/Example-command-reference) for working with webdriver session**
