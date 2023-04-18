<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{

  protected $productModel;

  public function __construct()
  {
    $this->productModel = new ProductModel();
  }

  public function home()
  {
    return view('index');
  }

}
