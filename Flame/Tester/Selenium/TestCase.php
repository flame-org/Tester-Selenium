<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester\Selenium;

use Flame\Tester\Selenium\Browser\BrowserCase;
use Flame\WebDriver\Driver;

class TestCase extends \Tester\TestCase
{

	/** @var  BrowserCase */
	protected $browserCase;

	public function setUp()
	{
		$this->browserCase = $this->createBrowserCase()->createSession();
	}

	/**
	 * @param $url
	 * @return $this
	 */
	public function setTestingUrl($url)
	{
		$url = (string) $url;

		if(substr($url,0, 7) != 'http://' && substr($url, 0, 8) != 'https://') {
			$url = 'http://' . $url;
		}

		$this->properties['url'] = $url;
		return $this;
	}

	public function tearDown()
	{
		if($this->browserCase instanceof BrowserCase) {
			$this->browserCase->closeSession();
		}
	}

	/**
	 * @return BrowserCase
	 */
	protected function createBrowserCase()
	{
		return new BrowserCase(new Driver);
	}
}