<?php
/**
* Output UI
*/
class View
{
    /**
     * Renders HTML files to the user
     *
     * @param  string   $file  Location of file to render
     * @param  array    $metaData Passes meta-data to $file to be used
     * @param  array    $data  Passes data to $file to be used
     * @param  array    $errors Passes errors to $file to be used
     * @param  boolean  $noInclude  Prevents unauthorized file inclusion
     * @return file to be viewed by the user
     */
    public function render($file, $metaData = array(), $data = array(), $errors = array(), $noInclude = false)
    {
        if ( $noInclude == true )
        {
            require 'core/views/' . $file . '.php'; 
        }
        else
        {
            require 'core/views/layouts/header.php';
            require 'core/views/' . $file . '.php';
            require 'core/views/layouts/footer.php';
        }
    }
    
}
/* End of file View.php */
/* Location: /libraries/View.php */
