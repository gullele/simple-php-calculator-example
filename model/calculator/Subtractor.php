<?php
namespace model\calculator;

use model\calculator\Calculator;

/**
 * Subtraction implementation of Calculator
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Subtractor extends Calculator
{
	public function getResult($a, $b)
	{
		return $a-$b;
	}
}