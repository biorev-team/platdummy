<?php 

class DataModel{
    
 public $id;
 public $color;    
 public $status;   

     public function setId($id){
        $this->id = $id;
    }
   public function setColor($color){
        $this->color = $color;
    }
   
    public function setStatus($status){
        $this->status = $status;
    }
    public function getId(){
        return $this->id;
    }
        public function getStatus(){
        return $this->status;
    }
    
     public function getColor(){
        return $this->color;
    }
}   

?>