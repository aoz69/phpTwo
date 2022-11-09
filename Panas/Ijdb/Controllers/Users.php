<?php 

namespace Ijdb\Controllers;

class Users{

    public function Index() {
        global $pdo;
        $user = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $users = $user->findAll();
        return [
            'template'=>'adminusers.php',
            'variables'=>[
                'users'=>$users,
            ]
            ];
    }
    
    public function list() { 
        global $pdo;
        $user = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $users = $user->findAll();
        return [
            'template'=>'adminusers.php',
            'variables'=>[
                'users'=>$users,
            ]
        ];
    }
    public function save($id = '') {
        global $pdo;
        $user = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $users = $user->find('id', $id);
        return [
            'template'=>'adduser.php',
            'variables'=>[
                'users'=>$users
            ]
        ];
    }
    public function saveSubmit($id = '') {
        global $pdo;
        $users = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        unset($_POST['submit']);
        if($id != '') {
            $_POST['id'] = $id;
        }
        $users->save($_POST);
        header('Location:/users/list');
    }

    public function deleteSubmit($id) {
        global $pdo;
        $users = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $users->delete($id);
    }
    
}