<?php
namespace app\manage\controller;
/**
 * Created by phpstorm.
 * User: m's
 * Date: 2017/12/5
 * Time: 17:16
 *
 */

class Manage extends Base{

    public function index(){
        return view('index');
    }

    public function test(){
        echo 12;
    }
}