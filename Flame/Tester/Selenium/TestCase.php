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
	 * @return bool
	 */
	public function isAjaxInProgress()
	{
		return $this->driver->executeScript('return jQuery.active == 0');
	}

	/**
	 * @return void
	 */
	public function waitForAjax()
	{
		$wait = new WebDriverWait($this->driver);
		$wait->until(function($driver) {
			/** @var \WebDriver $driver */
			return $driver->executeScript('return jQuery.active == 0');
		});
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
	 * @param \WebDriverBy $by
	 * @return bool
	 */
	public function existElement(\WebDriverBy $by)
	{
		try {
			return (bool) count($this->driver->findElements($by));
		}catch (\NoSuchElementWebDriverError $ex) {
			return false;
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