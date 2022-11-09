<?php

namespace Ijdb\Controllers;

class Cars{

    public function Index($id = '') {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars = $cars->findAll();
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id'))->findAll();
        return [
            'template'=>'cars.html.php',
            'variables'=>[
                'cars'=>$cars,
                'manufacturers'=>$manufacturers
            ]
            ];
    }
    public function manufacturer($id = '') {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars = $cars->find('manufacturerId', $id);
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id'))->findAll();
        return [
            'template'=>'cars.html.php',
            'variables'=>[
                'cars'=>$cars,
                'manufacturers'=>$manufacturers
            ]
            ];
    }
    
    public function list() { 
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars = $cars->find('archive', 0);
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'cars', 'id'))->findAll();
        return [
            'template'=>'adminCars.php',
            'variables'=>[
                'cars'=>$cars,
                'manufacturers'=>$manufacturers
            ]
        ];
    }

    public function archived() { 
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars = $cars->find(['archive'=>1]);
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'cars', 'id'))->findAll();
        return [
            'template'=>'adminCars.php',
            'variables'=>[
                'cars'=>$cars,
                'manufacturers'=>$manufacturers
            ]
        ];
    }

    public function save($id = '') {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        if($id == '') {
            $cars = null;
        } else {
            $cars = $cars->find('id', $id);
        }
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id'))->findAll();
        return [
            'template'=>'addcar.php',
            'variables'=>[
                'cars'=>$cars,
                'manufacturers'=>$manufacturers
            ]
        ];
    }

    public function archive($id) {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars->save(['archive'=>1, 'id'=>$id]);
        header('Location:/Cars/list');
    }

    public function restore($id) {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars->save(['archive'=>0, 'id'=>$id]);
        header('Location:/Cars/list');
    }

    public function saveSubmit($id = '') {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        
        unset($_POST['submit']);
        if($id != '') {
            $_POST['id'] = $id;
        }
        
        $cars->save($_POST);
        if ($_FILES['image']['error'] == 0) {
			$fileName = $pdo->lastInsertId() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], './images/cars/' . $fileName);
		}
        header('Location:/Cars/list');
    }

    public function deleteSubmit() {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
        $cars->delete($_POST['id']);
    }
}


