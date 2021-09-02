<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{UserModel, ProductModel, PenjualanModel};
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel as ModelsUserModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelsUserModel	= new ModelsUserModel();
		$this->ProductModel 	= new ProductModel();
		$this->PenjualanModel = new PenjualanModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'users' 	  => $this->ModelsUserModel->countAll(),
			'product' 	  => $this->ProductModel->countAll(),
			'penjualan' => $this->PenjualanModel->countAll()
		];

		return view('home/index', $data);
	}
}
