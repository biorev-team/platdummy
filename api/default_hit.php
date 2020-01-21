<?php 
class Default{
    
    // call this method if any url is not according to predefine
    public function notFoundResponse(){
        $response['s'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
    
}


?>