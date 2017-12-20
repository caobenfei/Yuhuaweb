<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\wamp\www\tp5-yuhuaweb\public/../application/manage\view\category\index.html";i:1513748008;s:77:"D:\wamp\www\tp5-yuhuaweb\public/../application/manage\view\manage\header.html";i:1513749979;s:77:"D:\wamp\www\tp5-yuhuaweb\public/../application/manage\view\manage\bottom.html";i:1513652499;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>后台管理-<?php echo !empty($typename)?$typename:''; ?></title>

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="__CSS__font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__animate.min.css" rel="stylesheet">
    <!--<link href="__CSS__style.min.css?v=4.0.0" rel="stylesheet">-->
</head>
<body>
<div class="container-fluid">
    <?php 
    $uid = session('admin_uid');
    $access = check($uid,['/manage/category/edit','/manage/category/delete','/manage/category/add']);
     ?>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>栏目功能ID</th>
            <th width="26%">功能栏目名称</th>
            <th>代码</th>
            <th>操作链接</th>
            <th>是否开启</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['id']; ?></td>
            <td>
                <strong>
                    <a href="#" onclick="add_edit('edit',<?php echo $vo['id']; ?>);"  data-toggle="modal" data-target="#myModal"><?php echo $vo['levelHtml']; ?><?php echo $vo['name']; ?></a>
                </strong>
            </td>
            <td>
                <strong>
                    <a href="#" onclick="add_edit('edit',<?php echo $vo['id']; ?>);"  data-toggle="modal" data-target="#myModal"><?php echo $vo['code']; ?></a>
                </strong>
            </td>
            <td><?php echo $vo['url']; ?></td>
            <td><?php echo !empty($vo['flag'])?'是':'否'; ?>              </td>
            <td>
                <?php 

                foreach($access as $k=>$v){

                    if($v=='/manage/category/edit'){
                        echo '<a href="#" onclick="add_edit(\'edit\','.$vo['id'].');"  data-toggle="modal" data-target="#myModal">编辑</a>';
                        echo '<strong>/</strong>';
                    }elseif($v=='/manage/category/delete'){
                        echo '<a href="#" onclick="deleteCategory('.$vo['id'].');">删除</a>';
                    }elseif($v=='/manage/category/add'){
                        echo '<strong>/</strong>';
                        echo '<a href="#" onclick="add_edit(\'addSon\','.$vo['id'].','.$vo['code'].')" data-toggle="modal" data-target="#myModal">添加子功能栏目</a>';
                    }
                }
                 ?>

            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

    </table>
    <div class="view">
        <?php 
        foreach($access as $k=>$v){
            if($v=='/manage/category/add'){
                echo '<a class="btn btn-primary" onclick="add_edit(\'add\');"  data-toggle="modal" data-target="#myModal">添加功能栏目</a>';
            }
        }
         ?>

    </div>
    <ul class="pagination">
        <?php echo $page; ?>
    </ul>

    <!--添加栏目-->
    <!-- 模态框 -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">添加功能栏目</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form1" method="post" action="<?php echo url('add'); ?>">
                        <div class="form-group">
                            <label for="category_name" class="col-sm-2 control-label">栏目名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_name" name="name"
                                       placeholder="请输入功能栏目名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_code" class="col-sm-2 control-label">栏目代码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_code" name="code"
                                       placeholder="请输入栏目代码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_url" class="col-sm-2 control-label">栏目url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_url" name="url"
                                       placeholder="请输入栏目url">
                            </div>
                        </div>
                        <input type="text" name="parentcode" value="" id="parentcode"/>
                        <input type="text" name="rid" value="" id="selfcode"/>
                        <!--<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />-->
                        <!-- 模态框底部 -->
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>-->
                            <button type="button" class="btn btn-default" id="add_category" onclick="dopost('add');">添加</button>
                            <button type="button" class="btn btn-default" id="edit_category" style="display:none;" onclick="dopost('edit')">修改</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <!--添加功能栏目结束-->
    <!--删除功能提示-->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">删除功能栏目成功</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">

                    删除功能栏目成功！

                </div>



            </div>
        </div>
    </div>
    <!--删除功能栏目提示结束-->
</div>
<script src="__JS__jquery.min.js?v=2.1.4"></script>
<script src="__JS__bootstrap.min.js?v=3.3.5"></script>
<script src="__JS__plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="__JS__plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="__JS__plugins/layer/layer.min.js"></script>
<script src="__JS__hplus.min.js?v=4.0.0"></script>
<script type="text/javascript" src="__JS__contabs.min.js"></script>
<script src="__JS__plugins/pace/pace.min.js"></script>
<script type="text/javascript">
/*
一共4种方法，添加新功能，添加子功能，修改功能栏目，删除功能
*/
    /*添加子类*/

    function add_edit(type,id,parentcode) {

        switch (type){
            case 'add':

                $(" input[ type='text' ] ").val('')
                $(" input[ type='hidden' ] ").val('')
                $('#add_category').show()
                $('#edit_category').hide()
                break;
            case 'addSon':

                $(" input[ type='text' ] ").val('')
                $(" input[ type='hidden' ] ").val('')
                $('#parentcode').val(parentcode)
                $('#add_category').show()
                $('#edit_category').hide()
                break;
            case 'edit':
                $('#selfcode').val(id)//如果是修改,id是自己
                $('#parentcode').val('')
                $('#add_category').hide()
                $('#edit_category').show()
                $.get("<?php echo url('edit'); ?>?do=get&rid="+id,function (data) {
                    $('#category_name').val(data.info.name)
                    $('#category_code').val(data.info.code)
                    $('#selfcode').val(data.info.id)
                    $('#category_url').val(data.info.code)
                });
                
                break;
            default:
                alert('error')
        }


    }


    function dopost($url) {
        $url=='add'?"<?php echo url('add'); ?>":"<?php echo url('edit'); ?>";

        $.ajax({
            url: $url+"?"+Math.random(),
            type:"post",
            data:$("#form1").serialize(),
            success:function(data){

                console.log(data);
                if(data.code=='000'){

                    alert(data.info)
                    $('#parentcode').val('')//清空

                    $('#selfcode').val('')//必须清空

                    $('#myModal').modal('hide')

                }else{
                    alert(data.error)
                }

            },
            error:function(e){
                alert("添加信息错误");
            }
        });
    }

    function deleteCategory(id) {
        $.get("<?php echo url('delete'); ?>?rid="+id,function (data) {
            if(data.code=='000'){
                alert(data.info)
                $('#myModal2').modal('hide')
            }else{

            }
        });
    }


</script>
</body>
</html>