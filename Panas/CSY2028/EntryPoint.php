<?php
namespace CSY2028;
class EntryPoint {
	private $routes;

	public function __construct(Routes $routes) {
		$this->routes = $routes;
	}

	public function run() {
		$functionName = 'index';
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

		
		if ($route == '') {
			$route = $this->routes->getDefaultRoute();
		}
		$routeArray = explode('/', $route);
		$this->routes->checkLogin($routeArray[0].(isset($routeArray[1]) ? '/'.$routeArray[1] : ''));
		if(!isset($routeArray[1])) {
			$routeArray[1] = 'index';
		}
		list($controllerName, $functionName) = $routeArray;

		unset($routeArray[1]);
		unset($routeArray[0]);
		  
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$functionName = $functionName . 'Submit';
		}

	    $controller = $this->routes->getController($controllerName);

		// :: /cars/ manufacturer

	    $page = call_user_func_array([$controller,$functionName],$routeArray);;

		
		$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables'] ?? []);

		$title = $page['title'] ?? 'Calire\'s Cars';

		require '../templates/layout.html.php';
	}

	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}