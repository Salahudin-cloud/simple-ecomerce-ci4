<?php

namespace App\Controllers;

use App\Models\DeliveryModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\StockModel;

class Admin extends BaseController
{
  protected $userModel;
  protected $productModel;
  protected $deliveryModel;
  protected $stockModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->productModel = new ProductModel();
    $this->deliveryModel = new DeliveryModel();
    $this->stockModel = new StockModel();
  }

  public function getAllUsers()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['users'] = $this->userModel->getAllUsers();
    return view('admin/user_manager', $data);
  }

  public function getAllProducts()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['products'] = $this->productModel->getAllProducts();
    return view('admin/product_manager', $data);
  }

  public function update_user($id)
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['user'] = $this->userModel->getUsers($id);
    $data['id'] = $id;
    return view('admin/update_user', $data);
  }

  public function admin_dashboard()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    return view('admin/admin_dashboard');
  }

  public function update_user_process($id)
  {
    $id = $id;
    $usernameUpdate = $this->request->getPost('username');
    $passwordUpdate = $this->request->getPost('password');

    $this->userModel->updateUsers($id, $usernameUpdate, $passwordUpdate);

    return redirect()->to('menu/user_manager');
  }

  public function delete_user($id)
  {
    $this->userModel->del_user($id);
    return redirect()->to('menu/user_manager');
  }

  public function update_product($id)
  {
    $data['product'] = $this->productModel->getSpecificProductName($id);
    return view('admin/update_product', $data);
  }

  public function update_product_process($id)
  {
    //get data from product 
    $productName = $this->request->getPost('productName');
    $stock = $this->request->getPost('stock');
    $price = $this->request->getPost('price');

    //cal the function update product 
    $this->productModel->updateSpecificProduct($id, $productName, $stock, $price);

    return redirect()->to('menu/product_manager');
  }


  function deleteProduct($id)
  {
    $this->productModel->del_product($id);
    return redirect()->to('menu/product_manager');
  }

  public function delivery_manager()
  {
    $session = session();
    if (!$session->has('isLogin')) {
      return redirect()->to('/login');
    }
    $data['deliveryData'] = $this->deliveryModel->getDeliveryData();
    return view('admin/delivery_manager', $data);
  }

  public function update_status_delivery()
  {
    $noReg = $this->request->getPost('noreg');
    $status = $this->request->getPost('status');

    $this->deliveryModel->updateStatusDelivery($noReg, $status);


    return redirect()->to('menu/delivery_manager');
  }


  // resupply page history 
  public function resupplyHistoryPage()
  {
    $data['resupply'] = $this->stockModel->getAllResupplyData();
    return view('admin/resupply_history', $data);
  }

  public function resupplyPage($id)
  {
    $data['product'] = $this->productModel->getSpecificProductName($id);
    return view('admin/resupply_page', $data);
  }

  public function resupplyPageProcess()
  {
    $productName = $this->request->getPost('productName');
    $stock = (int) $this->request->getPost('stock');
    $date = $this->request->getPost('date');

    $data = [
      "date" => $date,
      "product_name" => $productName,
      "quantity" => $stock
    ];

    $this->stockModel->resupply($data);
    return redirect()->to('menu/product_manager');
  }
}
