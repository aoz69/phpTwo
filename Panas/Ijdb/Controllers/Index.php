<?php 

namespace Ijdb\Controllers;

class Index{
    public function index() {
        global $pdo;
        $stories = (new \CSY2028\DatabaseTable($pdo, 'stories', 'id'))->findAll();
        
        return [
            'template'=>'index.html.php',
            'title'=>'Home-Claire\'s Cars',
            'variables'=>[
                'stories'=>$stories
            ]
            ];
    }
}