<?php
namespace model\calculator;

use model\calculator\Calculator;

/**
 * Division implementation of Calculator
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Divider extends Calculator
{
	public function getResult($a, $b)
	{
		if (0 == $b) {
			return null;
		}
		return $a/$b;
	}
}