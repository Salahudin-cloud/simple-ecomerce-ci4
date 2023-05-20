<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function login()
  {
    $session = session();
    if ($this->request->is('post')) {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      //query data by username 
      $query = $this->userModel->getOneUser($username, $password);

      if ($query != NULL) {
        //cek if username is admin 

        if ($query->role === 'admin') {


          $session->set([
            "username" => "$query->username",
            "password" => "$query->password",
            "isLogin" => true
          ]);

          $data['session_data'] = [
            'username' => $session->get('username'),
            'password' => $session->get('password'),
            'isLogin' => true
          ];

          return redirect()->to('/admin');
        } else {

          $session->set([
            "username" => "$query->username",
            "name" => "$query->name",
            "address" => "$query->address",
            "phone" => "$query->phone",
            "password" => "$password",
            "isLogin" => true
          ]);

          $data['session_data'] = [
            'username' => $session->get('username'),
            'name' => $session->get('name'),
            'address' => $session->get('address'),
            'phone' => $session->get('phone'),
            'password' => $session->get('password'),
            'isLogin' => true
          ];

          return view('user/user_dashboard', $data);
        }
      } else {
        $session->setFlashdata('error', 'failed');
        return redirect()->to('login');
      }
    }
  }


  public function registerProcess()
  {
    //get data from form 
    $username = $this->request->getPost('username');
    $name  = $this->request->getPost('name');
    $address = $this->request->getPost('address');
    $phoneNumber = $this->request->getPost('phone');
    $password = $this->request->getPost('password');

    $this->userModel->register($username, $name, $address, $phoneNumber, $password);

    return redirect()->to('/login');
  }

  public function logout()
  {
    $session = \Config\Services::session();


    $session->destroy();


    return redirect()->to('/login');
  }
}
