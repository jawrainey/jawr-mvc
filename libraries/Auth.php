<?php
/**
* Authenticate, and filter users
*/
class Auth
{
    protected $db, $session;
    
    public function __construct($db, $session)
    {
        $this->db = $db;
        $this->session = $session;
    }
    
    /**
     * Authenticate user
     *
     * @param  String  $username $_POSTed username
     * @param  String  $password $_POSTed password
     */
    public function login($username, $password)
    {
        $username = preg_replace('/[^a-z]/i', '', $username);
        $hashed = $this->encrypt($password);
        $result = $this->db->select('SELECT user_id, username, password
                                     FROM users
                                     WHERE username = :username AND password = :password',
                                     array( ':username' => $username, ':password' => $hashed ));
        
        if ( count($result) > 0 )
        {
            $this->session->set('level', 1);
            return true;
        }
        else
        {
            return false;
        }
    }
        
    /**
     * Filters out unauthenticated users.
     */
    public function filter()
    {
        if ( $this->session->get('level') == 1 )
        {   //You are the admin
            return true;
        }
        else
        {
            header('Location: ' . URL .'login/');
            exit;
        }
    }
    
    /**
     * Encrypts the users password
     *
     * @param  String  $password  password to be encrypted
     * return  One way encrypted password
     */
    public function encrypt($password)
    {
        return crypt($password, SALT);
    }
    
}
/* End of file Auth.php */
/* Location: /libraries/Auth.php */
