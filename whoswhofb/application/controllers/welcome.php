<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public $user;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('session');
		$this->load->library('facebook', array(
				'appId' => '444936682216984',
				'secret' => '04e4807aa0c80407714936f3b5673362'
		));
		
		$this->user = $this->session->userdata('user');
	
		$this->load->view('welcome_message');
	}
	
	public function login()
	{
		if ($this->user) {
			redirect(site_url(), 'location');
		} elseif ($this->facebook->getUser()) {
			try {
				$facebook_user = $this->facebook->api('/me');
				$this->session->set_userdata('user', array(
						'name' => $facebook_user['name']
				));
			} catch (FacebookApiException $e) {
				log_message('error', $e);
				redirect($this->facebook->getLoginUrl(array(
						'scope' => 'email',
						'redirect_uri' => site_url('login')
				)), 'location');
			}
		} else {
			$data['facebook_login_url'] = $this->facebook->getLoginUrl(array(
					'scope' => 'email',
					'redirect_uri' => site_url('login')
			));
			$data['title'] = 'Entrar';
			$data['page'] = 'login';
			$this->load->view('view', $data);
		}
	}
	
	public function logout() {
		session_destroy();
		redirect($this->facebook->getLogoutUrl(array(
				'next' => site_url()
		)), 'location');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */