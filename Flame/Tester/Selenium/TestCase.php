<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium;

use Flame\Tester\Selenium\Browser\BrowserCase;
use Flame\Tester\Selenium\Browser\Configurator;
use Flame\Tester\Selenium\Types\Url;
use Flame\WebDriver\Driver;

class TestCase extends \Tester\TestCase
{

	/** @var  string */
	protected $testingUrl;

	/** @var  BrowserCase */
	protected $browserCase;

	public function setUp()
	{
		$this->browserCase = $this->createBrowserCase()->createSession();
	}

	public function tearDown()
	{
		if($this->browserCase instanceof BrowserCase) {
			$this->browserCase->closeSession();
		}
	}

	/**
	 * @return Configurator
	 */
	protected function createConfig()
	{
		$config = new Configurator();
		$config->setTestingUrl(new Url($this->testingUrl));
		return $config;
	}

	/**
	 * @return BrowserCase
	 */
	private function createBrowserCase()
	{
		return new BrowserCase(new Driver, $this->createConfig());
	}
}