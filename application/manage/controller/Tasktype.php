<?php
/**
 * Created by PhpStorm.
 * User: m's
 * Date: 2017/12/29
 * Time: 10:58
 */
namespace app\manage\controller;

use think\Db;

class Tasktype extends Base{

    public function index(){

        $list = Db::table('task_type')->field('id,name,code,Flag')->paginate(20);

        $this->assign('list',$list);
        $this->assign('page',$list->render());
        $this->assign('typename','任务类型');
        return $this->fetch();
    }
}