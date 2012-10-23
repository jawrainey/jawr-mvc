<?php
/**
* Output data for blog
*/
class BlogModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    /**
     * Selects most recent article
     */
    public function indexArticle() 
    {
        return $this->db->select( 'SELECT uri, title, content, dateCreated, tags
                                   FROM articles
                                   WHERE tags = "blog"
                                   ORDER by dateCreated DESC
                                   LIMIT 1' );
    }
    
    /**
     * Selects unique article
     *
     * @param  string  $uri  Article uri
     * @return selected article
     */
    public function article($uri)
    {
        return $this->db->select( 'SELECT uri, title, content, dateCreated, tags
                                   FROM articles
                                   WHERE uri = :uri',
                                   array(':uri' => $uri) );
        
    }
    
    /**
     * Selects five most recent articles
     */
    public function displayFiveArticles()
    {
        return $this->db->select( 'SELECT uri, title, content, dateCreated, tags
                                   FROM articles
                                   WHERE tags = "blog"
                                   ORDER by dateCreated DESC
                                   LIMIT 5' );
    }
    
    /**
     * Selects all articles from database
     */
    public function archives()
    {
        return $this->db->select( 'SELECT uri, title, dateCreated
                                   FROM articles
                                   ORDER by dateCreated DESC' );
    }
    
    /**
     * Selects about page from database
     */
    public function about()
    {
        return $this->db->select( 'SELECT uri, title, content, dateCreated
                                   FROM articles
                                   WHERE tags = "about" ' );
    }
    
    /**
     * Selects all projects
     */
    public function projects()
    {
        return $this->db->select( 'SELECT uri, title, content, dateCreated
                                   FROM articles
                                   WHERE tags = "projects" ' );
    }
    
}
/* End of file Blog.php */
/* Location: core/models/Blog.php */
