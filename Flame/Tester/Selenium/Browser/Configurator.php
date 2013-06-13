<?php
/**
 * Class Config
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 13.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Flame\Tester\Selenium\Types\Config;
use Flame\Tester\Selenium\Types\Url;

class Configurator extends Config
{

	/**
	 * @param Url $url
	 * @return $this
	 */
	public function setTestingUrl(Url $url)
	{
		$this->properties['testingUrl'] = $url;
		return $this;
	}

	/**
	 * @return Url
	 */
	public function getTestingUrl()
	{
		return $this->getItem('testingUrl');
	}

	/**
	 * @param $name
	 * @return null
	 */
	private function getItem($name)
	{
		if(isset($this->properties[$name])) {
			return $this->properties[$name];
		}

		return null;
	}

}