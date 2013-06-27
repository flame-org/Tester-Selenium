<?php
/**
 * Class Url
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\Tester\Types;

use Flame\Tester\Utils\Strings;

class Url
{

	/** @var  string */
	private $url = '';

	/**
	 * @param $url
	 */
	public function __construct($url)
	{
		$this->url = (string)$url;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function append($value)
	{
		if(Strings::endsWith($this->url, '/') || Strings::startsWith($value, '/')) {
			$this->url .= $value;
		}else{
			$this->url .= '/' . $value;
		}

		return $this;
	}

	/**
	 * @return $this
	 */
	public function validate()
	{
		$url = (string)$this->url;
		if (!Strings::startsWith($url, 'http://') && !Strings::startsWith($url, 'https://')) {
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
		if ($valid == true) {
			$this->validate();
		}

		return $this->url;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return (string)$this->getUrl();
	}
}