<?php

namespace Social\Services\Containers;
use Social\Services\Contracts\UserContract;

class UserContainer implements UserContract{
   
    protected $userModel;
    public function __construct($userModel) {
       $this->userModel = $userModel;
    } 
    public function getUser(){
       return $this->userModel->getAllUser(); 
    }
}

