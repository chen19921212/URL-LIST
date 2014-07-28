<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($tid = 1){
        session('tid',$tid);
        $Tags =  M('tags');
        $Url  =  M('url') -> where("tid=%d",$tid) -> select();
        $tag  =  $Tags -> select($tid);
        $this -> assign('Tags', $Tags ->  order('tag') -> select());
        $this -> assign('tag' , $tag['0']['tag']);
        $this -> assign('Url' , $Url);
        $this -> show();
    }
}