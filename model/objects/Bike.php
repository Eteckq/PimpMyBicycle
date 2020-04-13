<?php

class Bike {
    public $id;
    public $user_id;

    public $data;

    public function __construct($id, $user_id, $data){
        $this->id = $id;
        
        $this->user_id = $user_id;
        $this->data = $data;
    }
}