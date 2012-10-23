<?php
/**
 * Access session array
 */
class Session
{
    /**
     * Starts a session if one has not already been started
     */
    public function __construct()
    {
        if( !isset($_SESSION) ) 
        {
            session_start();
        }
    }
    
    /**
     * Sets session variables
     *
     * @param  mixed $name  Name to be set
     * @param  mixed $value Passes meta-data to $file to be used
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    
    /**
     * Gets user's session variables, otherwise null
     *
     * @param  mixed  $name  session data to find
     * @return session data based on name or null
     */
    public function get($name)
    {
        if ( isset( $_SESSION[$name] ) )
        {
            return $_SESSION[$name];
        }
        else
        {
            return null;
        }
    }
    
}
/* End of file Session.php */
/* Location: /libraries/Session.php */
