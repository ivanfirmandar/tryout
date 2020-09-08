<?php 
require_once "config.php";
require_once "Medoo.php";
use Medoo\Medoo;
class Connection{
	public $db;
	public $result;
	public function __construct(){
		$this->db = new Medoo([
		'database_type' => 'mysql',
		  'database_name' => DB_NAME,
		  'server' => DB_HOST,
		  'username' => DB_USER,
		  'password' => DB_PASS
		]);
	}
	public function queryData($tabel,$data){
		$this->result = $this->db->select($tabel,$data);;
	}
	public function insertData($tabel,$data){
		$this->db->insert($tabel,$data);
	}
}
