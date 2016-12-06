<?php
namespace app\home\controller;
use think\Controller;

class Index extends Controller{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		echo 'hello,world';
		
		// $this->dispaly();
	}
}

