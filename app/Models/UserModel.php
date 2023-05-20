<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected  $table1 = 'users';

  protected $allowedFields  = ['username', 'name', 'address', 'phone', 'password'];

  //connect database 
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function getOneUser($username, $password)
  {
    $query = $this->db->table('users')
      ->where('username', $username)
      ->where('password', md5($password))->get()->getRow();
    return $query;
  }
  public function getAllUsers()
  {
    $query = $this->db->table('users')->get();
    return $query->getResult();
  }

  public function getUsers($id)
  {
    $query = $this->db->table('users')
      ->where('id', $id)->get()->getRow();
    return $query;
  }
  public function updateUsers($id, $newUsername, $newPassword)
  {
    $this->db->table('users')
      ->where('id', $id)
      ->update(['username' => $newUsername, 'password' => md5($newPassword)]);
  }

  public function register($username, $name, $address, $phone, $password)
  {
    $data = [
      'username' => $username,
      'name' => $name,
      'address' => $address,
      'phone' => $phone,
      'password' => md5($password)
    ];
    $this->db->table('users')->insert($data);
  }

  public function del_user($id)
  {
    $builder = $this->db->table('users');

    $builder->where('id', $id)->delete();
  }
}
