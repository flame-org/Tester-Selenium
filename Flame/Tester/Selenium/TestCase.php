<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium;

use Flame\Tester\Types\Url;
use Flame\WebDriver\Driver;
use WebDriverBrowserType;
use WebDriverWait;

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
	 * @param $fragment
	 * @param bool $append
	 * @return bool
	 */
	public function isUrlFragment($fragment, $append = true)
	{
		if($append === true) {
			$url = new Url($this->testingUrl);
			$url->append($fragment);
			$fragment = $url->getUrl();
		}

		if(strpos($this->driver->getCurrentURL(), $fragment) === false) {
			return false;
		}

		return true;
	}

	/**
	 * @param null $url
	 * @return string
	 */
	public function open($url = null)
	{
		$urlS = new Url($this->testingUrl);
		$urlS->append($url);
		$url = $urlS->getUrl();
		$this->driver->get($url);
		return $url;
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