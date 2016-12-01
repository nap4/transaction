<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller
{

	public function selectBalance() {

            $this->load->model('transaction_model');

    	    $result = $this->transaction_model->select_balance();
            $data['result'] = $result;

            $this->load->view('header');
            $this->load->view('transact', $data);
            $this->load->view('footer');


	}

       function transact() {
           $this->load->model('transaction_model');
           @$from_id = $_POST['from_id'];
           @$to_id = $_POST['to_id'];
           @$what = $_POST['what'];
          
           $result = $this->transaction_model->transact($from_id, $to_id, $what);

           $data['result'] = $result;
           $this->load->view('header');
           $this->load->view('transactResult', $data);
           $this->load->view('footer');

 


     }






}




