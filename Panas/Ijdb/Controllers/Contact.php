<?php 

namespace Ijdb\Controllers;

class Contact{
    public function index() {
        return [
            'template'=>'contact.html.php',
            'title'=>'Home-Claire\'s Cars'
        ];
    }

    public function indexSubmit() {
        unset($_POST['submit']);
        $contacts = (new \CSY2028\DatabaseTable($pdo, 'contacts', 'id'))->save($_POST);
        return [
            'template'=>'contact.html.php',
            'title'=>'Home-Claire\'s Cars'
        ];
    }
}