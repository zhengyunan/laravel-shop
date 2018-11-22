<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            添加品牌
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
        <div class="x-body" >
            <form action="{{route('brand_doadd')}}" class="layui-form" method="post"  enctype="multipart/form-data">
               {{csrf_field()}} 
                <div class="layui-form-item">
                    <label  class="layui-form-label">品牌LOGO
                    </label>
                    <input type="file" name="logo">
                    <img id="LAY_demo_upload" width="400" Height="200" src="/images/banner.png">
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                    </label>
                </div>
                
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>品牌名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="brand_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>所属地区
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="attribution" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="describe" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button type="submit"  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
                    </button>
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;


            //   //图片上传接口
            //   layui.upload({
            //     url: '/upload.json' //上传接口
            //     ,success: function(res){ //上传成功后的回调
            //         console.log(res);
            //       $('#LAY_demo_upload').attr('src',res.url);
            //     }
            //   });
            

            //   //监听提交
            //   form.on('submit(add)', function(data){
            //     console.log(data);
            //     //发异步，把数据提交给php
            //     layer.alert("增加成功", {icon: 6},function () {
            //         // 获得frame索引
            //         var index = parent.layer.getFrameIndex(window.name);
            //         //关闭当前frame
            //         parent.layer.close(index);
            //     });
            //     return false;
            //   });
              
              
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