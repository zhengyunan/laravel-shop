<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            添加商品
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/css/x-admin.css" media="all">
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="all">
        <style>
            
            p.error{
                color:#F00;
                font-weight:bold;
            }
            .x-red{
                color:#F0F;
            }
        </style>
    </head>
    
    <body>
        <div class="x-body">
        <form action="{{route('goods_tianjia')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}} 
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                    <input type="text" class="input-text" value="{{old('goods_name')}}" placeholder="" id="" name="goods_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                   
                        <span class="x-red">*</span>φ(≧ω≦*)♪
                    
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>标题
                    </label>
                    <div class="layui-input-inline">
                    <input  type="text" class="input-text" value="{{old('title')}}" placeholder="" id="" name="title" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>编号
                    </label>
                    <div class="layui-input-inline">
                    <input  type="text" class="input-text" value="{{old('goods_bianhao')}}" placeholder="" id="" name="goods_bianhao" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>  
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>产地
                    </label>
                    <div class="layui-input-inline">
                    <input   type="text" class="input-text" value="{{old('attribution')}}" placeholder="" id="" name="attribution" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>详细内容
                    </label>
                    <div class="layui-input-inline">
                    <input  type="text" class="input-text" value="{{old('content')}}" placeholder="" id="" name="content" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
            <h3>商品LOGO </h3>
            <div id="image-container">
                <input class="preview" type='file' name='logo'>
            </div>

                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>品牌
                    </label>
                    <div class="layui-input-inline">
                      <select name="brand">
                      <option value="">请选择</option>
                        <?php foreach($brand as $v): ?>
                            <option value="<?=$v['id']?>">
                            <?=$v['brand_name']?>
                            </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>总分类
                    </label>
                    <div class="layui-input-inline">
                      <select name="cat1_id">
                      <option value="">请选择</option>
                        <?php foreach($category as $v): ?>
                            <option value="<?=$v['id']?>">
                            <?=$v['cat_name']?>
                            </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>二级分类
                    </label>
                    <div class="layui-input-inline">
                      <select name="cat2_id"></select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>三级分类
                    </label>
                    <div class="layui-input-inline">
                      <select name="cat3_id"></select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    
                    <input type="submit" class="layui-icon" value="增加">
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/js/x-layui.js" charset="utf-8"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/img_preview.js"></script>
        <script>
        // ---------------添加图片---------

        function del_attr(o)
        {
            if(confirm("确定要删除吗？"))
            {
                var table = $(o).parent().parent().parent().parent()
                table.prev('hr').remove()
                table.remove()
            }
            
        }
     
        

           
            // 绑定预览事件
            $(".preview").change(function(){
                // 获取选择的图片
                var file = this.files[0];
                // 转成字符串
                var str = getObjectUrl(file);
                // 先删除上一个
                $(this).prev('.img_preview').remove();
                // 在框的前面放一个图片
                $(this).before("<div class='img_preview'><img src='"+str+"' width='120' height='120'></div>");
            });
       

        // ----------添加图片结束
        //  三级联动
        $("select[name=cat1_id]").change(function(){
              // 取出以及分类时的id
              var id = $(this).val();
            //   console.log(id);
              if(id!=""){
                //   console.log("11");
                  $.ajax({
                      url:"{{route('category_liandong')}}?id="+id,
                      type:"GET",
                    //   date:{id},
                      dataType:"json",
                      success:function(data){
                        //   console.log(data);
                          var str = "";
                          for(var i=0;i<data.length;i++){
                            str += '<option value="'+data[i].id+'">'+data[i].cat_name+'</option>';
                          }
                          $("select[name=cat2_id]").html(str)
                          // 触发第二个框的 change 事件
                          $("select[name=cat2_id]").trigger('change');
                      }
                  })
              }else{
                $("select[name=cat2_id]").html("")
                $("select[name=cat3_id]").html("")
              }
        })  


          $("select[name=cat2_id]").change(function(){
              // 取出以及分类时的id
              var id = $(this).val();
            //   console.log(id);
              if(id!=""){
                //   console.log("11");
                  $.ajax({
                      url:"{{route('category_liandong')}}?id="+id,
                      type:"GET",
                    //   date:{id},
                      dataType:"json",
                      success:function(data){
                          var str = "";
                          for(var i=0;i<data.length;i++){
                            str += '<option value="'+data[i].id+'">'+data[i].cat_name+'</option>';
                          }
                          $("select[name=cat3_id]").html(str)
                          // 触发第二个框的 change 事件
                          $("select[name=cat3_id]").trigger('change');
                      }
                  })
              }
        })





            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            
              //自定义验证规则
              form.verify({
                nikename: function(value){
                  if(value.length < 5){
                    return '昵称至少得5个字符啊';
                  }
                }
                ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                ,repass: function(value){
                    if($('#L_pass').val()!=$('#L_repass').val()){
                        return '两次密码不一致';
                    }
                }
              });

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