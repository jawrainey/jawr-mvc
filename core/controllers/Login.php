<?php
/**
* Allows a user to login
*/
class Login
{

    function __construct($view, $input, $auth)
    {
        $this->view   = $view;
        $this->input  = $input;
        $this->auth   = $auth;
    }
    
    /**
     * Login form
     */
    public function index()
    {
        $errors = array();
        $errors = $this->input->validate();
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            if ( empty($errors) )
            {
                if ( $this->auth->login( $this->input->fetch('username'), $this->input->fetch('password') ) == true )
                {
                    header('location: ' . URL . 'admin/');
                    exit;
                }
                array_push( $errors, 'Username & password not recognised.' );
            }
        }
        
        $metaData = array('meta-title' => 'Admin login');
        $data = array('username' => $this->input->fetch('username'));
        $this->view->render('login/index', $metaData, $data, $errors);
    }
}
/* End of file Login.php */
/* Location: core/controllers/Login.php */
