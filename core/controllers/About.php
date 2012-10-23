<?php 
/**
* About controller (Who am I‽)
*/
class About
{
    public $view, $blog;
    
    function __construct($view, $blogModel)
    {
        $this->view  = $view;
        $this->blog  = $blogModel;
    }
    
    /**
     * Default action - index
     *
     * @return single blog article
     */
    public function index()
    {
        $metaData = array( 'meta-title' => 'About', 'about-active' => 'active' );
        $this->view->render( '/about/index', $metaData, $this->blog->about() );
    }
    
}
/* End of file About.php */
/* Location: core/controllers/About.php */
