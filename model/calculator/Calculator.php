<?php
namespace model\calculator;

/**
 * Every class that is calculator would implement the getResult method
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
abstract class Calculator
{
	abstract function getResult($a, $b);
}