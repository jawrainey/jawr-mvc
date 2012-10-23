<?php
/**
 * Form input class
 */
class Input
{
    /**
     * Fetch specific field from POST array
     *
     * @param  string  $table  Table to store data to
     * @param  array   $data   Data to be stored
     * return posted field or null
     */
    public function fetch($field = '')
    {
        if ( isset( $_POST[$field] ) )
        {
            return $_POST[$field];
        }
        else
        {
            return null;
        }
    }

    /**
     * Minimum length form field validation
     *
     * @param  string  $table  Table to store data to
     * @param  array   $data   Data to be stored
     * return an array of errors
     */
    public function validate()
    {
        $errors = array();
        
        foreach ( $_POST as $key => $value )
        {   
            if ( !isset( $value[0]) )
            {
                array_push( $errors, ( ucfirst($key) . " is too short or empty.") );
            }
        }
        return $errors;
    }
    
}
/* End of file Input.php */
/* Location: /libraries/Input.php */
