<?php
namespace Home\Controller;
use Think\Controller;
class AddController extends Controller {

    public function index(){
        $Tags = M('tags') -> order('tag') -> select();
        $this -> assign('Tags',$Tags);
        $this -> assign('tid',session('tid'));
        $this->show();
    }

    public function addUrl(){
        $Url = M('url');
        if($Url->create()){
            if($Url->add())
                redirect("../Index/index/tid/".session('tid'));
            else
                $this->error('添加失败');
        }
    }

    public function addTag(){
        $Tags = M('tags');
        if($Tags->create()){
            if($Tags->add())
                redirect(".");
            else
                $this->error('添加失败');
        }
    }
}