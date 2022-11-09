<?php 

namespace Ijdb\Controllers;

class Logout{
    public function index() {
        if(isset($_SESSION['logger'])) {
            session_destroy();
        }
        header('Location:/');
    }
}