<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {

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

        if ($this->facebook->getUser()){
            try {
                $friends = $this->facebook->api('/me/friends');
                if(is_array($friends['data'])){
                    foreach ($friends['data'] as  $friend){
                    }
                }
            } catch (FacebookApiException $e) {
                log_message('error', $e);
                redirect($this->facebook->getLoginUrl(array(
                                'scope' => 'email',
                                'redirect_uri' => site_url('welcome')
                )), 'location');
            }
            $this->load->view('friends',array('friends'=>$friends['data']));
        }else{
        }

    }

    public function mutual(){
        $this->load->library('session');
        $this->load->library('facebook', array(
                        'appId' => '444936682216984',
                        'secret' => '04e4807aa0c80407714936f3b5673362'
        ));
        
        if($this->facebook->getUser()){
            $mutual = $this->facebook->api('/'.$this->facebook->getUser().'/mutualfriends/'.$_GET['friend_id']);
            $this->load->view('mutual', array('friends'=>$mutual['data']));
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