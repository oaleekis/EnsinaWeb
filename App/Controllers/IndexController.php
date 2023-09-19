<?php

namespace App\Controllers;

use EW\Controller\Action;

class IndexController extends Action {
	
	public function index() {
		$this->render('index');
	}
	
	public function sobreNos() {
		$this->render('sobreNos');
	}

}


?>