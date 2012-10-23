<?php
/**
* Blog controller (Hear Ye, Hear Ye)
*/
class Blog
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
     * @return five most recent blog articles
     */
    public function index()
    {
        $metaData = array( 'meta-title' => 'Blog', 'blog-active' => 'active' );
                           
        $this->view->render( '/blog/index', $metaData, $this->blog->displayFiveArticles() );
    }
    
    /**
     * Unique article
     *
     * @param  string  $title  title of article to be displayed
     * @return single blog article
     */
    public function article($uri) 
    {
        $result = $this->blog->article($uri);
        //if no article, render an error 
        if (empty($result))
        {
            $this->view->render('error/error');
        }
        else
        {
            $metaData = array( 'meta-title' => $result[0]['title'], 'blog-active' => 'active' );
            
            $data = array( 'uri'         => $result[0]['uri'],
                           'title'       => $result[0]['title'],
                           'content'     => $result[0]['content'],
                           'dateCreated' => $result[0]['dateCreated'] );
            
            $this->view->render( '/blog/single', $metaData, $data );
        }
    }
    
    /**
     * The archives
     *
     * @return all I have written to date
     */
    public function archives()
    {
        $metaData = array( 'meta-title' => 'Archives', 'blog-active' => 'active' );
        
        $this->view->render('/blog/archives', $metaData, $this->blog->archives() ); 
    }
    
}
/* End of file Blog.php */
/* Location: core/controllers/Blog.php */
