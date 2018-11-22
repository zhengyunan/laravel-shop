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
            <form action="{{route('role_update',['id'=>$role_only->id])}}" method="post" class="layui-form layui-form-pane">
               {{csrf_field()}}    
            <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="role_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input" value="{{$role_only->role_name}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            @foreach($rulecat as $v)
                            <tr>
                                <td>
                                    {{$v->cat_name}}
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                         @foreach($rule as $k )
                                            @if($v->id==$k->cat_id)
                                           
                                                   <input name="rule_id[]" <?php if(in_array($k->id,$r)) echo 'checked' ?> type="checkbox" value="{{$k->id}}"> {{$k->rule_name}}
                                
                                           @endif
                                         @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="content" class="layui-textarea">{{$role_only->content}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" type="submit">修改</button>
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

              //监听提交
              form.on('submit(add)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });
        </script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>

</html>