<?php
namespace Ijdb\Controllers;

// manufacturer/id-> shows all manufacturers from manufacturer
class Manufacturer {
    public function list() {
        
        global $pdo;
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id'))->findAll();
        return [
            'template'=>'adminManufacturers.php',
            'title'=>'manufacturers',
            'variables'=>[
                'manufacturers'=>$manufacturers
                ]
            ];
    }

     public function save($id = '') {
        global $pdo;
        $manufacturers = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
        if($id == '') {
            $manufacturers = null;
        } else {
            $manufacturers = $manufacturers->find('id', $id);
        }
        return [
            'template'=>'addmanufacturer.php',
            'variables'=>[
                'manufacturers'=>$manufacturers
            ]
        ];
    }


    public function saveSubmit($id = '') {
            global $pdo;
            $manufacturers = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
            unset($_POST['submit']);
            if($id != '') {
                $_POST['id'] = $id;
            }
            $manufacturers->save($_POST);

            header('Location:/manufacturer/list');
        }

    public function deleteSubmit() {
        global $pdo;
        $manufacturers = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
        $manufacturers->delete($_POST['id']);
    }
}


