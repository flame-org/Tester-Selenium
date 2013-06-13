<?php
/**
 * Class Url
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\Tester\Selenium\Types;

use Flame\Tester\Selenium\InvalidArgumentException;
use Nette\Object;

class Url extends Object
{

	/** @var  string */
	private $url = '';

	/**
	 * @param $url
	 * @throws InvalidArgumentException
	 */
	public function __construct($url)
	{
		$this->url = (string) $url;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function append($value)
	{
		$value = (string) (is_array($value) ? http_build_query($value, '', '&') : $value);
		$this->url .= ($this->url === '' || $value === '') ? $value : '&' . $value;
		return $this;
	}

	/**
	 * @return $this
	 */
	public function validate()
	{
		$url = (string) $this->url;
		if(substr($url,0, 7) != 'http://' && substr($url, 0, 8) != 'https://') {
			$url = 'http://' . $url;
		}

		$this->url = $url;
		return $this;
	}

	/**
	 * @param bool $valid
	 * @return string
	 */
	public function getUrl($valid = true)
	{
		if($valid == true) {
			$this->validate();
		}

		return $this->url;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->getUrl();
	}
}