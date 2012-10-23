<?php
/**
* Error controller (404)
*/
class Error
{
    public $view;
    
    function __construct($view)
    {
        $this->view  = $view;
    }
    
    /**
     * Default action - index
     *
     * @return error to the user
     */
    public function index()
    {
        $metaData = array( 'meta-title' => '404');
        $this->view->render('error/error', $metaData);
    }
}
/* End of file Error.php */
/* Location: core/controllers/Error.php */
