<?php
namespace framework\controller;

use framework\views\render\RenderEngine;
use framework\http\Request;

/**
 * Parent controller taking care of common tasks between the contorllers
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Controller
{
	private $renderEngine;
	
	/**
	 * 
	 * @var Request
	 */
	private $request;
	
	public function __construct()
	{
		$this->renderEngine = new RenderEngine();	
	}
	
	public function render($path, array $params) 
	{
		$this->renderEngine->getOutput($path, $params);
	}
	
	public function executeAction(Controller $controller, Request $request)
	{
		$this->request = $request;
		//do not allow the request params to be mutable!
		$this->request->sealRequest();
		
		/*
		 * This would be assumed to have the both the controller and action parameters being set
		 * The controller parameter would be responsible to get it here from the dispatcher
		 * and the action, the actual method, will the one taking care of the task
		 */
		//check if the method exists in the class
		
		$methodName = $request->getParam('action');
		if (empty($methodName)) {
			return $this->errorAction("No action is defined in the request");
		}
		$methodName .= 'Action';
		if (method_exists($controller, $methodName)) {
			call_user_func(array(get_class($controller), $methodName));
		} else {
			$this->errorAction("Invalid method name $methodName inside ".get_class($controller));
		}
		
	}
	
	protected function getRequest()
	{
		return $this->request;
	}
	
	public function defaultAction()
	{
		$this->render(PROJECT_HOME.'/framework/views/welcome.php', array());
	}
	
	public function errorAction($error)
	{
		$this->render(PROJECT_HOME.'/framework/views/error.php', array('message'=>$error));
	}
}