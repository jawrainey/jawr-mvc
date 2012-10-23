<?php
/**
 * Database access class
 * Based on class by JREAMdesign (see:http://www.youtube.com/user/JREAMdesign)
 */
class Database extends PDO
{
    protected $db_config = array(
                    'dns' => 'mysql:host=YOUR_HOST;dbname=YOUR_DB_NAME',
                    'username' => 'YOUR_DB_USERNAME',
                    'password' => 'YOUR_DB_PASSWORD' );
                  
    public function __construct()
    {
        try
        {
            parent::__construct( $this->db_config['dns'], $this->db_config['username'], $this->db_config['password'] ); 
        }
        catch(PDOException $exception)
        {
            echo 'Darn, an error has occured...';
        }
    }
    /**
     * Select data from database
     *
     * @param  string   $query  SQL query to be run
     * @param  array    $bindParams Parameters to be bind
     * @return Selected data from database
     */
    public function select($query, $bindParams = array())
    {
        $sth = $this->prepare($query);
        
        foreach ($bindParams as $key => $value)
        {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        
        return $sth->fetchAll( PDO::FETCH_ASSOC );
    }
    
    /**
     * Insert data into database
     *
     * @param  string  $table  Name of table to store data to
     * @param  array   $data   Data to be stored
     */
    public function insert($table, $data = array() )
    {
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach ($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }
    
    /**
     * Update data in database
     *
     * @param  string  $table  Table to store data to
     * @param  array   $data   Data to be stored
     */
    public function update($table, $field, $where)
    {
      
        $fieldDetails = NULL;
        
        foreach($field as $key => $value)
        {
            $fieldDetails .= "`$key`=:$key,";
        }
        
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($field as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }
    
    /**
     * Delete data in database
     *
     * @param  string  $table  Table to store data to
     * @param  string  $where  expression to locate data
     */
    public function delete($table, $where)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT 1");
    }
    
}
/* End of file Database.php */
/* Location: /libraries/Database.php */
