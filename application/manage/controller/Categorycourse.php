<?php
/**
 * Created by PhpStorm.
 * User: M'S
 * Date: 2017/12/25
 * Time: 17:42
 */
namespace app\manage\controller;

use think\Db;
use think\Validate;

/*
 * 四表联接  专业课程 专业  课程  教师
 */
class Categorycourse extends Base{

    public function index(){

        $info = input('get.');

        $where = [];
        if(!empty($info['category'])){

            $where['a.categoryID'] = ['eq',$info['category']];
        }
        if(!empty($info['type'])){
            $where['c.type'] = ['eq',$info['type']];
        }
        if(!empty($info['name'])){
            $where['c.title'] = ['like',"%{$info['name']}%"];
        }


        $list = Db::table('categorycourse')
            ->alias('a')
            ->field('a.id,c.id as cid,c.title,b.name,c.type,b.studyTimes,b.point,d.realname,a.Flag')
            ->join('category b','a.categoryID = b.code','LEFT')
            ->join('course c','a.courseID = c.id','LEFT')
            ->join('teacher_info d','c.teacherIds = d.id','LEFT')
            ->where($where)
            ->paginate(20,false,['query'=>request()->get()]);

        $category = Db::table('category')->field('code,name')->where('Flag','eq',1)->select();
        $course = Db::table('course')->field('id,title')->where('status','eq',0)->select();

        $this->assign('typename','专业课程');
        $this->assign('list',$list);
        $this->assign('categorylist',$category);
        $this->assign('courselist',$course);
        $this->assign('page',$list->render());
        return $this->fetch();
    }

    public function edit(){
        //前台先获取资料
        if(isset($_GET['do'])=='get'){
            $id = $_GET['rid']+0;

            $have = Db::table('categorycourse')
                ->alias('a')
                ->field('a.id,a.categoryID,c.id as cid,c.title,b.name,c.type,b.studyTimes,b.point,d.realname,a.Flag')
                ->join('category b','a.categoryID = b.code','LEFT')
                ->join('course c','a.courseID = c.id','LEFT')
                ->join('teacher_info d','c.teacherIds = d.id','LEFT')
                ->where("a.id='$id'")->find();

            if(!$have){//如果这个code有
                return ['error'=>'没有此专业课程','code'=>'300'];
            }else{
                return ['info'=>$have,'code'=>'000'];
            }

        }

        /*
         * 这个表就2个关联的字段  categoryID 和课程id  所以只能修改这2个东西！！！！！！！！！！
         */
        $info = input('post.');

        $msg  =   [
            'rid.require' => '专业课程rid不能为空',
            'code.require' => '课程名称不能为空',
            'code.number' => '课程名称必须为数字',
            'category.require' => '专业名称不能为空',
        ];

        $validate = new Validate([
            'rid'    => 'require',
            'code'   => 'require|number',
            'category'   => 'require',
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('categorycourse');

        $id = $info['rid']+0;

        $data = [
            'categoryID'=>$info['category'],
            'courseID'=>$info['code'],
        ];
        /*
         * 这个表就2个关联的字段  categoryID 和课程id  所以只能修改这2个东西！！！！！！！！！！
         */
        $ok = $role_table->where('id',$id)->update($data);

        if($ok){
            return ['info'=>'修改成功','code'=>'000'];
        }else{
            return ['error'=>'修改失败','code'=>'200'];
        }
    }
}