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
        <form action="{{route('goods_update',['id'=>$goods->id])}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}} 
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                    <input type="text" class="input-text" value="{{$goods->goods_name}}" placeholder="" id="" name="goods_name" required="" lay-verify="required"
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
                    <input  type="text" class="input-text" value="{{$goods->title}}" placeholder="" id="" name="title" required="" lay-verify="phone"
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
                    <input  type="text" class="input-text" value="{{$goods->goods_bianhao}}" placeholder="" id="" name="goods_bianhao" required="" lay-verify="phone"
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
                    <input   type="text" class="input-text" value="{{$goods->attribution}}" placeholder="" id="" name="attribution" required="" lay-verify="phone"
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
                    <input  type="text" class="input-text" value="{{$goods->content}}" placeholder="" id="" name="content" required="" lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>φ(≧ω≦*)♪
                    </div>
                </div>
                <h3>商品LOGO </h3>
                <div id="image-container">
                    <input class="preview" type='file' name='logo'>
                    <div class='img_preview'><img src="{{$goods->logo}}" width='120' height='120'></div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>品牌
                    </label>
                    <div class="layui-input-inline">
                      <select name="brand">
                      <option value="">请选择</option>
                            <?php foreach($brand as $v): ?>
                            <?php if($v['id']==$goods['brand_id']): ?>
                            <option selected="selected" value="<?=$v['id']?>"><?=$v['brand_name']?></option>
                            <?php else:?>
                            <option value="<?=$v['id']?>"><?=$v['brand_name']?></option>
                            <?php endif;?>
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
                        <?php if($goods['cat1_id']==$v['id']): ?>
                        <option selected="selected" value="<?=$v['id']?>"><?=$v['cat_name']?></option>
                        <?php else:?>
                        <option value="<?=$v['id']?>"><?=$v['cat_name']?></option>
                        <?php endif;?>
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
                    <!-- <button type="submit" class="layui-btn"  lay-submit="">
                        增加
                    </button> -->
                    <input type="submit" class="layui-icon" value="修改">
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/js/x-layui.js" charset="utf-8"></script>
        <script src="/js/jquery.min.js"></script>
        <script>
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
 

            var cat2_id = "<?=$goods['cat2_id']?>";
            var cat3_id = "<?=$goods['cat3_id']?>";
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
                          var str = "";
                          for(var i=0;i<data.length;i++){
                             if(data[i].id==cat2_id){
                                    str+='<option selected="selected" value="'+data[i].id+'">'+data[i].cat_name+'</option>'
                             } else{
                                    str+='<option value="'+data[i].id+'">'+data[i].cat_name+'</option>'
                              }
                          }
                          $("select[name=cat2_id]").html(str)
                          // 触发第二个框的 change 事件
                          $("select[name=cat2_id]").trigger('change');
                      }
                  });
              }
        });  


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
                             if(data[i].id==cat3_id){
                                    str+='<option selected="selected" value="'+data[i].id+'">'+data[i].cat_name+'</option>'
                             } else{
                                    str+='<option value="'+data[i].id+'">'+data[i].cat_name+'</option>'
                              }
                          }
                          $("select[name=cat3_id]").html(str)
                          // 触发第二个框的 change 事件
                          $("select[name=cat3_id]").trigger('change');
                      }
                  });
              }
        });
        //  修改时自动触发   不用点击   （要不然二三级没数据）
        $("select[name=cat1_id]").trigger("change");





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