<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium;

use Flame\Tester\Selenium\Types\Url;
use Flame\WebDriver\Driver;
use Flame\WebDriverBrowserType;
use Flame\WebDriverCapabilityType;

class TestCase extends \Tester\TestCase
{

	/** @var  string */
	protected $testingUrl;

	/** @var  string */
	protected $browser = WebDriverBrowserType::FIREFOX;

	/** @var  \Flame\WebDriver\Driver */
	protected $driver;

	public function setUp()
	{
		$this->driver = $this->createDriver();
	}

	public function tearDown()
	{
		if($this->driver instanceof Driver) {
			$this->driver->quit();
		}
	}

	/**
	 * @param null $url
	 */
	public function open($url = null)
	{
		$urlS = new Url($this->testingUrl);
		$urlS->append($url);
		$this->driver->get((string) $urlS);
	}

	/**
	 * @return Driver
	 */
	protected function createDriver()
	{
		$capabilities = array(
			WebDriverCapabilityType::BROWSER_NAME => $this->browser
		);
		return new Driver(Driver::SERVER_URL, $capabilities);
	}
}