<?php


namespace App\Models;

use  CodeIgniter\Model;

class ProfileModel extends Model
{
  protected $table = 'users';
  protected $allowedFields = [
    'usernames', 'name', 'address',
    'phone', 'password'
  ];

  public function __construct()
  {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function getProfileAcc($username)
  {
    $builder = $this->db->table('users');
    $query = $builder->where('username', $username)->get();
    return $query->getRow();
  }

  public function updateUserProfile($id, $username, $name, $address, $phone, $password)
  {
    $data = [
      'username' => $username,
      'name' => $name,
      'address' => $address,
      'phone' => $phone,
      'password' => md5($password)
    ];
    $builder = $this->db->table('users');
    $builder->where('id', $id)->set($data)->update();
  }
}
