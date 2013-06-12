<?php
/**
 * Class Session
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Flame\Tester\Selenium\InvalidArgumentException;
use Flame\Tester\Selenium\InvalidStateException;
use Flame\WebDriver\Driver;
use Flame\WebDriver\Session;
use Nette\Object;

class BrowserCase extends Object
{

	/** @var \Flame\WebDriver\Driver  */
	private $webDriver;

	/** @var  Session */
	private $session;

	/**
	 * @param Driver $driver
	 */
	public function __construct(Driver $driver)
	{
		$this->webDriver = $driver;
	}

	/**
	 * @param string $browserName
	 * @return $this
	 * @throws \Flame\Tester\Selenium\InvalidArgumentException
	 */
	public function createSession($browserName = 'firefox')
	{
		$types = $this->getBrowserTypes();
		if($types->isAvailable($browserName)) {
			$this->session = $this->webDriver->createSession($browserName);
			return $this;
		}

		throw new InvalidArgumentException('Browser "' . $browserName . '" is not support by Selenium');
	}

	/**
	 * @return Types
	 */
	public function getBrowserTypes()
	{
		return new Types;
	}

	/**
	 * @param bool $need
	 * @return Session
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	public function getSession($need = true)
	{
		if($need === true && $this->session === null) {
			throw new InvalidStateException('Cannot get Session. Has been created instance of Session?');
		}

		return $this->session;
	}

	/**
	 * @return $this
	 */
	public function closeSession()
	{
		$this->getSession()->close();
		return $this;
	}

	/**
	 * @return Driver
	 */
	public function getWebDriver()
	{
		return $this->webDriver;
	}

	/**
	 * @return string
	 */
	public function getCurrentUrl()
	{
		return $this->getSession()->url();
	}

	/**
	 * @param $selector
	 * @param $name
	 * @return null|\PHPWebDriver_WebDriverElement
	 */
	public function findElementBy($selector, $name)
	{
		return $this->getSession()->element($selector, $name);
	}

	/**
	 * @param $url
	 * @return $this
	 */
	public function open($url)
	{
		$this->session = $this->getSession()->open($url);
		return $this;
	}
}