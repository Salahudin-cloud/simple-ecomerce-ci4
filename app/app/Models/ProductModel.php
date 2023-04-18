<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table = 'products';
  protected $allowedFields = ['product_name', 'stock', 'price'];

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function newProduct($data)
  {
    $builder = $this->db->table('products');
    $builder->insert($data);
  }

  public function getAllProducts()
  {
    $query = $this->db->table('products')->get();
    return $query->getResult();
  }

  public function getPrice($id)
  {
    $query = $this->db->table('products')
      ->select('price')
      ->where('id', $id)->get();
    return $query->getRow();
  }

  public function getProductName($id)
  {
    $query = $this->db->table('products')
      ->select('product_name')
      ->where('id', $id)->get();
    return $query->getRow();
  }

  public function getSpecificProductName($id)
  {
    $query = $this->db->table('products')
      ->select('*')
      ->where('id', $id)->get();
    return $query->getRow();
  }

  //update product information
  public function updateSpecificProduct($id, $productName, $stock, $price)
  {
    $data = [
      "product_name" => $productName,
      "stock" => $stock,
      "price" => $price
    ];
    $this->table('products')
      ->where('id', $id)
      ->set($data)
      ->update();
  }


  public function del_product($id)
  {
    $builder = $this->db->table('products');

    $builder->where('id', $id)->delete();
  }
}
