<?php

namespace Social\Users\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Social\Services\Contracts\UserContract;
use Social\Services\Containers\UserContainer;
use Social\Models\User;

class UserController extends Controller
{
    protected $usercontainer;
    public function __construct(UserContract $usercontainer) {
        $this->usercontainer = $usercontainer;
    }
     
    public function getUser(){
        return $this->usercontainer->getUsersss123();
    } 
  
}
