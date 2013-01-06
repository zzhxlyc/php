<?php
/*
 * $router->add('/home', array('C'=>'UserController', 
 * 								'M'=>'index',
 * 								'module'=>'folder_name',
 * 								'prefix'=>'/'));
 */
$router->add('/', array('C'=>'UserController', 'M'=>'index'));

