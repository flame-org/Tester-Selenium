<?php
/**
 * Class Driver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 12.06.13
 */
namespace Flame\WebDriver;

class Driver extends \PHPWebDriver_WebDriverBase
{

	const SERVER_URL = 'http://localhost:4444/wd/hub';

	/**
	 * @param string $executor
	 */
	public function __construct($executor = self::SERVER_URL)
	{
		parent::__construct($executor);
	}

	/**
	 * @param string $broswerName
	 * @return Session
	 */
	public function createSession($broswerName)
	{
		$capabilities = new \PHPWebDriver_WebDriverDesiredCapabilities;
		$curl_opts = array(CURLOPT_FOLLOWLOCATION => true);
		$results = $this->curl(
			'POST',
			'/session',
			array('desiredCapabilities' => $capabilities->$broswerName),
			$curl_opts
		);

		return new Session($results['info']['url']);
	}

	/**
	 * @return array
	 */
	protected function methods()
	{
		return array(
			'status' => 'GET',
		);
	}
}