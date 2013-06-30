<?php
/**
 * Class Driver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\WebDriver;

use Flame\Tester\Selenium\InvalidStateException;
use WebDriverWait;
use Flame\Tester\Types\Url;

class Driver extends \WebDriver
{

	const SERVER_URL = 'http://localhost:4444/wd/hub';

	/** @var  string */
	private $testingUrl;

	/**
	 * @param string $executor
	 * @param array $desired_capabilities
	 */
	public function __construct($executor = self::SERVER_URL, array $desired_capabilities = array())
	{
		parent::__construct($executor, $desired_capabilities);
	}

	/**
	 * @param $url
	 * @return $this
	 */
	public function setTestingUrl($url)
	{
		$this->testingUrl = (string) $url;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isAjaxInProgress()
	{
		return (bool) $this->executeScript('return jQuery.active == 0');
	}

	/**
	 * @return $this
	 */
	public function waitForAjax()
	{
		$wait = new WebDriverWait($this);
		$wait->until(function($driver) {
			/** @var \Flame\WebDriver\Driver $driver */
			return $driver->isAjaxInProgress();
		});

		return $this;
	}

	/**
	 * @param null $url
	 * @return $this|void
	 * @throws \Flame\Tester\Selenium\InvalidStateException
	 */
	public function open($url = null)
	{
		if($this->testingUrl === null && $url === null) {
			throw new InvalidStateException('Url for testing is not set.');
		}

		if($this->testingUrl !== null) {
			$urlS = new Url($this->testingUrl);
			$urlS->append($url);
			$url = $urlS->getUrl();
		}

		$this->get($url);
		return $this;
	}

	/**
	 * @param $fragment
	 * @param bool $append
	 * @return bool
	 */
	public function isUrlFragment($fragment, $append = true)
	{
		if($append === true) {
			$url = new Url($this->testingUrl);
			$url->append($fragment);
			$fragment = $url->getUrl();
		}

		if(strpos($this->getCurrentURL(), $fragment) === false) {
			return false;
		}

		return true;
	}

	/**
	 * @param \WebDriverBy $by
	 * @return bool
	 */
	public function hasElement(\WebDriverBy $by)
	{
		return (bool) count($this->findElements($by));
	}
}