<?php
namespace model\calculator;

use model\calculator\Calculator;

/**
 * Addition implementation of Calculator
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Adder extends Calculator
{
	public function getResult($a, $b)
	{
		return $a+$b;
	}
}