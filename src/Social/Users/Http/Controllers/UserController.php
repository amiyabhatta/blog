<?php

namespace Social\Users\Http\Controllers;

use Illuminate\Routing\Controller;
use Social\Services\Contracts\UserContract;


class UserController extends Controller
{
    protected $usercontainer;
    
    public function __construct(UserContract $usercontainer) {
        $this->usercontainer = $usercontainer;
    }
     
    public function getUser(){
        return $this->usercontainer->getUser();
    }
    
    public function testUsers(){
        dd("test1234");
    }
  
}
