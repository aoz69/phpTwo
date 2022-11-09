<?php

namespace Ijdb\Controllers;

class Stories {
    public function save($id = '') {
        global $pdo;
        $cars = new \CSY2028\DatabaseTable($pdo, 'stories', 'id');
        if($id == '') {
            $cars = null;
        } else {
            $cars = $cars->find('id', $id);
        }
        return [
            'template'=>'addstory.php',
            'variables'=>[
                'cars'=>$cars
            ]
        ];
    }

    public function list() { 
        global $pdo;
        $manufacturers = (new \CSY2028\DatabaseTable($pdo, 'stories', 'id'))->findAll();
        return [
            'template'=>'adminStories.php',
            'variables'=>[
                'cars'=>$manufacturers
            ]
        ];
    }


    public function saveSubmit($id = '') {
            global $pdo;
            $cars = new \CSY2028\DatabaseTable($pdo, 'stories', 'id');
            
            unset($_POST['submit']);
            if($id != '') {
                $_POST['id'] = $id;
            }
            $cars->save($_POST);
            if ($_FILES['image']['error'] == 0) {
                $fileName =($id == '' ?  $pdo->lastInsertId() . '.jpg' : $id);
                move_uploaded_file($_FILES['image']['tmp_name'], './images/stories/' . $fileName);
            }
            header('Location:/stories/list');
        }
    public function deleteSubmit() {
            global $pdo;
            $cars = new \CSY2028\DatabaseTable($pdo, 'stories', 'id');
            $cars->delete($_POST['id']);
        }
}
