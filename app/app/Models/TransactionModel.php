<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
  protected $table = "transaction";
  protected $allowedFields = ['noreg', 'date', 'person_name', 'phone', 'address', 'product_name', 'quantity', 'total', 'status', 'username'];
  public function __construct()
  {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function getAllTransaction($username)
  {
    $query = $this->db->table('transaction')->where('username', $username)
      ->orderBy('date', 'ASC')->get();
    return $query->getResult();
  }
}
