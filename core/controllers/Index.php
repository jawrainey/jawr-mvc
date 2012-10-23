<?php
/**
* Index controller (Welcome home)
*/
class Index
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
    function index()
    {
        $data = $this->blog->indexArticle();
        
        $metaData = array( 'meta-title'  => $data[0]['title'],
                           'home-active' => 'active' );
        
        $this->view->render('index/index', $metaData, $data );  
    }
    
}
/* End of file Index.php */
/* Location: core/controllers/Index.php */
