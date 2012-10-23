<?php
/**
 * Gets current routes from uri as:
 * mysite.com/controller/action/param1/.../paramN
 */
class Router
{   
    /**
     * Current controller - Default to error for easier 404's
     *
     * @var string
     * @access protected
     */
    protected $controller = 'Error';
    /**
     * Current action
     *
     * @var string
     * @access protected
     */
    protected $action = 'index';
    /**
     * Current parameters
     *
     * @var array
     * @access protected
     */
    protected $params = array();
    
    public function __construct()
    {
        $this->parseUri();
    }
    
    /**
     * Parse uri and get the current route
     */
    protected function parseUri()
    {
        $uri = isset($_GET['uri']) ? $_GET['uri'] : '/';
        $uri = rtrim($uri, '/');
        $uri = filter_var($uri, FILTER_SANITIZE_URL);
        list( $controller, $action, $params ) = array_pad(explode('/', $uri, 3), 3, null); //padding for validation
        
        $this->setController($controller);
        $this->setAction($action);
        $this->setParams($params);
    }
    
    /**
     * Set current controller name based on uri
     *
     * @param  string  $controller  Controller name to be set
     */
    public function setController($controller)
    {
        $controller = ucfirst( strtolower($controller) );
        
        if ( $controller == null )
        {
            $this->controller = 'Index';
        }
        elseif ( class_exists($controller) )
        {
            $this->controller = $controller;
        }
        else
        {
            return $this->controller;
        }
    }
    
    /**
     * Set current action name based on uri
     *
     * @param  string  $action  Action name to be set
     */
    public function setAction($action)
    {
        if ( $action == null )
        {
            return $this->action;
        }
        elseif ( is_callable( array( $this->controller, $action ) ) )
        {
            $this->action = $action;
        }
        else
        {
            $this->setController('Error');
        }
    }
    
    /**
     * Set current parameters based on uri
     *
     * @param  string  $params  Current action parameters to be set
     */
    public function setParams($params)
    {
        $numArgs = func_get_args($this->action);
        
        //If there  exists parameters
        if ( $numArgs !== null )
        {
            $this->params = explode("/", $params);
        }
        else
        {   //otherwise we have a problem jim
            $this->setController('Error');
            $this->setAction('index');
        }
        
    }
    
    /**
     * Return an array of current routes
     */
    public function getUri()
    {
        return array('controller' => $this->controller,
                     'action'     => $this->action,
                     'params'     => $this->params);
    }
    
}
/* End of file Router.php */
/* Location: /libraries/Router.php */
