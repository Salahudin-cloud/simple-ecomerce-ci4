<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\ProfileModel;


class User extends BaseController
{
  protected $productModel;
  protected $transactionModel;
  protected $profileModel;

  public function __construct()
  {
    $this->productModel = new ProductModel();
    $this->transactionModel = new TransactionModel();
    $this->profileModel = new ProfileModel();
  }
  public function index()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    return view('user/user_dashboard');
  }

  public function profilePage()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    return view('user/user_profile');
  }

  public function AllProducts()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['products'] = $this->productModel->getAllProducts();
    return view('user/buy', $data);
  }

  public function  editPage()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['acc'] = $this->profileModel->getProfileAcc($session->get('username'));
    return view('user/user_edit_profile', $data);
  }

  public function updateProfileProcess()
  {
    $session = session();
    $id = $this->request->getPost('id');
    $username = $this->request->getPost('username');
    $name = $this->request->getPost('name');
    $address = $this->request->getPost('address');
    $phone = $this->request->getPost('phone');
    $password = $this->request->getPost('password');


    //update 
    $this->profileModel->updateUserProfile(
      $id,
      $username,
      $name,
      $address,
      $phone,
      $password
    );

    //update session 
    $session->set([
      "username" => $username,
      "name" => $name,
      "address" =>  $address,
      "phone" => $phone,
      "password" => $password,
      "isLogin" => true
    ]);

    return redirect()->to('profile');
  }

  public function buy_menu()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['products'] = $this->productModel->getAllProducts();
    return view('user/buy_menu', $data);
  }
  
  public function transactionPage()
  {
    $session = session();
    $data['transaction'] = $this->transactionModel->getAllTransaction($session->get('username'));

    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }


    return view('user/transaction_history', $data);
  }


  public function getPrice($id)
  {
    $product = $this->productModel->getPrice($id);

    if (!$product) {
      return $this->response->setStatusCode(404);
    }
    $price = $product->price;

    return $this->response->setJSON(['price' => $price]);
  }


  public function buy_process()
  {
    // get value from form 
    $noReg  = $this->request->getPost('noReg');
    $date  = $this->request->getPost('date');
    $personName = $this->request->getPost('personName');
    $phone = $this->request->getPost('phoneNumberUser');
    $address = $this->request->getPost('address');
    $productName = $this->productModel->getProductName($this->request->getPost('product-name'));
    $quantity = $this->request->getPost('quantity');
    $total = $this->request->getPost('total');
    $username = $this->request->getPost('username');



    $data = [
      "noreg" => $noReg,
      "date" => $date,
      "person_name" => $personName,
      "phone" => $phone,
      "address" => $address,
      "product_name" => $productName->product_name,
      "quantity" => $quantity,
      "total" => $total,
      "username"  => $username
    ];

    $this->transactionModel->insert($data);
    return redirect()->to('menu/buy');
  }
}
