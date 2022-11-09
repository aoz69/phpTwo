<?php
namespace Ijdb;

class Routes implements \CSY2028\Routes {
	public function getController($name) {
		require '../database.php';
		
		$controllers = [];
		$name = strtolower($name);
		$controllers['index'] = new \Ijdb\Controllers\Index;
		$controllers['cars'] = new \Ijdb\Controllers\Cars;
		$controllers['login'] = new \Ijdb\Controllers\Login;
		$controllers['logout'] = new \Ijdb\Controllers\Logout;
		$controllers['contact'] = new \Ijdb\Controllers\Contact;
		$controllers['manufacturer'] = new \Ijdb\Controllers\Manufacturer;
		$controllers['users'] = new \Ijdb\Controllers\Users;
		$controllers['opportunity'] = new \Ijdb\Controllers\Opportunities;
		$controllers['about'] = new \Ijdb\Controllers\About;
		$controllers['stories'] = new \Ijdb\Controllers\Stories;
		return $controllers[$name];
	}

	public function getDefaultRoute() {
		return 'Index';
	}

	public function checkLogin($route) {
		
		$loginRoutes = [];
		$loginRoutes['cars/save'] =  true;
		$loginRoutes['cars/list'] =  true;
		$loginRoutes['cars/delete'] =  true;
		$loginRoutes['manufacturer/save'] =  true;
		$loginRoutes['manufacturer/delete'] =  true;
		$loginRoutes['manufacturer/list'] =  true;
		$loginRoutes['stories/list'] =  true;
		$loginRoutes['users/list'] =  true;

		$loginRoutes['stories/save'] =  true;
		$loginRoutes['stories/delete'] =  true;
		$loginRoutes['users/save'] =  true;
		$loginRoutes['users/delete'] =  true;
		$loginRoutes['category/edit'] = true;

		$requiresLogin = $loginRoutes[$route] ?? false;

		if ($requiresLogin && !isset($_SESSION['logger'])) {
			header('location: /login');
			exit();
		}
	}
}
?>