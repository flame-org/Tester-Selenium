<?php
/**
 * Class Config
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 13.06.13
 */
namespace Flame\Tester\Selenium\Browser;

use Flame\Tester\Selenium\InvalidStateException;
use Flame\Tester\Selenium\Types\Url;
use Nette\Object;

class Configurator extends Object
{

	/** @var  Settings */
	private $settings;

	/** @var array  */
	private $properties = array();

	/**
	 * @param array    $defaults
	 * @param Settings $settings
	 */
	public function __construct($defaults = array(), Settings $settings = null)
	{
		$this->settings = $settings;

		if($this->settings === null) {
			$this->settings = $this->createSettings();
		}

		if(count($defaults)) {
			foreach ($defaults as $name => $default) {
				$this->set($name, $default);
			}
		}
	}

	/**
	 * @param Url $url
	 * @return $this
	 */
	public function setTestingUrl(Url $url)
	{
		$this->set(Settings::TESTING_URL, $url);
		return $this;
	}

	/**
	 * @return Url
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	public function getTestingUrl()
	{
		$url = $this->get(Settings::TESTING_URL);

		if($url instanceof Url) {
			return $url;
		}else{
			throw new InvalidStateException('Testing url must be instance of Flame\Tester\Selenium\Types\Url. Given ' . gettype($url));
		}
	}

	/**
	 * @param $name
	 * @return null
	 */
	private function get($name)
	{
		if(isset($this->properties[$name])) {
			return $this->properties[$name];
		}

		return null;
	}

	/**
	 * @param      $name
	 * @param      $value
	 * @param bool $force
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	private function set($name, $value, $force = false)
	{
		if($this->settings->isAvailable($name) === false && $force === false) {
			throw new InvalidStateException('Setting for key "' . $name . '" is not supported');
		}

		$this->properties[$name] = $value;
	}

	/**
	 * @return Settings
	 */
	private function createSettings()
	{
		return new Settings();
	}
}