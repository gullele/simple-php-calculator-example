<?php
namespace controller;

use model\CalculatorService;
use framework\controller\Controller;

/**
 * An interface between the view and model: the C in the MVC
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class CalculatorController extends Controller
{
	private $calculatorService;
	
	public function indexAction()
	{
		$this->render(PROJECT_HOME.'/view/calculate-home.php', 
		array()
		);
	}
	
	public function calculateAction()
	{
		$request = $this->getRequest();
		try {
			$param1 = $request->getParam('param1');
			$param2 = $request->getParam('param2');
			$task = $request->getParam('task');
			
			if (empty($param1) || empty($param2) || empty($task)) {
				$this->indexAction();
			}
			
			$summation = $this->getCalculatorService()->executeCalculation($param1, $param2, $task);
			$this->render(PROJECT_HOME.'/view/result.php', 
				array('type'=>$task, 'result'=>$summation));
		} catch (\Exception $ex) {
			//log exception. Assuming not using third party loggers..
			file_put_contents('/tmp/error.log', $ex->getMessage());
		}
	}
	
	/**
	 * 
	 * @return \model\CalculatorService
	 */
	private function getCalculatorService()
	{
		if (empty($this->calculatorService)) {
			$this->calculatorService = new CalculatorService();
		}
		
		return $this->calculatorService;
	}
}