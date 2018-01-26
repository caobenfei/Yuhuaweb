<?php
/**
 * Created by PhpStorm.
 * User: Tian chen
 * Date: 2017/11
 * Time: 10:11
 */
return[
    //视图输出字符串内容替换
    'view_replace_str'       => [
        '__CSS__' => '/static/index/css/',
        '__IMG__' => '/static/index/img/',
        '__JS__' => '/static/index/js/',
        '__EXAMINATION_JS__'=>'/static/index/examinationjs/',
        '__MANAGE_JS__' => '/static/manage/js/',
        '__JSS__' => '/static/index/jss/',
        '__TEACHERCSS__' => '/static/index/teacher/css/',
        '__TEACHERJS__' => '/static/index/teacher/js/',
        '__TEACHERUPLOAD__' => '/static/index/teacher/webup/',
        '__VIDEO_HTML__'    =>  './../index/view/course/video-js/',
    ],

    'video_type'    =>  ['url','mp4','flv'],

    'apicode_message'          =>[
        //关于User相关的
        0       =>  '成功',
        100     =>  '用户注册失败',
        110     =>  '没有找到该用户',
        120     =>  '用户已经注册过',
        130     =>  '验证模型错误',
        140     =>  '密码错误',
        150     =>  '用户类型错误',
        160     =>  '用户已经被锁定',
        170     =>  '用户还未通过审核',
        171     =>  '非教师学员不能登陆',
        180     =>  '类型错误',
        181     =>  '取消点赞失败',//取消点赞失败
        182     =>  '已经点赞该条！',
        183     =>  '用户还未点赞该条！',
        184     =>  '还没有记录开始时间！',
        //关于课程Course相关的
        200     =>  '没有找到该课程',
        210     =>  '请求的错误课程类型',
        220     =>  '没有找到课程文件',
        230     =>  '没有找到笔记',
        240     =>  '用户已经收藏了该课程',
        250     =>  '用户还没收藏该课程',
        //题目相关的
        300     =>  '没有找到该问题',
        310     =>  '页码不能为空',
        //试卷相关的
        400     =>  '没有找到试卷',
        //话题相关的
        500     =>  '没有找到话题',
        //评论相关的
        600     =>  '没有找到评论',


        //文件上传部分
        700     =>  '文件格式不符合上传要求',//文件格式不符合上传要求
        710     =>  '文件超过大小限制',//文件超过大小限制
        //邮件发送部分
        800     =>  '邮件发送错误',

        //token验证
        900     =>  'token验证失败',
        910     =>  'user_token无效',
        920     =>  'user_token无效 验证失败',
        //关于请求的
        1000    =>  '错误的请求类型'
    ],

];