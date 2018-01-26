<?php
namespace app\index\controller;

use think\Exception;
use think\Controller;
use think\Db;
use think\Validate;
use think\Requst;

class Examination extends Home{

    //跳转考试弹框
    public function alert(){
        $courseid=$this->request->param('course');
        $where['courseid']=$courseid;
        $list=Db::name('testpaper')->where($where)->find();
        $list['count']=Db::name('testpaper_item')->where('paperId',$list['id'])->count();
        $this->assign('list',$list);
        $this->assign('courseid',$courseid);
        return $this->fetch();
    }

    //考试页面
    public function examination(){
        $courseid=$this->request->param('course');
        $where['t.courseid']=$courseid;
        $info=Db::name('testpaper_item as ti')
            ->join('testpaper t','ti.paperID=t.id')
            ->join('question q','ti.questionId=q.id')
            ->field('q.answer,q.id,ti.paperID,ti.questionid,ti.score,ti.questiontype,t.courseid,t.passedScore,t.name,t.description,t.score as total,q.stem,q.answer,q.metas')
            ->where($where)
            ->order('ti.id')
            ->select();
        $array=['0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E'];
        $num=$this->getExamination($courseid);//查询每种题型有几个积分
        foreach($info as $k=>$v){
            $data[$k]=$v;
            if(!empty($v['metas'])){
                $title=json_decode($v['metas']);
                $title1=$title->choices;
                $data[$k]['question']=$title1;
            }else{
                $data[$k]['question']=[];
            }

        }
        $this->assign('courseid',$courseid);
        $this->assign('num',$num);
        $this->assign('info',$data);
        $this->assign('status',$array);
        return $this->fetch();
    }
//    //考试页面数据处理
    public function getExamination($courseid){
        $where['t.courseid']=$courseid;
        $info=Db::name('testpaper_item as ti')
            ->join('testpaper t','ti.paperID=t.id')
            ->field('count(ti.id) as num,sum(ti.score) as score,questiontype')
            ->where($where)
            ->order('ti.id')
            ->group('questiontype')
            ->select();
        return $info;

    }
    //考试成绩
    public function examresults(){
        return $this->fetch();
    }
    //结束考试
    public function examend(){
        $info=input('get.');
        $list=Db::name('testpaper')
                ->where('id',$info['paperid'])
                ->find();
        $data=json_decode($list['metas'],true);
        $test=$this->getExamend($info,$data);
        $examination=$this->selectExamination($test['myscore'],$info['courseid']);//查询题目;
        $array=['0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E'];
        $num=$this->getExamination($info['courseid']);//查询每种题型有几个积分
        $this->assign('num',$num);
        $this->assign('status',$array);

        $this->assign('myscore',$test['myscore']);
        unset($test['myscore']);
        $this->assign('title',$test);
        $this->assign('list',$list);
        $this->assign('info',$examination);
        return $this->fetch();
    }

    //查询题目一级
    public function selectExamination($myscore,$courseid){
        $where['t.courseid']=$courseid;
        $info=Db::name('testpaper_item as ti')
            ->join('testpaper t','ti.paperID=t.id')
            ->join('question q','ti.questionId=q.id')
            ->field('q.answer,q.id,ti.paperID,ti.questionid,ti.score,ti.questiontype,t.courseid,t.passedScore,t.name,t.description,t.score as total,q.stem,q.answer,q.metas')
            ->where($where)
            ->order('ti.id')
            ->select();
        $data=$this->getSelectExamination($info);
        return $data;
    }
    //查询题目拼装数据
    public function getSelectExamination($info){
        $data=[];
        foreach($info as $k=>$v){

            $where['paperID']=$v['paperID'];
            $where['questionid']=$v['questionid'];
            $list=Db::name('testpaper_item_result')->where($where)->find();
            if($v['questiontype']=='single_choice'){
                $name='single';
            }elseif($v['questiontype']=='choice'){
                $name='choice';
            }elseif($v['questiontype']=='determine'){
                $name='determine';
            }
            $data[$name][$k]=$v;
            $data[$name][$k]['answer']=json_decode($v['answer'],true);
            if(!empty($list)){
                $data[$name][$k]['status']=$list['status'];
            }else{
                $data[$name][$k]['status']=3;
            }

            if(!empty($v['metas'])){
                $title=json_decode($v['metas']);
                $title1=$title->choices;
                $data[$name][$k]['question']=$title1;
            }else{
                $data[$name][$k]['question']=[];
            }


        }
        return $data;
    }
    //计算成绩存表
    public function getExamend($data,$mater){
        $info=[];
        $choicetrue=$signtrue=$determinetrue=$choiceflase=$signflase=$determineflase=$choicenone=$signnone=$determinenone=$choicescore=$signscore=$determinescore=0;
        $examination=[];
        foreach($data['data'] as $key=>$val){
            foreach($val['question'] as $k=>$v){
                if(isset($val['answer'][$v])) {
                    $list = Db::name('question')->where('id', $v)->find();
                    $info['paperID'] = $data['paperid'];
                    $info['itemID'] = 0;
                    $info['userid'] = $this->user->id;
                    $info['questionId'] = $v;
                    $info['answer'] = json_encode($val['answer'][$v]);
                    $info['resultId'] = 1;
                    if ($key == 'choice') {
                        $test = $val['answer'][$v];
                        $type = json_decode($list['answer'], true);
                        $choice = array_diff($test, $type);
                        if ($choice) {
                            $info['score'] = 0;
                            $info['status'] = 3;
                            $choiceflase+= 1;//多选答错几道题
                        } elseif (count($test) == count($type)) {
                            $info['score'] = $list['score'];
                            $choicescore+=$list['score'];//答对多少分
                            $info['status'] = 1;
                            $choicetrue = $choicetrue + 1;//多选答对几道题
                        } else {
                            $info['score'] = $list['score'] - (count($type) - count($test)) * $mater['missScores']['choice'];
                            $choicescore+=$info['score'];
                            $info['status'] = 2;
                            $choicetrue = $choicetrue + 1;//多选答对几道题
                        }
                    } else {
                        $test = $val['answer'][$v];
                        $type = json_decode($list['answer'], true);

                        if ($test == $type[0]) {
                            $info['score'] = $list['score'];
                            $info['status'] = 1;
                            if ($key == 'sign') {
                                $signtrue += 1;
                                $signscore+=$list['score'];
                            } else {
                                $determinetrue += 1;
                                $determinescore+=$list['score'];
                            }
                        } else {
                            $info['score'] = 0;
                            $info['status'] = 3;
                            if ($key == 'sign') {
                                $signflase += 1;
                            } else {
                                $determineflase += 1;
                            }
                        }
                    }
//                    $save = DB::table('testpaper_item_result')->insert($info);
                }else{
                    if($key=='sign'){
                        $signnone+=1;
                    }elseif($key="choice"){
                        $choicenone+=1;
                    }elseif($key="determine"){
                        $determinenone+=1;
                    }
                }
            }
        }
        $examination['myscore']=$signscore+$choicescore+$determinescore;
        $examination['sign']=['signtrue'=>$signtrue,'signflase'=>$signflase,'signnone'=>$signnone,'signscore'=>$signscore];
        $examination['choice']=['choicetrue'=>$choicetrue,'choiceflase'=>$choiceflase,'choicenone'=>$choicenone,'choicescore'=>$choicescore];
        $examination['determine']=['determinetrue'=>$determinetrue,'determineflase'=>$determineflase,'determinenone'=>$determinenone,'determinescore'=>$determinescore];
        return $examination;
    }
}