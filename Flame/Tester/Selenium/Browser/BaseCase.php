<?php
/**
 * Class BaseCase
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 13.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Flame\Tester\Selenium\Types\Url;
use Nette\Object;

class BaseCase extends Object
{

	/**
	 * @return Types
	 */
	protected function createTypes()
	{
		return new Types;
	}

	/**
	 * @param $url
	 * @return Url
	 */
	protected function createUrl($url)
	{
		return new Url($url);
	}

}