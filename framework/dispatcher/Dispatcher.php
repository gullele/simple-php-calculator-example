<?php
namespace framework\dispatcher;

use framework\http\Request;
use framework\controller\Controller;

/**
 * Single dispatcher for all the requests.
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Dispatcher
{
	public function dispatch()
	{
		$request = new Request();
		if (!empty($_GET['controller'])) {		
			$controller = $this->getController($_GET['controller']);
			//mini dispatcher here
			foreach ($_GET as $param => $value){ 
				$request->{$param} = $value;
			}
		} else {
			//Show the page with default framework page
			$controller = new Controller();
			$request->action = 'default';
		}
		$controller->executeAction($controller, $request);
	}
	
	private function getController($controllerName)
	{
		$controller = null;
		if (!empty($controllerName)) {
			//grab the controller class.
			$controllerName = ucwords($controllerName.'Controller');
			$classPath = "\\controller\\" . ucwords($controllerName);
			if (!class_exists($classPath)) {
				throw new \InvalidArgumentException("Controller $controlleName not found");
			}
			$controller = new $classPath;
		}
		
		return $controller;
	}
}