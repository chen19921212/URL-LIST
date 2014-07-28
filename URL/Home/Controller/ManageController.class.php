<?php
namespace Home\Controller;
use Think\Controller;
class ManageController extends Controller {

    public function index($tid = 1){
        session('tid',$tid);
        $Tags =  M('tags');
        $Url  =  M('url')  -> where("tid=%d",$tid) -> select();
        $tag  =  $Tags -> select($tid);
        $this -> assign('Tags', $Tags -> order('tag') ->  select());
        $this -> assign('tag' , $tag['0']['tag']);
        $this -> assign('Url' , $Url);
        $this->show();
    }

    public function getTag() {
        $tid  =  I('tid');
        $Tags =  M('tags');
        $tag  =  $Tags -> select($tid);
        echo $tag['0']['tag'];
    }

    public function updateTag() {
        if(!isset($_COOKIE['LOGIN'])) die($this->error("请登录","/User",1));
        $Tags = M('tags');
        $Tags -> create();
        if($Tags -> save())
            echo 'OK';
    }

    public function deleteTag($tid) {
        if(!isset($_COOKIE['LOGIN'])) die($this->error("请登录","/User",1));
        M('tags') -> delete($tid);
        M('url')  -> where('tid='.$tid) -> delete();
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function getUrl($uid = 1) {
        $url  =  M('url')  -> select($uid);
        $url_info = array ('uid'=> $url['0']['uid'],'title'=> $url['0']['title'],'url'=>$url['0']['url'],'description'=>$url['0']['description']);
        echo json_encode($url_info);
    }

    public function updateUrl(){
        if(!isset($_COOKIE['LOGIN'])) die($this->error("请登录","/User",1));
        $Url =  M('url');
        $Url -> create();
        if($Url -> save())
            echo 'OK';
    }

    public function deleteUrl($uid) {
        if(!isset($_COOKIE['LOGIN'])) die($this->error("请登录","/User",1));
        if(M('url') -> delete($uid))
            echo 'OK';
    }

    public function MoveUrl($uid) {
        if(!isset($_COOKIE['LOGIN'])) die($this->error("请登录","/User",1));
        $Url =  M('url');
        $Url -> create();
        if($Url -> save())
            echo 'OK';
    }
}