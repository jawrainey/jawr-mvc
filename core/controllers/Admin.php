<?php
/**
* Admin controller (CRUD!)
*/
class Admin
{
    public $view, $blog;
    
    function __construct($view, $adminModel, $input, $auth)
    {
        $this->view   = $view;
        $this->admin  = $adminModel;
        $this->input  = $input;
        $this->auth   = $auth;
    }
    
    /**
     * List of errors
     *
     * @var array
     * @access private
     */
    private $errors = array();
    
    /**
     * Admin area - Create/Read/Update/Delete articles
     */
    public function index() 
    {   
        $this->auth->filter();
        $data = $this->admin->in();
        $metaData = array('meta-title' => 'Admin Area', 'admin-active' => 'active');
        $this->view->render('admin/index', $metaData, $data);
    }
    
    /**
     * End current session by destroying all data set.
     */
    public function logout()
    {
        session_destroy();
        $cookieParams = session_get_cookie_params();
        setcookie( session_name(), '', 0, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly'] );
        unset($_SESSION);
        header('location: ' . URL);
        exit;
    }
    
    /**
     * Create a new article
     */
    public function create()
    {   
        $this->auth->filter();
        $data = array( 'tags'        => $this->input->fetch('tags'),
                       'uri'         => $this->admin->hyphenate( $this->input->fetch('title') ),
                       'title'       => $this->input->fetch('title'),
                       'content'     => $this->input->fetch('content'),
                       'dateCreated' => date('Y-m-d H:i:s'),
                       'action'      => 'create',
                       'mode'        => 'Create' );

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $this->errors = $this->input->validate();
            
            if ( empty( $this->errors ) )
            {
                
                if ( !$this->admin->compare_title($data['title']) )
                {
                    $this->admin->create($data);
                    header('location: ' . URL . 'blog/article/' . $data['uri'] . '/');
                    exit;
                }
                array_push($this->errors, "This post title is already in use.");
            }
        }
        
        $metaData = array('meta-title' => 'Create Post');
        
        $this->view->render('admin/cms', $metaData, $data, $this->errors);
    }
    
    /**
     * Update selected article
     *
     * @param  string  $uri  hyphenated article name
     * @return admin to updated blog
     */
    public function update($uri)
    {   
        $this->auth->filter();
        $article = $this->admin->read($uri);
        
        $metaData = array( 'meta-title' => 'Updating: ' . $article[0]['title'] );
        
        $data = array( 'id'      => $article[0]['article_id'],
                       'tags'    => $article[0]['tags'],
                       'uri'     => $article[0]['uri'],
                       'title'   => $article[0]['title'],
                       'content' => $article[0]['content'],
                       'action'  => 'update',
                       'mode'    => 'Update' );
                       
        if( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $this->errors = $this->input->validate();
            
            $content = array( 'id'          => $this->input->fetch('id'),
                              'tags'        => $this->input->fetch('tags'),
                              'uri'         => $this->admin->hyphenate( $this->input->fetch('title') ),
                              'title'       => $this->input->fetch('title'),
                              'content'     => $this->input->fetch('content'),
                              'dateCreated' => $date = date('Y-m-d H:i:s') );
                
            if ( empty( $this->errors ) )
            {   //if not true or the posted title is equal to the current one
                if ( !$this->admin->compare_title($content['title']) || $content['title'] == $article[0]['title'] )
                {
                    $this->admin->update($content);
                    header('location: ' . URL . 'blog/article/' . $content['uri'] . '/');
                    exit;
                }
                array_push($this->errors, "This post title is already in use.");
            }
        }
        $this->view->render('admin/cms', $metaData, $data, $this->errors);
    }
    
    /**
     * Delete article
     *
     * @param  string  $title  name of article
     */
    public function delete($title)
    {   
        $this->auth->filter();
        $this->admin->delete($title);
        header('location: ' . URL . 'admin/');
        exit;
    }
    
}
/* End of file Admin.php */
/* Location: core/controllers/Admin.php */
