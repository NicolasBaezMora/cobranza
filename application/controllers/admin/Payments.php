<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('payments_m');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('email');
    $this->load->library('pdfgenerator');
    $this->session->userdata('loggedin') == TRUE || redirect('user/login');
  }

  public function index()
  {
    $data['payments'] = $this->payments_m->get_payments();
    $data['subview'] = 'admin/payments/index';

    $this->load->view('admin/_main_layout', $data);
  }

  public function edit()
  {
    $data['subview'] = 'admin/payments/edit';
    $this->load->view('admin/_main_layout', $data);
  }

  function ajax_searchCst() 
  {
    $dni = $this->input->post('dni');
    $cst = $this->payments_m->get_searchCst($dni);
    $quota_data = '';

    if ($cst != null) {
      $quota_data = $this->payments_m->get_quotasCst($cst->loan_id);
    } 

    $search_data = ['cst' => $cst, $quota_data];

    echo json_encode($search_data);
  }

  function ticket()
  {
    // print_r($_POST);
    // print_r($this->input->post('quota_id'));
    $data['email_cst'] = $this->input->post('email_cst');
    $data['name_cst'] = $this->input->post('name_cst');
    $data['coin'] = $this->input->post('coin');
    $data['loan_id'] = $this->input->post('loan_id');

    foreach ($this->input->post('quota_id') as $q) {
      $this->payments_m->update_quota(['status' => 0], $q);
    }

    if (!$this->payments_m->check_cstLoan($this->input->post('loan_id'))) {
      $this->payments_m->update_cstLoan($this->input->post('loan_id'), $this->input->post('customer_id'));
    }

    $data['quotasPaid'] = $this->payments_m->get_quotasPaid($this->input->post('quota_id'));

    $this->load->view('admin/payments/ticket', $data);
  }

  public function send_ticket()
  {
    $filename = 'comprobante_pago';

    $data1['name_cst'] = $this->input->post('name_cst');
    $data1['coin'] = $this->input->post('coin');
    $data1['loan_id'] = $this->input->post('loan_id');
    $data1['quotasPaid'] = json_decode($this->input->post('quotasPaid'));
    // tercer par??metro a nuestra carga de la vista y asignar todo a una variable:
    $html = $this->load->view('admin/payments/ticket_pdf', $data1, TRUE);

    //print_r($data1['quotasPaid']);

    $this->pdfgenerator->generate($html, $filename);

    if ($this->payments_m->send_email($this->input->post('cst_email'), $filename)) {
      $this->email->clear(true);
      unlink(FCPATH.$filename.'.pdf');
      $data['success'] = TRUE;
    }
    else {
      $data['error'] = 'error';
    }

    echo json_encode($data);
  }

}

/* End of file Payments.php */
/* Location: ./application/controllers/admin/Payments.php */