Nette/Tester selenium 2 extension
===============

The simple way for testing with Selenium 2 and Nette/Tester

##Example
Look at this [example test](https://github.com/flame-org/Tester-Selenium/blob/master/tests/ExampleTest.phpt)

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
* [facebook/php-webdriver](https://github.com/facebook/php-webdriver)
* [nette/nette](https://github.com/nette/nette) - For running example tests only

#### More information

Check out the Selenium docs and wiki at http://docs.seleniumhq.org/docs/ and https://code.google.com/p/selenium/wiki
