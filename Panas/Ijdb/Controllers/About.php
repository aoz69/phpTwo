<?php 

namespace Ijdb\Controllers;

class About{
    public function index() {
        return [
            'template'=>'about.php',
            'title'=>'Home-Claire\'s Cars'
        ];
    }
}