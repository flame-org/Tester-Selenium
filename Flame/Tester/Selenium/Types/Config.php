<?php
/**
 * Class Configurator
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 13.06.13
 */
namespace Flame\Tester\Selenium\Types;

use Flame\Tester\Selenium\InvalidStateException;

class Config
{

	/** @var array  */
	protected $properties = array();

	/**
	 * @param array $defaults
	 */
	public function __constructor($defaults = array())
	{
		if(count($defaults)) {
			foreach ($defaults as $name => $default) {
				if(!array_key_exists($name, $this->properties)) {
					$this->throwUnsupportedExtension($name);
				}
				
				$this->properties[$name] = $default;
			}
		}
	}

	/**
	 * @param      $name
	 * @param null $value
	 * @return $this
	 */
	public function createEntry($name, $value = null)
	{
		$this->properties[$name] = $value;
		return $this;
	}

	/**
	 * @param $name
	 * @return mixed
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	public function &__get($name)
	{
		if(isset($this->properties[$name])) {
			return $this->properties[$name];
		}

		$this->throwUnsupportedExtension($name);
	}

	/**
	 * @param $name
	 * @param $value
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	public function __set($name, $value)
	{
		if(isset($this->properties[$name])) {
			$this->properties[$name] = $value;
			return;
		}

		$this->throwUnsupportedExtension($name);		
	}

	/**
	 * @param $name
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	private function throwUnsupportedExtension($name)
	{
		throw new InvalidStateException('Configuration for ' . $name . ' is not supported. Maybe you can use specific function.');
	}

}