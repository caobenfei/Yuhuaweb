<?php
/**
 * Created by PhpStorm.
 * User: m's
 * Date: 2018/1/2
 * Time: 14:34
 */
namespace app\manage\controller;

use think\Db;
use request;
use think\Validate;

/*
 * 课程任务管理
 */
class Coursetask extends Base{

    public function index(){

        $info = input('get.');
        $where = [];
        $id=$this->request->param('cid');
        $where['b.id']= $id;
        if(!empty($info['title'])){

            $where['a.title'] = ['like',"%{$info['title']}%"];
        }

        $list = Db::table('course_task a')
            ->field('a.id,a.title,a.mode,a.maxPoint,a.isOptional,a.isFree,a.maxOnlineNum,a.courseId,a.chapterid,a.type,a.mediaSource,a.length,a.mediaSource,a.status,a.startTime,a.endTime,b.title btit,cc.title as ctitle')
            ->join('course b','a.courseId=b.id','LEFT')
            ->join('course_chapter cc','a.chapterid=cc.courseid','LEFT')
            ->where($where)
            ->paginate(20,['query'=>$info]);

        $course = Db::table('course')->field('id,title')->select();
        //这里冲突了
        $chapter = Db::table('course_chapter')->field('id,title')->where('courseid',$id)->select();
        //$chapter = Db::table('course_chapter')->field('id,title')->where('courseid='.request()->get('cid'))->select();
        $taskmode = Db::table('task_mode')->field('id,name')->select();

        $this->assign('list',$list);
        $this->assign('course',$course);
        $this->assign('chapter',$chapter);
        $this->assign('taskmode',$taskmode);
        $this->assign('typename','课程任务');
        $this->assign('page',$list->render());
        return $this->fetch();
    }


    public function add(){
        $info = input('post.');


        $msg  =   [
            'title.require'     => '任务名称不能为空',
            'title.length'      => '任务名称长度太短',
            'startTime.require' => '开始时间不能为空',
            'endTime.require'   => '结束时间不能为空',
            'courseId.require'  => '课程不能为空',
            'chapterid.require'  => '课程章必须选择',
        ];
        $validate = new Validate([
            'title'     => 'require|length:2,20',
            'startTime' => 'require',
            'endTime'   => 'require',
            'courseId'  => 'require',
            'chapterid'  => 'require'

        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('course_task');

        $have = $role_table->field('id')->where("chapterid='{$info['chapterid']}'")->find();

        if($have){//如果没这个code
            return ['error'=>'已经有此章节','code'=>'300'];
        }

        $data = [
            'title' => $info['title'],
            'startTime' => $info['startTime'],
            'endTime'=> $info['endTime'],
            'chapterid'=> $info['chapterid'],
            'isFree'=>isset($info['isFree'])?$info['isFree']:0,
            'isOptional'=>isset($info['isOptional'])?$info['isOptional']:0,
            'mode'=>$info['mode'],
            'type'=>isset($info['type'])?$info['type']:'url',
            'length'=>isset($info['length'])?$info['length']:0,
            'mediaSource'=>isset($info['mediaSource'])?$info['mediaSource']:'',
            'maxOnlineNum'=>$info['maxOnlineNum']+0,
            'maxPoint'=>$info['maxPoint']+0,
            'courseId'=>$info['courseId']+0,
            'createdUserId'=>session('admin_uid'),
            'createdTime'=>date('Y-m-d H:i:s',time()),
            'status'=>$info['status'],
        ];

        $ok = $role_table->insert($data);

        if($ok){
            return ['info'=>'添加成功','code'=>'000'];
        }else{
            return ['error'=>'添加失败','code'=>'400'];
        }
    }


    public function edit(){

        $info = input('post.');

        $msg  =   [
            'rid'               =>'任务id不能为空',
            'title.require'     => '任务名称不能为空',
            'title.length'      => '任务名称长度太短',
            'startTime.require' => '开始时间不能为空',
            'endTime.require'   => '结束时间不能为空',
            'courseId.require'  => '课程不能为空',
            'chapterid.require'  => '课程章必须选择',
        ];
        $validate = new Validate([
            'rid'       => 'require',
            'title'     => 'require|length:2,20',
            'startTime' => 'require',
            'endTime'   => 'require',
            'courseId'  => 'require',
            'chapterid'  => 'require'
        ],$msg);

        $validate->check($info);

        $error = $validate->getError();//打印错误规则

        if(is_string($error)){
            return ['error'=>$error,'code'=>'200'];
        }

        $role_table = Db::name('course_task');

        $id = $info['rid']+0;
        $have = $role_table->field('id')->where("id='$id'")->find();

        if(!$have){//如果没这个code
            return ['error'=>'没有此任务','code'=>'300'];
        }

        $data = [
            'title' => $info['title'],
            'startTime' => $info['startTime'],
            'endTime'=> $info['endTime'],
            'chapterid'=> $info['chapterid'],
            'isFree'=>isset($info['isFree'])?$info['isFree']:0,
            'isOptional'=>isset($info['isOptional'])?$info['isOptional']:0,
            'mode'=>$info['mode'],
            'type'=>isset($info['type'])?$info['type']:'url',
            'length'=>isset($info['length'])?$info['length']:0,
            'mediaSource'=>isset($info['mediaSource'])?$info['mediaSource']:'',
            'maxOnlineNum'=>$info['maxOnlineNum']+0,
            'maxPoint'=>$info['maxPoint']+0,
            'courseId'=>$info['courseId']+0,
            'status'=>$info['status']
        ];

        $ok = $role_table->where('id',$id)->update($data);

        if($ok){
            return ['info'=>'修改成功','code'=>'000'];
        }else{
            return ['error'=>'修改失败','code'=>'200'];
        }
    }

    public function delete(){
            $id = $_GET['rid']+0;
            $ok=Db::name('course_task')->where("id='$id'")->delete();
            if(is_numeric($ok)){
                return ['info'=>'删除成功','code'=>'000'];//改为删除
            }else{
                return ['info'=>'删除失败','code'=>'400'];//改为删除
            }

    }
    public function upload(){

        $mediafile = new Mediaupload();
        $all = $mediafile->getfile();

        if($all['message']=='success'){

            //mp4上传
            $video_info = getVideoInfo($all['fileinfo']['name']);
            $duration = isset($video_info['duration'])?$video_info['duration']:NULL;
            $all['fileinfo']['duration'] = $duration;

        }

        echo json_encode($all);
        exit;

    }

}