<?php

/**
 * Author: Amirul Momenin
 * Desc:Login Controller
 *
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url',
			'utility'
        ));
        $this->load->database();
        $this->load->model('Users_model');
    }

    /*
     * Login view of Login
     */
    function index($msg = '')
    {
        $data['msg'] = $msg;
        $data['email'] = "";
        $data['password'] = "";
        $data['_view'] = 'member/login/index';
        $this->load->view('layouts/member/login_body', $data);
    }

    /*
     * login_process of Login
     */
    function login_process()
    {
        // Load the model
        $this->load->model('Login_model');
        // Validate the user can login
        $result = $this->Login_model->validate();
        // Now we verify the result
        if (! $result) {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        } else {
			
			if( $this->session->userdata('user_type')=='super' ){
				redirect('admin/homecontroller');
			}
			
			if( $this->session->userdata('user_type')=='organization' || $this->session->userdata('user_type')=='admin' ){
				$this->session->set_userdata('selected_users_id',$this->session->userdata('id')); 
				$this->session->set_userdata('selected_department_id',$this->session->userdata('department_id'));
				if($this->session->userdata('user_type')=='admin'){
					$this->session->set_userdata('evaluator',true);
				}
				
				//financial_year
				$this->db->order_by('id', 'desc');
				$this->db->where('status', 'selected');
				$resfy = $this->db->get('financial_year')->result_array();
				$db_error = $this->db->error();
				if (!empty($db_error['code'])){
					echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
					exit;
				}
				if(count($resfy)>0){
					$this->session->set_userdata('financial_year_id',$resfy[0]['id']);
				}
			}
            // If user did validate,
            // Send them to member area
            redirect('member/homecontroller');
        }
    }

    function register()
    {
        $data['msg'] = "";
        $data['_view'] = 'member/login/register';
        $this->load->view('layouts/member/login_body', $data);
    }

    function register_process()
    {
        $msg = "";
        $result = $this->db->get_where('users', array(
            'email' => $this->input->post('email')
        ))
            ->row_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        if ($result['email'] == $this->input->post('email')) {
            $msg = '<font color=red>This email already has been used to register.</font><br />';
        } else {
            $params = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name')
            );
            $users_id = $this->Users_model->add_users($params);
            if ($users_id) {
                $msg = '<font color=green>Registration has been completed sucessfully.</font><br />';
            }
        }
        $data['msg'] = $msg;
        $data['_view'] = 'member/login/register';
        $this->load->view('layouts/member/login_body', $data);
    }

    function forget_password()
    {
        $data['msg'] = '';
        $data['_view'] = 'member/login/forget-password';
        $this->load->view('layouts/member/login_body', $data);
    }

    function forget_password_process()
    {
        $msg = "";
        $result = $this->db->get_where('users', array(
            'email' => $this->input->post('email')
        ))
            ->row_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        if ($result['email'] != $this->input->post('email')) {
            $msg = '<font color=red>This email is not registered.</font><br />';
        } else {
            $rand = rand(0000, 9999);
            $params = array(
                'password' => $rand
            );
            $users_id = $this->Users_model->update_users($result['id'], $params);
            if ($users_id) {
                $this->load->library('email');
                $this->email->from('your@example.com', 'Your Name');
                $this->email->to($result['email']);
                // $this->email->cc('another@another-example.com');
                // $this->email->bcc('them@their-example.com');

                $this->email->subject('Reset Password');
                $this->email->message('Your New Password is ' . $rand);

                $this->email->send();
                $msg = '<font color=green>An email has been sent with new password.Login and change your password.</font><br />';
            }
        }
        $data['msg'] = $msg;
        $data['_view'] = 'member/login/forget-password';
        $this->load->view('layouts/member/login_body', $data);
    }

    public function do_logout()
    {
        $this->session->sess_destroy();
        redirect('homecontroller');
    }
}
