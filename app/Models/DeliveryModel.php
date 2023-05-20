<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModel extends Model
{
  protected $table = 'delivery';
  protected $allowedFields = ['status'];

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function getDeliveryData()
  {
    $query = $this->db->table('delivery')->orderBy('delivery_date', 'ASC')->get();
    return $query->getResult();
  }

  public function updateStatusDelivery($noReg, $status)
  {
    $data = ['status' => $status];
    $this->table('delivery')
      ->where('noreg', $noReg)
      ->set($data)
      ->update();
  }
}
