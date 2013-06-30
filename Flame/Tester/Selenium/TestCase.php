<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium;

use Flame\WebDriver\Driver;
use WebDriverBrowserType;

class TestCase extends \Tester\TestCase
{

	/** @var  string */
	protected $testingUrl;

	/** @var  string */
	protected $browser = WebDriverBrowserType::FIREFOX;

	/** @var  \Flame\WebDriver\Driver */
	protected $driver;

	/**
	 * @return void
	 */
	public function setUp()
	{
		$this->driver = $this->createDriver();
		$this->driver->setTestingUrl($this->testingUrl);
	}

	/**
	 * @return void
	 */
	public function tearDown()
	{
		if ($this->driver instanceof Driver) {
			$this->driver->quit();
		}
	}

	/**
	 * @return Driver
	 */
	protected function createDriver()
	{
		$capabilities = array(
			\WebDriverCapabilityType::BROWSER_NAME => $this->browser
		);
		return new Driver(Driver::SERVER_URL, $capabilities);
	}
}