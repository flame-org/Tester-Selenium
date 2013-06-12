<?php
/**
 * Class Types
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Nette\Object;

class Types extends Object
{

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

	/**
	 * @return array
	 */
	public function get()
	{
		return $this->validBrowsers;
	}

	/**
	 * @param $browserName
	 * @return bool
	 */
	public function isAvailable($browserName)
	{
		return in_array($browserName, $this->get());
	}

}