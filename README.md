Nette/Tester selenium 2 extension
===============

The simple way for support of testing with Selenium 2 on nette/tester

##Example
Look at this [example file](https://github.com/flame-org/Tester-Selenium/blob/master/tests/ExampleTest.phpt)

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
* [element-34/php-webdriver](https://github.com/Element-34/php-webdriver)
* [nette/nette](https://github.com/nette/nette) - For running example tests only

**For more information please visit documentation of [php webdriver](https://github.com/Element-34/php-webdriver).**

**There are [more examples](https://github.com/facebook/php-webdriver/wiki/Example-command-reference) for working with webdriver session**
