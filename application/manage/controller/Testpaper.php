<?php
/**
 * Created by PhpStorm.
 * User: m's
 * Date: 2018/1/231
 * Time: 10:40
 */
namespace app\manage\controller;

use think\Db;
use think\Validate;

class Testpaper extends Base{

    public function index(){

        $info = input('get.');

        $where = [];
        if(!empty($info['type'])){
            $where['a.type'] = ['eq',$info['type']];
        }
        if(!empty($info['courseid'])){
            $where['a.courseid'] = ['eq',$info['courseid']];
        }
        if(!empty($info['stem'])){
            $where['a.stem'] = ['like',"%{$info['stem']}%"];
        }

        $list = Db::table('testpaper a')
            ->join('course b','a.courseid=b.id','LEFT')
            ->join('user c','a.createdUserId=c.id','LEFT')
            ->field('a.*,b.title,c.username')
            ->where($where)
            ->paginate(20);


        $qtype = [
            ['id'=>1,'name'=>'单选题','type'=>'single_choice'],
            ['id'=>2,'name'=>'多选题','type'=>'choice'],
            ['id'=>3,'name'=>'判断题','type'=>'determine'],
            ['id'=>4,'name'=>'问答题','type'=>'essay'],
        ];
        $course = Db::table('course')->where('teacherIds',session('admin_uid'))->select();


        $this->assign('course',$course);

        $this->assign('list',$list);
        $this->assign('page',$list->render());

        $this->assign('typename','试卷管理');
        $this->assign('qtype',$qtype);
        $this->assign('uid',session('admin_uid'));

        return $this->fetch();
    }

    public function add(){
        $info = input('post.');

        $msg  =   [
            'courseId.require' => '适用课程不能为空',
            'courseId.number' => '适用课程必须为数字',
            'stem.require' => '请填写题干',
        ];
        $validate = new Validate([
            'courseId'  => 'require|number',
            'stem'   => 'require',
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('testpaper');


        $data = [
            'stem'  => $info['stem'],
            'metas' => isset($info['metas'])?json_encode($info['metas']):'',
            'type'  => $info['type'],
            'courseId'=>$info['courseId'],
            'createdUserId'=>session('admin_uid'),
            'answer'=>isset($info['answer'])?json_encode($info['answer']):'',
            'difficulty'=>'normal',
            'createdTime'=>date('Y-m-d H:i:s',time()),

        ];

        $ok = $role_table->insert($data);

        if($ok){
            return ['info'=>'添加成功','code'=>'000'];
        }else{
            return ['error'=>'添加失败','code'=>'300'];
        }
    }

    public function addtest(){
        $course = Db::table('course')->where('teacherIds',session('admin_uid'))->select();

        $id = request()->get('id');
        $article = Db::table('testpaper')->where('id',$id)->find();


        $metas = !empty($article['metas'])?json_decode($article['metas']):'';

        $this->assign('article',$article);

        $this->assign('metas',$metas);
        $this->assign('id',$id);
        $this->assign('typename','试卷管理');
        $this->assign('course',$course);
        return $this->fetch();
    }

    public function delete(){
        $id = $_GET['rid']+0;
        $ok = Db::name('testpaper')->where('id',$id)->delete();

        if(is_numeric($ok)){
            return ['info'=>'删除成功','code'=>'000'];
        }else{
            return ['error'=>'删除失败','code'=>'200'];
        }
    }
}