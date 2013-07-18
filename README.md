Nette/Tester selenium 2 extension
===============

The simple way for testing with Selenium 2 and Nette/Tester

##Example tests
Look at [tests folder](https://github.com/flame-org/Tester-Selenium/tree/master/tests)

##Instalation
1. Add `flame/tester-selenium` in your dev-dependencies
2. Copy ["repositories"](https://github.com/flame-org/Tester-Selenium/blob/master/composer.json#L26)) section into your composer.json
3. Install tester's dependencies with composer
4. Download java server from [http://code.google.com/p/selenium/downloads/list](http://code.google.com/p/selenium/downloads/list)
5. Run java server
	`java -jar selenium-server-standalone-<version>.jar`
6. Run your tests

#### How to run exmaple selenium tests?
`php libs/bin/tester tests/`

###Requirements
* [nette/tester](https://github.com/nette/tester)
* [facebook/php-webdriver](https://github.com/facebook/php-webdriver)

#### More information

Check out the Selenium docs and wiki at http://docs.seleniumhq.org/docs/ and https://code.google.com/p/selenium/wiki
