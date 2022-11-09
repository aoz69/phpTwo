<?php 

namespace Ijdb\Controllers;

class Login{
    public function index() {
        return [
            'template'=>'login.php',
            'title'=>'Login-Claire\'s Cars'
        ];
    }

    public function indexSubmit() {
        global $pdo;
        unset($_POST['submit']);
        $users = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $logger = $users->find('email',$_POST['email']);
        if($logger[0]->password == $_POST['password']) {
            $_SESSION['logger'] = $logger[0]->id;
            $_SESSION['email'] = $logger[0]->email;
            $_SESSION['isOwner'] = true;
           header('Location:/cars/list');
        }
        return [
            'template'=>'login.php',
            'title'=>'Login-Claire\'s Cars'
        ];
    }


}