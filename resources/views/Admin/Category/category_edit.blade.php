<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form action="{{route('category_update',['id'=>$category->id])}}" method="post" class="layui-form" >
            {{csrf_field()}}     
            <div class="layui-form-item">
                    <label for="id" class="layui-form-label">
                        ID
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="id" name="id" required="" lay-verify="required"
                        autocomplete="off"  value="{{$category->id}}" disabled="" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="cat_name" class="layui-form-label">
                        <span class="x-red">*</span>分类名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="cat_name" name="cat_name" value="{{$category->cat_name}}" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-inline" >
                    
                        <select name="parent_id">
                                @if($category->level==0)
                                    <option value="0">最高分类</option>
                                    @foreach($categories as $v) 
                                        @if($v->level==1||$v->level==2)
                                            <option value="<?= $v->id ?>"><?php  echo  $v->cat_name ?></option>
                                        @endif
                                    @endforeach
                                @else
                                @foreach($categories as $v) 
                                @if($v->level==0||$v->level==1)
                                    @if($category->parent_id==$v->id)
                                        <option selected="selected" value="<?= $v->id ?>"><?php  echo  $v->cat_name ?></option>
                                    @else
                                        <option value="<?= $v->id ?>"><?php  echo  $v->cat_name ?></option>
                                    @endif
                                @endif
                                @endforeach
                               @endif
                        </select>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" type="submit" >
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            

            //   监听提交
              form.on('submit(save)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });
        </script>
        
    </body>

</html>