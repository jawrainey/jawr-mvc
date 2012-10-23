<?php 
/**
* Access and control data for Admin controller
*/
class AdminModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    /**
     * Selects all articles from database
     * 
     * @return All articles
     */
    public function in()
    {
        return $this->db->select( 'SELECT uri, title, dateCreated
                                   FROM articles
                                   ORDER BY dateCreated DESC');
    }
    
    /**
     * Creates a new article
     *
     * @param  array  $data Data to be inserted into database
     */
    public function create($data)
    {       
        $this->db->insert('articles', array('tags'        => $data['tags'],
                                            'uri'         => $data['uri'],
                                            'title'       => $data['title'],
                                            'content'     => $data['content'],
                                            'dateCreated' => $data['dateCreated'] ) );
    }
    
    /**
     * Selects unique article
     *
     * @param  string  $title  Article title
     * @return selected article
     */
    public function read($uri)
    {
        return $this->db->select( 'SELECT article_id, uri, title, content, dateCreated, tags
                                   FROM articles
                                   WHERE uri = :uri',
                                   array( ':uri' => $uri ) );
    }
    
    /**
     * Updates an article
     *
     * @param  array  $content Posted data to be updated
     */
    public function update($content)
    {
        $data = array( 'tags'        => $content['tags'],
                       'uri'         => $content['uri'],
                       'title'       => $content['title'],
                       'content'     => $content['content'],
                       'dateCreated' => $content['dateCreated'] );
                          
        $this->db->update('articles', $data, "`article_id` =" . $content['id'] );
    }
    
    /**
     * Deletes an article
     *
     * @param  string  $title  Location of file to render
     */
    public function delete($uri)
    {
        return $this->db->delete('articles', "uri = '$uri'");
    }
    
    /**
     * Checks database to see if title is already in use
     *
     * @param  string  $title  Location of file to render
     * @return true or false based on the result
     */
    public function compare_title($title)
    {
        $result = $this->db->select( 'SELECT title FROM articles where title = :title', array( ':title' => $title ) );
        
        if ( count($result) > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Hyphenates a title to create a URI
     * 
     * @param  string  $title  title to convert
     * @return parsed title to uri
     */
    public function hyphenate($title)
    {
        $title = strtolower(str_replace(array("%20", " "), '-', $title));
        $title = preg_replace('/[^a-z\-]/i','',$title);
        return $title;
    }
    
}
/* End of file Admin.php */
/* Location: core/models/Admin.php */
