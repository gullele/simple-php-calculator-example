<?php
namespace model;

use model\calculator\Adder;
use model\calculator\Subtractor;
use model\calculator\Multiplier;
use model\calculator\Divider;

/**
 * Service for calculator. Any client who need service of cacluation would consult this class
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class CalculatorService
{
	private $calculator; 
	
	public function addItForMe($a, $b)
	{
		$this->calculator = new Adder();
		return $this->calculate($a, $b);
	}
	
	public function subtractItForMe($a, $b)
	{
		$this->calculator = new \model\caculator\Subtractor();
		return $this->calculate($a, $b);
		
	}
	
	public function multiplyItForMe($a, $b)
	{
		$this->calculator = new \model\caculator\Multiplier();
		return $this->calculate($a, $b);
	}
	
	public function divideItForMe($a, $b)
	{
		$this->calculator = new \model\caculator\Divider();
		return $this->calculate($a, $b);
	}
	
	private function calculate($a, $b)
	{
		if ($this->calculator) {
			return $this->calculator->getResult($a, $b);
		}
		
		return null;
	}
	
	public function executeCalculation($a, $b, $task)
	{
		if (!$this->isValidTask($task)) {
			throw new \Exception('Unknown '.$task);
		}
		
		switch ($task) {
			case 'add':
				$this->calculator = new Adder();
				break;
			case 'subtract':
				$this->calculator = new Subtractor();
				break;
			case 'divide':
				$this->calculator = new Divider();
				break;
			case 'multiply':
				$this->calculator = new Multiplier();
				break;
		}
		
		return $this->calculator->getResult($a, $b);
	}
	
	private function isValidTask($task)
	{
		$projectConfigs = parse_ini_file(PROJECT_HOME.'/config/config.ini');
		$validTasks = $projectConfigs['task'];
		
		if (in_array($task, $validTasks)) {
			return true;
		}
		return false;
	}
}