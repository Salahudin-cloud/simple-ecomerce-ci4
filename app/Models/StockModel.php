<?php

namespace App\Models;

use CodeIgniter\Model;


class StockModel extends Model
{
  protected $table = 'stock';
  protected $allowedFields = ['date', 'quantity'];

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }


  public function getAllResupplyData()
  {
    $builder = $this->db->table('stock');
    $query = $builder->orderBy('date')->get();

    return $query->getResult();
  }


  public function resupply($data)
  {
    $builder = $this->db->table('stock');
    $builder->insert($data);
  }
}
