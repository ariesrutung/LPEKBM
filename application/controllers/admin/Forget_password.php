<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forget_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_forget_password');
    }

    public function index()
    {
        $error = '';
        $success = '';

        $data['setting'] = $this->Model_forget_password->get_setting_data();

        if (isset($_POST['form1'])) {

            if (PROJECT_MODE == 0) {
                $this->session->set_flashdata('error', PROJECT_NOTIFICATION);
                redirect($_SERVER['HTTP_REFERER']);
            }

            $valid = 1;

            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            } else {
                $tot = $this->Model_forget_password->check_email($_POST['email']);
                if (!$tot) {
                    $valid = 0;
                    $error .= 'Email Anda tidak ditemukan di sistem kami, silakan dicek kembali.<br>';
                }
            }


            if ($valid == 1) {

                $token = md5(rand());

                // Update Database
                $form_data = array(
                    'token' => $token
                );
                $this->Model_forget_password->update($_POST['email'], $form_data);

                // Send Email
                $msg = '<p>Untuk mengatur ulang kata sandi, silakan <a href="' . base_url() . 'admin/reset-password/index/' . $_POST['email'] . '/' . $token . '">KLIK DI DINI</a> dan masukkan kata sandi baru.';

                if ($data['setting']['smtp_active'] == 'Yes') {
                    if ($data['setting']['smtp_ssl'] == 'Yes') {
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
                    } else {
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
                $this->email->to($_POST['email']);

                $subject = 'Password Reset';

                $this->email->subject($subject);
                $this->email->message($msg);

                $this->email->send();

                $success = 'Sistem telah mengirim sebuah pesan ke akun email Anda. Silakan dicek dan ikuti instruksi yang diberikan. Terima kasih!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url() . 'admin/forget_password');
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url() . 'admin/forget_password');
            }
        } else {
            $this->load->view('admin/view_forget_password2', $data);
        }
    }
}
