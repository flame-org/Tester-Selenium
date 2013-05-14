<?php
/**
 * Class Element
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 14.05.13
 */
namespace Flame\WebDriver;

class Element
{

	/**Returns an element whose class name contains the search value; compound class names are not permitted.*/
	const CLASS_NAME = "class name";

	/**Returns an element matching a CSS selector.*/
	const CSS_SELECTOR ="css selector";

	/**Returns an element whose ID attribute matches the search value.*/
	const ID ="id";

	/**Returns an element whose NAME attribute matches the search value.*/
	const NAME ="name";

	/**Returns an anchor element whose visible text matches the search value.*/
	const LINK_TEXT ="link text";

	/**Returns an anchor element whose visible text partially matches the search value.*/
	const PARTIAL_LINK_TEXT = "partial link text";

	/**Returns an element whose tag name matches the search value.*/
	const TAG_NAME ="tag name";

	/**Returns an element matching an XPath expression.*/
	const XPATH ="xpath";
}