<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2017/12/8
 * Time: 17:19
 */
namespace app\manage\controller;

use think\Db;
use think\Validate;

class User extends Base{


    public function index(){

        $lists = Db::name('user a')
            ->join('role b','a.roles=b.id','LEFT')
            ->field('a.id,a.username,a.nickname,a.title,a.mobile,a.locked,a.mobile,a.roles,a.type,a.email,a.createdIp,a.createdTime,a.status,b.name')
            ->order('id desc')->paginate(20);


        $roles = Db::name('role')->field('id,name,code')->select();
        $types = [['id'=>0,'name'=>'超级管理员'],['id'=>'1','name'=>'管理员'],['id'=>'2','name'=>'教师'],['id'=>'3','name'=>'学员'],['id'=>'4','name'=>'企业']];

        $this->assign('list', $lists);
        $this->assign('roles', $roles);
        $this->assign('types', $types);
        $this->assign('typename','用户列表');
        $this->assign('page', $lists->render());
        return $this->fetch('index');
    }


    //添加用户
    public function add(){

        $info = input('post.');

        //错误信息提示
        $msg  =   [
            'user_name.require' => '用户名不能为空',
            'user_name.length' => '用户名长度太短',
        ];

        $validate = new Validate([
            'user_name'  => 'require|length:2,20', //我这里的token是令牌验证
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $user_table = Db::name('user');


        $data['username'] = $info['user_name'];
        $data['nickname'] = $info['user_name'];
        $data['password'] = password_hash('123456',PASSWORD_DEFAULT);
        $data['email'] = $info['user_email'];
        $data['mobile'] = $info['mobile'];
        $data['type'] = 3;
        $data['roles'] = isset($info['user_roles'])?$info['user_roles']:0;
        $data['locked'] = isset($info['user_locked'])?$info['user_locked']:0;
        $data['status'] = $info['status'];
        $data['title'] = 'static\index\images\avatar.png';
        $data['createdIp'] = request()->ip();
        $data['createdTime'] = date('Y-m-d H:i:s' ,time());
        $data['createUserID'] = session('admin_uid');

        $ok = $user_table->field('nickname,username,password,email,mobile,roles,type,locked,status,title,createdIp,createdTime,createUserID')->insert($data);

        if($ok){

            $sdata['userid'] = $user_table->getLastInsID();
            $sdata['mobile'] = $info['mobile'];
            $sdata['createdTime'] = date('Y-m-d H:i:s' ,time());
            Db::table('user_profile')->insert($sdata);

            manage_log('101','003','添加用户',serialize($info),0);
            return ['info'=>'添加成功','code'=>'000'];
        }else{
            return ['error'=>'添加失败','code'=>'400'];
        }


    }

    public function edit(){

        $info = input('post.');

        $msg  =   [
            'user_name.require' => '用户名称不能为空',
            'user_name.length' => '角色名称太短',
        ];

        $validate = new Validate([
            'user_name'  => 'require|length:1,20',
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }


        $user_table = Db::name('user');

        $id = $info['rid']+0;

        $have = $user_table->field('id')->where("id='$id'")->find();

        if(!$have){//如果没这个code
            return ['error'=>'没有此用户','code'=>'300'];
        }

//        var_dump($info);exit;
        $data['nickname'] = $info['user_name'];
        $data['type'] = $info['user_type'];
        $data['email'] = $info['user_email'];
        $data['mobile'] = $info['mobile'];
        $data['roles'] = isset($info['user_roles'])?$info['user_roles']:0;
        $data['status'] = isset($info['status'])?$info['status']:0;
        $data['locked'] = isset($info['user_locked'])?$info['user_locked']:0;

        $ok = $user_table->field('nickname,email,mobile,roles,type,locked,status')->where('id',$id)->update($data);

        if($ok){

            Db::table('user_profile')->where('userid='.$id)->update(['mobile'=>$info['mobile']]);
            manage_log('101','004','修改用户',serialize($info),0);
            return ['info'=>'修改成功','code'=>'000'];
        }else{
            return ['error'=>'修改失败','code'=>'200'];
        }
    }

    public function delete(){

        $id = $_GET['rid']+0;

        $ok = Db::name('user')->where("id='$id'")->delete();

        if($ok){
            return ['info'=>'删除成功','code'=>'000'];
        }else{
            return ['error'=>'删除失败','code'=>'200'];
        }
    }

}