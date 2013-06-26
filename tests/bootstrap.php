<?php

require __DIR__ . '/../libs/autoload.php';

if (!class_exists('Tester\Assert')) {
	echo "Install Nette Tester using `composer update --dev`\n";
	exit(1);
}

function id($val)
{
	return $val;
}

$configurator = new \Nette\Config\Configurator;
$configurator->setDebugMode(false);
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();
return $configurator->createContainer();