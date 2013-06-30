<?php

require __DIR__ . '/../libs/autoload.php';
require __DIR__ . '/../libs/facebook/php-webdriver/__init__.php';

if (!class_exists('Tester\Assert')) {
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

/**
 * @param \Tester\TestCase $val
 * @return \Tester\TestCase
 */
function id(\Tester\TestCase $val)
{
	return $val;
}

/**
 * @param \Tester\TestCase $testCase
 */
function run(\Tester\TestCase $testCase) {
	$testCase->run(isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : NULL);
}

$configurator = new \Nette\Config\Configurator;
$configurator->setDebugMode(false);
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();
return $configurator->createContainer();