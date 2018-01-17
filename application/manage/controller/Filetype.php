<?php
/**
 * Created by PhpStorm.
 * User: m's
 * Date: 2017/12/29
 * Time: 10:58
 */
namespace app\manage\controller;

use think\Db;
use think\Validate;

class Filetype extends Base{

    public function index(){

        $list = Db::table('filetype')->field('id,classname,code,Flag')->paginate(20);

        $this->assign('list',$list);
        $this->assign('page',$list->render());
        $this->assign('typename','课程类型');
        return $this->fetch();
    }
    public function add(){
        $info = input('post.');

        $msg  =   [
            'classname.require' => '类型名称不能为空',
            'code.require' => '类型代码不能为空',
        ];
        $validate = new Validate([
            'classname'  => 'require',
            'code'   => 'require',
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('filetype');

        $is_have = $role_table->field('id')->where(['code'=>['eq',$info['code']]])->find();

        if($is_have){//如果这个code有
            return ['error'=>'已经有此代码','code'=>'300'];
        }

        $data = [
            'classname'         => $info['classname'],
            'code'      => $info['code'],
            'Flag'          => $info['flag'],
        ];

        $ok = $role_table->field('classname,code,Flag')->insert($data);
        if(is_numeric($ok)){
            manage_log('108','003','添加课程',serialize($data),0);
            return ['info'=>'添加成功','code'=>'000'];
        }else{
            return ['error'=>'添加失败','code'=>'400'];
        }
    }

    public function edit(){
        $info = input('post.');

        $msg  =   [
            'classname.require' => '类型名称不能为空',
            'code.require' => '类型代码不能为空',
        ];
        $validate = new Validate([
            'classname'  => 'require',
            'code'   => 'require',
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('filetype');
        $id=$info['rid']+0;
        $where['id']=array('neq',$id);
        $where['code']=$info['code'];
        $is_have = $role_table->field('id')->where($where)->find();

        if($is_have){//如果这个code有
            return ['error'=>'已经有此代码','code'=>'300'];
        }

        $data = [
            'classname'         => $info['classname'],
            'code'      => $info['code'],
            'Flag'          => $info['flag'],
        ];

        $ok = $role_table->field('classname,code,Flag')->where('id',$id)->update($data);
        if(is_numeric($ok)){
            manage_log('108','003','添加课程',serialize($data),0);
            return ['info'=>'修改成功','code'=>'000'];
        }else{
            return ['error'=>'修改失败','code'=>'400'];
        }
    }

    public function delete(){
        $id = $_GET['rid']+0;
        $ok = Db::name('filetype')->where('id',$id)->delete();

        if(is_numeric($ok)){
            return ['info'=>'删除成功','code'=>'000'];
        }else{
            return ['error'=>'删除失败','code'=>'200'];
        }
    }
}