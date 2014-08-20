<?php
namespace model\calculator;

use model\calculator\Calculator;

/**
 * Multiplication implementation of Calculator
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Multiplier extends Calculator
{
	public function getResult($a, $b)
	{
		return $a*$b;
	}
}