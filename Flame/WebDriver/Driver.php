<?php
/**
 * Class Driver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\WebDriver;

use Flame\NoSuchElementWebDriverError;
use Flame\WebDriver;
use Flame\Tester\Selenium\InvalidArgumentException;
use Flame\WebDriverBy;

class Driver extends WebDriver
{

	const SERVER_URL = 'http://localhost:4444/wd/hub';

	/**
	 * @param string $executor
	 * @param array  $desired_capabilities
	 */
	public function __construct($executor = self::SERVER_URL, array $desired_capabilities = array())
	{
		parent::__construct($executor, $desired_capabilities);
	}

	/**
	 * @param WebDriverBy $by
	 * @return bool
	 */
	public function hasElement(WebDriverBy $by)
	{
		try {
			$this->findElement($by);
			return true;
		}catch (NoSuchElementWebDriverError $ex) {}

		return false;
	}

	/**
	 * @param $index
	 * @return mixed
	 * @throws \Flame\Tester\Selenium\InvalidArgumentException
	 */
	public function getWindow($index)
	{
		$windows = $this->getWindowHandles();

		if(isset($windows[$index])) {
			return $windows[$index];
		}

		throw new InvalidArgumentException('Window with index "' . $index . '" is not opened!');
	}
}