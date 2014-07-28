<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display('login');
    }

    public function login($action = 'Add') {
        if(I('password') == C('ADMIN_PASSWD')){
            cookie('LOGIN',true,7*24*3600);
            echo 'OK';
        }
    }

    public function logout(){
        cookie('LOGIN',null);
        redirect("../..");
    } 

    public function test(){
        echo cookie('LOGIN');
    }
}