<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_subscriber');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['active_subscribers'] = $this->Model_subscriber->show_active_subscriber();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_subscriber',$data);
		$this->load->view('admin/view_footer');
	}
	
	public function delete($id)
	{
    	$tot = $this->Model_subscriber->subscriber_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/subscriber');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

        $this->Model_subscriber->delete($id);
        $success = 'Subscriber is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/subscriber');
    }

    public function delete_pending()
	{
		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

        $this->Model_subscriber->delete_pending_subscriber();
        $success = 'All Pending Subscribers are deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/subscriber');
    }

    public function export_csv() {
		$now = gmdate("YmdHis");
		header('Content-Type: text/csv; charset=utf-8');  
		header('Content-Disposition: attachment; filename=subscriber_list_'.$now.'.csv');  
		$output = fopen("php://output", "w");  
		fputcsv($output, array('SL', 'Subscriber Email'));  

		$active_subscribers = $this->Model_subscriber->show_active_subscriber();
		foreach ($active_subscribers as $row) {
			fputcsv($output, array($row['subs_id'],$row['subs_email']));
		} 
		fclose($output);
    }

    public function send_email()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            if($valid == 1) 
            {
				$active_subscribers = $this->Model_subscriber->show_active_subscriber();
				foreach($active_subscribers as $row) {
					if($data['setting']['smtp_active'] == 'Yes') {
	                    if($data['setting']['smtp_ssl'] == 'Yes') {
	                        $config = array(
	                            'protocol' => 'smtp',
	                            'smtp_crypto' => 'ssl',
	                            'smtp_host' => $data['setting']['smtp_host'],
	                            'smtp_port' => $data['setting']['smtp_port'],
	                            'smtp_user' => $data['setting']['smtp_username'],
	                            'smtp_pass' => $data['setting']['smtp_password'],
	                            'mailtype'  => 'html', 
	                            'charset'   => 'utf-8'
	                        );
	                    }
	                    else
	                    {
	                        $config = array(
	                            'protocol' => 'smtp',
	                            'smtp_host' => $data['setting']['smtp_host'],
	                            'smtp_port' => $data['setting']['smtp_port'],
	                            'smtp_user' => $data['setting']['smtp_username'],
	                            'smtp_pass' => $data['setting']['smtp_password'],
	                            'mailtype'  => 'html', 
	                            'charset'   => 'utf-8'
	                        );  
	                    }
	                    $this->load->library('email', $config);
	                } else {
	                    $this->load->library('email');
	                }
					
					$this->email->subject($_POST['subject']);
					$this->email->message($_POST['message']);

					$this->email->from($data['setting']['send_email_from']);
					$this->email->to($row['subs_email']);
					
					$this->email->send();
				}
				

		        $success = 'Email is sent successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/subscriber/send_email');
            }
            else
            {
				$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/subscriber/send_email');
            }			
		}
		else
		{
			$this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_subscriber_email',$data);
			$this->load->view('admin/view_footer');
		}
	}

}