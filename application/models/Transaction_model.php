<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    public  function __construct(){
        parent::__construct();
    }

     
     public function transact($from_id, $to_id, $what) {

         $query = $this->db->query("SELECT balance FROM users WHERE id = '".$from_id."'");

	 foreach ($query->result() as $row) {
	     $from_id_balance = $row->balance;
         }

          if( $what > $from_id_balance ) {

              return "not enough money";
          }   




       	 $query = $this->db->query("SELECT balance FROM users WHERE id = '".$to_id."'");

         foreach ($query->result() as $row) {

             $to_id_balance = $row->balance;
         }



	$this->db->query('START TRANSACTION;');

	$this->db->query("UPDATE users SET balance = ".$from_id_balance."  - ".$what." WHERE id = '".$from_id."'");
	$this->db->query("UPDATE users SET balance = ".$to_id_balance." + ".$what." WHERE id = '".$to_id."'");

	$this->db->query('COMMIT;');


            return "All success!";
   }



    

	     public function select_balance() {

              $this->db->select('*');
              $this->db->from('users');
              $query = $this->db->get();
              return $query->result_array(); 

	}


}
