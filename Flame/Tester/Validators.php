<?php
/**
 * Class Validators
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */
namespace Flame\Tester;

class Validators
{

	final public function __construct()
	{
		throw new StaticClassException;
	}

	/**
	 * Finds whether a string is a valid URL.
	 * @param  string
	 * @return bool
	 */
	public static function isUrl($value)
	{
		$alpha = "a-z\x80-\xFF";
		$domain = "[0-9$alpha](?:[-0-9$alpha]{0,61}[0-9$alpha])?";
		$topDomain = "[$alpha][-0-9$alpha]{0,17}[$alpha]";
		return (bool) preg_match("(^https?://(?:(?:$domain\\.)*$topDomain|\\d{1,3}\.\\d{1,3}\.\\d{1,3}\.\\d{1,3}|\[[0-9a-f:]{3,39}\])(:\\d{1,5})?(/\\S*)?\\z)i", $value);
	}

}