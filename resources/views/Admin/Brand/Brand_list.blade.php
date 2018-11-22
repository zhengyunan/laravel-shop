<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            品牌列表
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/css/x-admin.css" media="all">
        <style>
		    .pagination{display:-ms-flexbox;display:flex;padding-left:0;list-style:none;border-radius:.25rem}.page-link{position:relative;display:block;padding:.5rem .75rem;margin-left:-1px;line-height:1.25;color:#007bff;background-color:#fff;border:1px solid #dee2e6}.page-link:hover{z-index:2;color:#0056b3;text-decoration:none;background-color:#e9ecef;border-color:#dee2e6}.page-link:focus{z-index:2;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.page-link:not(:disabled):not(.disabled){cursor:pointer}.page-item:first-child .page-link{margin-left:0;border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}.page-item:last-child .page-link{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}.page-item.active .page-link{z-index:1;color:#fff;background-color:#007bff;border-color:#007bff}.page-item.disabled .page-link{color:#6c757d;pointer-events:none;cursor:auto;background-color:#fff;border-color:#dee2e6}.pagination-lg .page-link{padding:.75rem 1.5rem;font-size:1.25rem;line-height:1.5}.pagination-lg .page-item:first-child .page-link{border-top-left-radius:.3rem;border-bottom-left-radius:.3rem}.pagination-lg .page-item:last-child .page-link{border-top-right-radius:.3rem;border-bottom-right-radius:.3rem}.pagination-sm .page-link{padding:.25rem .5rem;font-size:.875rem;line-height:1.5}.pagination-sm .page-item:first-child .page-link{border-top-left-radius:.2rem;border-bottom-left-radius:.2rem}.pagination-sm .page-item:last-child .page-link{border-top-right-radius:.2rem;border-bottom-right-radius:.2rem}
		</style>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>轮播列表</cite></a>
            </span>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon">&#xe640;</i>批量删除</button>
            <a href="{{route('brand_add')}}" class="layui-btn" value="">添加</a>
            <span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>ID</th>
                        <th>缩略图</th>
                        <th>品牌名称</th>
                        <th>所属地区/国家</th>
                        <th>描述</th>
                        <th>加入时间</th>
                             
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody id="x-img">
                @foreach($brand as $v)
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                        {{$v->id}}
                        </td>
                        <td>
                            <img  src="{{$v->logo}}" width="200" alt=""><br>点击图片试试
                        </td>
                        <td >
                        {{$v->brand_name}}
                        </td>
                        <td >
                        {{$v->attribution}}
                        </td>
                        <td >
                        {{$v->describe}}
                        </td>
                        <td >
                        {{$v->created_at}}
                        </td>
                        
                        <td class="td-manage"> 
                            <a title="编辑" href="{{route('brand_edit',['id'=>$v->id])}}" class="ml-5" style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a>
                            <a title="删除" href="{{route('brand_delete',['id'=>$v->id])}}" style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <tr ><div ><?php echo $brand->links();?></div></tr>
        </div>   
   </body>
</html>