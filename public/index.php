<?php 

spl_autoload_register(function($class) {
    require_once   '../'.$class.'.php';
});

$db = new includes/MySqlDatabase;

/*$db->query('select * from users');*/