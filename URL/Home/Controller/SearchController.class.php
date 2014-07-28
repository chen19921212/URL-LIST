<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index($keyword = ''){
        $Url = M('url');
        $Tags =  M('tags');
        $condition['title'] = array('like','%'.$keyword.'%');
        $condition['url']   = array('like','%'.$keyword.'%');
        $condition['description'] = array('like','%'.$keyword.'%');
        $condition['_logic'] = 'or';
        $result = $Url -> where($condition) -> select();
        for($i=0;$i<count($result);$i++)
        {
            $tag = $Tags -> select($result[$i]['tid']);
            $result[$i]['tag'] = $tag[0]['tag'];
        }
        $this -> assign('count',count($result));
        $this -> assign('Url' , $result);
        $this->show();
    }
}