<?php
/**
 * Created by PhpStorm.
 * User: M'S
 * Date: 2017/12/26
 * Time: 15:52
 */
namespace app\manage\controller;

use think\Db;

class StudentEnroll extends Base{
    public function index(){

        $info = input('get.');

        $where = [];
        if(isset($info['admission'])){
            $where['admissionID'] = ['eq',$info['admission']];

        }
        if(isset($info['category'])){
            $where['categoryID'] = ['eq' ,$info['category']];
        }
        if(isset($info['starttime']) && isset($info['endtime'])){
            $where['a.createTime'] = ['between time',[$info['starttime']." 00:00:00", $info['starttime']." 23:59:59"]];
        }

        $list = Db::table('student_enroll')
            ->alias('a')
            ->join('category b','a.categoryID=b.code','LEFT')
            ->join('admission c','a.admissionID=c.id','LEFT')
            ->where($where)
            ->field('a.id,a.realname,a.sex,a.phone,a.admissionID,b.name,a.createTime,a.status,c.title')->paginate(20,false,['query'=>request()->get()]);

//        echo Db::table('student_enroll')->getLastSql();exit;

        $category = Db::table('category')->field('code,name')->where('Flag','eq',1)->select();

        $admission = Db::table('admission')->field('id,title')->select();
        $this->assign('typename','专业报名数据查询');

        $this->assign('list',$list);
        $this->assign('admission',$admission);
        $this->assign('categorylist',$category);
        $this->assign('page',$list->render());
        
        return $this->fetch();
    }
}