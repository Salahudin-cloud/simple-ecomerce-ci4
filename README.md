# Simple E Comerce with CodeIgniter 4
This is Project i created to submit project mid term , the topic project mid term is about **E Comerce and Marketplace** , the student can choose between E Comerce or Markteplace and i choose E Comerce , so i created this project with CodeIgniter 4. this project E Comerce is about My Father Store. and this porject still lots need to imporove like the ui , security , buy system and so on  

Prerequisites
=======
Tools :
-------
* [XAMPP](https://www.apachefriends.org/download.html) 

Installation :
-------
1. clone this project and place in **`htdoc`**
3. open folder database 
4. open xampp and activited mysql with apache  after that import the database 
5. open the folder project (NOTE : You can rename the folder name project whatever you want ) and type  `composer install`
6. open your IDE and navigate to : `app/Config/Boot/Database.php` and meke sure the config  database like this :
```
  public array $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'umkm',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => true,
    'charset'  => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'swapPre'  => '',
    'encrypt'  => false,
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 3306,
  ];
```
5. now you can run the project 




