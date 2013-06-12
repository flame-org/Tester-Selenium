<?php
/**
 * Class Session
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\WebDriver;

use Flame\Tester\Selenium\InvalidArgumentException;

class Session extends \PHPWebDriver_WebDriverSession
{

	/**
	 * @param $index
	 * @return mixed
	 * @throws \Flame\Tester\Selenium\InvalidArgumentException
	 */
	public function getWindow($index)
	{
		$windows = $this->window_handles();

		if(isset($windows[$index])) {
			return $windows[$index];
		}

		throw new InvalidArgumentException('Window with index "' . $index . '" is not opened!');
	}

}