<?php
/**
 * Class Settings
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Nette\Object;

class Settings extends Object
{

	const TESTING_URL = 'testingUrl';

	/**
	 * @return array
	 */
	public function getAvailables()
	{
		return $this->getReflection()->getConstants();
	}

	/**
	 * @param $name
	 * @return bool
	 */
	public function isAvailable($name)
	{
		return in_array($name, $this->getAvailables());
	}

}