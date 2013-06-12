<?php

namespace Flame\Tester\Selenium;

class InvalidStateException extends \RuntimeException
{
}

/**
 * The exception that is thrown when an argument does not match with the expected value.
 */
class InvalidArgumentException extends \InvalidArgumentException
{
}

/**
 * The exception that is thrown when static class is instantiated.
 */
class StaticClassException extends \LogicException
{
}