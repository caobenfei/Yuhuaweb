<?php
/**
 * Created by PhpStorm.
 * User: Tian chen
 * Date: 2017/11
 * Time: 10:11
 */
return[
    // 默认输出类型
    'default_return_type'    => 'json',
    //视图输出字符串内容替换
    'view_replace_str'       => [
        '__CSS__' => '/static/index/css/',
        '__IMG__' => '/static/index/images/',
        '__JS__' => '/static/index/js/',
        '__JSS__' => '/static/index/jss/',
    ],

    'alidayu'       => [
        'app_key'    => '23953147',
        'app_secret' => '3904c9cae716283181c0465bb0df45c4',
        // 'sandbox'    => true,  // 是否为沙箱环境，默认false
    ],


    'apicode_message'          =>[
        //关于User相关的
        0       =>  '成功',
        100     =>  '用户注册失败',
        110     =>  '没有找到该用户',
        120     =>  '用户已经注册过',
        130     =>  '验证模型错误',
        140     =>  '密码错误',
        150     =>  '用户类型错误',
        160     =>  '用户已经被',
        170     =>  '用户还未通过审核',
        171     =>  '非教师学员不能登陆',
        180     =>  '类型错误',
        181     =>  '取消点赞失败',//取消点赞失败
        182     =>  '已经点赞该条！',
        183     =>  '用户还未点赞该条！',
        184     =>  '还没有记录开始时间！',
        185     =>  '用户签到了',
        186     =>  '用户还没签到',
        187     =>  '签到失败',
        188     =>  '输入验证码不正确',
        189     =>  '用户还没有分配专业',
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
        410     =>  '试卷正在审批中！',
        420     =>  '还没有做这张试卷',
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
        1000    =>  '错误的请求类型',

        //外部api
        1100    =>  '短信发送失败',
    ],
];