<?php
/**
* Projects controller (My work)
*/
class Projects
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
     * @return all projects
     */
    public function index()
    {
        $metaData = array( 'meta-title' => 'Projects', 'projects-active' => 'active' );
        
        $this->view->render( '/projects/index', $metaData, $this->blog->projects() );
    }
    
}
/* End of file Projects.php */
/* Location: core/controllers/Projects.php */
