<?php
/**
 * Class SeleniumTestCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */

namespace Flame\Tester;

use Tester\TestCase;

class SeleniumTestCase extends TestCase
{

	const SERVER_URL = 'http://127.0.0.1:4444/wd/hub';

	/** @var \PHPWebDriver_WebDriverSession */
	protected $session;

	/** @var  \PHPWebDriver_WebDriver */
	private $webDriver;

	/** @var array */
	private $properties = array(
		'browser' => 'firefox',
		'url' => 'http://localhost'
	);

	/** @var array  */
	private $validBrowsers = array(
		'firefox',
		'chrome',
		'ie',
		'internet explorer',
		'opera',
		'htmlunit',
		'htmlunitjs',
		'iphone',
		'ipad',
		'android'
	);

	public function setUp()
	{
		$this->webDriver = new \PHPWebDriver_WebDriver(self::SERVER_URL);
		$this->session = $this->webDriver->session($this->properties['browser']);
	}

	/**
	 * @param $name
	 * @return $this
	 * @throws InvalidArgumentException
	 */
	public function setBrowser($name)
	{
		if(!in_array($name, $this->validBrowsers)) {
			throw new InvalidArgumentException('Browser with name "' . $name . '" is not on supported');
		}

		$this->properties['browser'] = (string) $name;
		return $this;
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

	/**
	 * @param $url
	 */
	public function open($url)
	{
		if(Validators::isUrl($url)) {
			$this->session->open($url);
		}else{
			$this->session->open($this->properties['url'] . $url);
		}
	}

	/**
	 * @return \PHPWebDriver_WebDriver
	 */
	public function getWebDriver()
	{
		return $this->webDriver;
	}

	/**
	 * @return \PHPWebDriver_WebDriverSession
	 */
	public function getSession()
	{
		return $this->session;
	}

	public function tearDown()
	{
		$this->session->close();
	}

}