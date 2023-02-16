<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_contact');
        $this->load->model('Model_portfolio');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_contact'] = $this->Model_common->all_page_contact();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();

		$data['testimonials'] = $this->Model_contact->all_testimonial();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$data['check_captcha'] = $this->Model_contact->check_captcha();
		$data['total_captcha'] = $this->Model_contact->total_captcha();

		$this->load->view('view_header',$data);
		$this->load->view('view_contact',$data);
		$this->load->view('view_footer',$data);
	}

	public function send_email() 
	{
		$data['setting'] = $this->Model_common->all_setting();
		$check_captcha = $this->Model_contact->check_captcha();

		$error = '';

		if(isset($_POST['form_contact'])) 
		{
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			$valid = 1;

			$name = $this->input->post('name', true);
			$phone = $this->input->post('phone', true);
			$email = $this->input->post('email', true);
			$subject = $this->input->post('subject', true);
			$message = $this->input->post('message', true);

            if(empty($name))
		    {
		        $valid = 0;
		        $error .= ERROR_EMPTY_NAME.'<br>';
		    }

		    if(empty($phone))
		    {
		        $valid = 0;
		        $error .= ERROR_EMPTY_PHONE.'<br>';
		    }

		    if(empty($email))
		    {
		        $valid = 0;
		        $error .= ERROR_EMPTY_EMAIL.'<br>';
		    }
		    else
		    {
		    	// Email validation check
		        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		        {
		            $valid = 0;
		            $error .= ERROR_INVALID_EMAIL.'<br>';
		        }
		    }

		    if(empty($subject))
		    {
		        $valid = 0;
		        $error .= ERROR_EMPTY_SUBJECT.'<br>';
		    }

		    if(empty($message))
		    {
		        $valid = 0;
		        $error .= ERROR_EMPTY_MESSAGE.'<br>';
		    }

            if($check_captcha['captcha_contact'] == 'Show')
		    {
		    	$r_serial = $this->input->post('r_serial', true);
			    $captcha_input = $this->input->post('captcha_input', true);

			    if($captcha_input == '')
			    {
			    	$valid = 0;
			    	$error .= ERROR_EMPTY_CAPTCHA.'<br>';
			    }
			    else
			    {
			    	$aa = $this->Model_contact->get_particular_captcha($r_serial);
			    	if($captcha_input != $aa['captcha_result'])
			    	{
			    		$valid = 0;
			    		$error .= ERROR_INCORRECT_CAPTCHA.'<br>';
			    	}
			    }
		    }

		    if($valid == 1)
		    {
				$msg = '
				<html><head><title>Email Sending</title></head><body>
            		<h3>Sender Information</h3>
					<b>Name: </b> '.$name.'<br><br>
					<b>Phone: </b> '.$phone.'<br><br>
					<b>Email: </b> '.$email.'<br><br>
					<b>Subject: </b> '.$subject.'<br><br>
					<b>Message: </b> '.$message.'</body></html>';

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

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($data['setting']['receive_email_to']);
				$this->email->reply_to($email, $name);

				$this->email->subject('Contact Form Email');
				$this->email->message($msg);

				$this->email->send();

		        $success = SUCCESS_CONTACT_FORM;
        		$this->session->set_flashdata('success',$success);

		    } 
		    else
		    {
        		$this->session->set_flashdata('error',$error);
		    }

			redirect(base_url().'contact');
            
        } else {
            
            redirect(base_url().'contact');
        }
	}
}