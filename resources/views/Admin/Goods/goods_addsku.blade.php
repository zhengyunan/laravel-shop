<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="/css/bootstrap.min.css" media="all">
<title>新增图片</title>
<style>
    .skutitle{
        margin-left:50px;
        margin-bottom:100px;
        width:80px;
        font-size:20px;
    }
    .addsku{
        margin-left:70px;
        margin-top:50px;
        
    }
    #skuul{
        margin-top:40px;
        margin-bottom:30px;
		margin-left: 18px;
    }
    #input-text{
        width:100px;
    }
    .img-container {
    /* width: 200px;
    height: 200px;
    float:left;
    margin-left: 390px;
    margin-top: -79px; */
}
.img-preview {
    float: left;
    overflow: hidden;
    margin-left: 20px;
}
.preview-lg {
    width: 240px;
    height: 240px;
}
.preview-md {
    width: 80px;
    height: 80px;
}
.addspec{
    background:skyblue;
    color:black;
}
hr{
	width:100%;
}
.spec_list{
	width:310%;
	height: 100%;
}

ul li span{
	display:inline-block;
	background:skyblue;
	text-align: center;
	font-size: 14px;
	font-weight: normal;
	border-radius: 4px;
	margin-left:15px;
	margin-bottom:15px;
	padding: 5px 8px;
}
.form-label{
	width:120px;
}
#specul{
	margin-bottom:20px;
}
#specul li{
	display:inline-block;
	margin-top:40px;

	margin-left: 10px;
}
select{
	margin-left:8px;
}
.ullist{
	margin-top: -14px;
    margin-left: -12px;
    margin-bottom: -10px;
	float: right;
	margin-right: 140px;
}
.ullist2{
	margin-top: -22px;
    margin-left: -134px;
    margin-bottom: -20px;
    float: right;
}
.del{
	margin-left: -69px;
}
#Button_operation{
	margin-left:150px;
	margin-top:100px;
}
.specli{
	margin-right:30px;
}
#dd{
	margin-left:0px;
}
</style>
</head>
<body>
<div class="clearfix" id="add_picture">

  </div>
  </div>  
  </div>
   <div class="page_right_style">
   <div class="type_title">添加商品</div>
   
	<form action="{{route('Admindoaddsku',['id'=>$id])}}" method="post"  enctype="multipart/form-data">
    {{csrf_field()}}
        
        <div>
            <span class="skutitle">规格：</span>
            <input type="text" value="" id="spec_val">
            <input type="button" value="新建规格" class="btn-warning" id="spec">
		</div>
		
        <div class="spec_list">
			<ul id="skuul">
				@foreach($Attribute_key as $v)
				<li>
					<label class="form-label col-2">{{$v->attr_name}}:</label>
					<!--  -->
					@foreach($v->vals as $k)
					<span>{{$k->attr_val}}</span>
					@endforeach
					<input type="text" name="" id="specname_val{{$v->id}}">
					<input type="button" value="新建" onclick="addval({{$v->id}})" class="btn-warning"  id="specval">
				</li>
				@endforeach
				
			</ul>
			
		</div>
		

		<hr>
		<span class="skutitle">sku添加</span>
        <input id="addsku" type="button" value="sku添加" >
        <div class="clearfix cl">
           <ul id="specul">
		   		@foreach($Attribute_key as $v)
                <li>
					<div class="specli">
						<label class="form-label col-2">{{$v->attr_name}}:</label>
						<select name="sku_all{{$v->id}}[]" id="dd">
							@foreach($v->vals as $k)
							<option value="{{$k->id}}">{{$k->attr_val}}</option>
							@endforeach
						</select>
					</div>	
				</li>
				@endforeach
                <br>
                <li>
					<div class="ullist">
						<label class="form-label col-2">sku标题：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="sku_name[]"></div>
					</div>
				
                </li>
                <li>
					<div class="ullist">
						<label class="form-label col-2">库存：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="stock[]"></div>
					</div>
				
                </li>
                <li>
					<div class="ullist">
						<label class="form-label col-2">价 格：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="price[]"></div>
					</div>
                </li>
                <li>
					<div class="ullist">
						<label class="form-label col-2">现 价：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="old_price[]"></div>
					</div>
                </li>
           </ul>
		</div>
		
		<h3>商品图片 <input id="btn-image" onclick="addImg(this)" type="button" value="添加一个图片"></h3>
            <div id="image-container">
                <table width="100%">
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input class="preview" type='file' name='image[]'>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input onclick="del_attr(this)" type="button" value="删除">
                        </td>
                    </tr>
                </table>
            </div>
        <div id="prev">
            
		</div>
	
	
			<div id="Button_operation">
				<button class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存</button>
				<button class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>

	</form>
    </div>
</div>
</div>
<script src="/js/jquery-1.9.1.min.js"></script>   
<script src="/js/img_preview.js"></script>
<script>
	// ===================添加规格===================
	var token="{{csrf_token()}}";
	$("#spec").click(function(){
		var name = $('#spec_val').val();
		// alert(name);
		$.ajax({
            //提交数据的类型 POST GET
            type:"post",
            //提交的网址
            url:"{{route('Adminaddattrkey')}}",
            //提交的数据
            data:{name:name,_token:token,id:"{{$id}}"},
            //返回数据的格式
            datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
            //在请求之前调用的函数
            beforeSend:function(){$("#msg").html("logining");},
            //成功返回之后调用的函数             
            success:function(data){
				console.log(data);  
				$('#spec_val').val("");        
            },
            //调用出错执行的函数
            error: function(){
                //请求出错处理
            }         
         });

	});

	// ===================添加规格值===================
	var token="{{csrf_token()}}";
		function addval(id){

			var sepcval = $('#specname_val'+id).val();
			// alert(id);
			$.ajax({
				//提交数据的类型 POST GET
				type:"post",
				//提交的网址
				url:"{{route('Adminaddattrval')}}",
				//提交的数据
				data:{sepcval:sepcval,_token:token,id:id},
				//返回数据的格式
				datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
				//在请求之前调用的函数
				beforeSend:function(){$("#msg").html("logining");},
				//成功返回之后调用的函数             
				success:function(data){

					$('#specname_val'+id).val("");        
				},
				//调用出错执行的函数
				error: function(){
					//请求出错处理
				}         
			});
		}
	

  
  function del_attr(a){
        var table =  $(a).parent()
        table.remove();
    }

		ulstr = `<div class="clearfix cl">
           <ul id="specul">
            @foreach($Attribute_key as $v)
                <li>
					<div class="specli">
						<label class="form-label col-2">{{$v->attr_name}}:</label>
						<select name="sku_all{{$v->id}}[]" id="">
							@foreach($v->vals as $k)
							<option value="{{$k->id}}">{{$k->attr_val}}</option>
							@endforeach
						</select>
					</div>	
				</li>
				@endforeach
                <br>
                <li>
					<div class="ullist">
						<label class="form-label col-2">sku标题：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="sku_name[]"></div>
					</div>
				
                </li>
                <li>
					<div class="ullist">
						<label class="form-label col-2">库存：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="stock[]"></div>
					</div>
                </li>
				<li>
					<div class="ullist">
						<label class="form-label col-2">价 格：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="price[]"></div>
					</div>
                </li>
                <li>
					<div class="ullist">
						<label class="form-label col-2">现 价：</label>
						<div class="formControls"><input type="text" id="input-text" value="" placeholder="" id="" name="old_price[]"></div>
					</div>
                </li>
                <input onclick="del_attr(this)" type='button' value="删除" class="del">
		   </ul>
		  
        </div>

		<h3>商品图片 <input id="btn-image" onclick="addImg(this)" type="button" value="添加一个图片"></h3>
            <div id="image-container">
                <table width="100%">
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input class="preview" type='file' name='image[]'>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input onclick="del_attr(this)" type="button" value="删除">
                        </td>
                    </tr>
                </table>
            </div>
		`

    $("#addsku").click(function(){
            // 添加sku
            $("#prev").append(ulstr);
             // 删除sku
             $("skuul").remove();
              // 在框的前面放一个图片
         
    });




	// 修改
	function addImg(o){
            // 添加一个图片
            // $(o).child().append(imageStr)
			var a = o.parentNode.nextElementSibling

			$(a).append(imageStr)
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


	}


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
        var imageStr = `<hr><table width="100%"><tbody>
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input class="preview" type='file' name='image[]'>
                            <font color="red">*</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td>
                            <input onclick="del_attr(this)" type="button" value="删除">
                        </td>
                    </tr>
                </tbody></table>`

        // 为添加按钮绑定事件
        // $("#btn-image").click(function(){


        // });

        // ----------添加图片结束


</script>

</body>
</html>
