<?php

class UserController extends Controller{
	
	public $models = array();
	
	public function before(){
	}
	
	public function index(){
		$this->set('name', 'abc');
		$this->set('list', array('a', 'c', 'gs'));
	}
	
}