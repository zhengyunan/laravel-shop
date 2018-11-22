<?php
// 显示登录表单
Route::get('/Admin/admin_login','Admin\LoginController@index')->name('create');
Route::post('/Admin/admin_dologin','Admin\LoginController@dologin')->name('dologin');
// 退出登录
Route::get('/Admin/admin_loginout','Admin\LoginController@loginout')->name('loginout');


Route::middleware(['adminlogin'])->group(function(){


// 主页
Route::get('/admin','Admin\IndexController@index')->name('index');
Route::get('/admin/welcome','Admin\IndexController@home')->name('/admin/welcomendex');


// 产品列表
Route::get('/Admin/goods_list','Admin\GoodsController@create')->name('goods_list');
// 显示修改
Route::get('/Admin/goods_edit','Admin\GoodsController@edit')->name('goods_edit');
// 修改
Route::post('/Admin/goods_update','Admin\GoodsController@update')->name('goods_update');
// 添加表单
Route::get('/Admin/goods_list1','Admin\GoodsController@add')->name('goods_add');
Route::post('/Admin/goods_doadd','Admin\GoodsController@doadd')->name('goods_tianjia');
//商品删除
Route::get('/Admin/goods_del','Admin\GoodsController@delete')->name('goods_delete');
// 二级联动
Route::get('/Admin/category_liandong','Admin\GoodsController@ajax_get_cat')->name('category_liandong');

// 打开产品sku页面
Route::get('/Admin/goods_sku','Admin\GoodsController@open_sku')->name('goods_sku');
Route::post('/Admin/addattrkey','Admin\GoodsController@doattrkey')->name('Adminaddattrkey'); //添加规格
Route::post('/Admin/addattrval','Admin\GoodsController@doattrval')->name('Adminaddattrval'); //添加规格值

Route::post('/Admin/doaddsku','Admin\GoodsController@dosku')->name('Admindoaddsku'); //sku添加


// 品牌管理
Route::get('/Admin/brand_list','Admin\BrandController@create')->name('brand_list');
// 添加品牌
Route::get('/Admin/brand_add','Admin\BrandController@add')->name('brand_add');
Route::post('/Admin/brand_doadd','Admin\BrandController@doadd')->name('brand_doadd');
// 显示修改
Route::get('/Admin/brand_edit','Admin\BrandController@edit')->name('brand_edit');
// 修改
Route::post('/Admin/brand_update','Admin\BrandController@update')->name('brand_update');
//商品删除
Route::get('/Admin/brand_del','Admin\BrandController@delete')->name('brand_delete');




// 分类管理
Route::get('/Admin/category_list','Admin\CategoryController@create')->name('category_list');
// 添加分类
Route::post('/Admin/category_add','Admin\CategoryController@add')->name('category_add');
// 修改分类
Route::get('/Admin/category_edit','Admin\CategoryController@edit')->name('category_edit');
// 修改
Route::post('/Admin/category_update','Admin\CategoryController@update')->name('category_update');
// 删除分类
Route::get('/Admin/category_del','Admin\CategoryController@delete')->name('category_delete');



// 文章管理
Route::get('/Admin/article_list','Admin\ArticleController@create')->name('article_list');
// 添加文章
Route::get('/Admin/article_add','Admin\ArticleController@add')->name('article_add');
Route::post('/Admin/article_doadd','Admin\ArticleController@doadd')->name('article_doadd');
// 显示修改
Route::get('/Admin/article_edit','Admin\ArticleController@edit')->name('article_edit');
// 修改
Route::post('/Admin/article_update','Admin\ArticleController@update')->name('article_update');
//删除
Route::get('/Admin/article_del','Admin\ArticleController@delete')->name('article_delete');


// 文章分类管理
Route::get('/Admin/articat_list','Admin\ArticatController@create')->name('articat_list');
// 添加品牌
Route::get('/Admin/articat_add','Admin\ArticatController@add')->name('articat_add');
Route::post('/Admin/articat_doadd','Admin\ArticatController@doadd')->name('articat_doadd');
// 显示修改
Route::get('/Admin/articat_edit','Admin\ArticatController@edit')->name('articat_edit');
// 修改
Route::post('/Admin/articat_update','Admin\ArticatController@update')->name('articat_update');
//删除
Route::get('/Admin/articat_del','Admin\ArticatController@delete')->name('articat_delete');
 
// 会员管理
Route::get('/Admin/member_list','Admin\MemberController@create')->name('member_list');
// 用户详细信息页面
Route::get('/Admin/member_xiangxi','Admin\MemberController@xiangxi')->name('member_xiangxi');
// 添加用户
Route::get('/Admin/member_add','Admin\MemberController@add')->name('member_add');
Route::post('/Admin/member_doadd','Admin\MemberController@doadd')->name('member_doadd');
// 修改会员显示
Route::get('/Admin/member_edit','Admin\MemberController@edit')->name('member_edit');
// 修改会员
Route::post('/Admin/member_update','Admin\MemberController@update')->name('member_update');
// 删除
Route::get('/Admin/member_del','Admin\MemberController@delete')->name('member_delete');
// 修改密码显示
Route::get('/Admin/pass_edit','Admin\MemberController@pass_edit')->name('pass_edit');
// 修改密码
Route::post('/Admin/pass_update','Admin\MemberController@pass_update')->name('pass_update');


// 等级管理
Route::get('/Admin/level_create','Admin\LevelController@level_create')->name('level_create');






// // 管理员管理
Route::get('/Admin/admin_list','Admin\AdminController@create')->name('Admin_list');
// // 添加
Route::get('/Admin/admin_add','Admin\AdminController@add')->name('admin_add');
Route::post('/Admin/admin_doadd','Admin\AdminController@doadd')->name('admin_doadd');
// 显示修改
Route::get('/Admin/admin_edit','Admin\AdminController@edit')->name('admin_edit');
// 修改
Route::post('/Admin/admin_update','Admin\AdminController@update')->name('admin_update');
// //删除
Route::get('/Admin/admin_del','Admin\AdminController@delete')->name('admin_delete');



// // 角色管理
Route::get('/Admin/role_list','Admin\RoleController@create')->name('role_list');
// 添加角色
Route::get('/Admin/role_add','Admin\RoleController@add')->name('role_add');
Route::post('/Admin/role_doadd','Admin\RoleController@doadd')->name('role_doadd');
// 显示修改
Route::get('/Admin/role_edit','Admin\RoleController@edit')->name('role_edit');
// 修改
Route::post('/Admin/role_update','Admin\RoleController@update')->name('role_update');
// //角色删除
Route::get('/Admin/role_del','Admin\RoleController@delete')->name('role_delete');


// // 权限分类管理
Route::get('/Admin/rulecat_list','Admin\RulecatController@create')->name('rulecat_list');
// 添加权限分类
Route::post('/Admin/rulecat_doadd','Admin\RulecatController@doadd')->name('rulecat_doadd');
// 显示修改
Route::get('/Admin/rulecat_edit','Admin\RulecatController@edit')->name('rulecat_edit');
// 修改
Route::post('/Admin/rulecat_update','Admin\RulecatController@update')->name('rulecat_update');
// //权限分类删除
Route::get('/Admin/rulecat_del','Admin\RulecatController@delete')->name('rulecat_delete');



//权限管理
Route::get('/Admin/rule_list','Admin\RuleController@create')->name('rule_list');
// 添加权限
Route::post('/Admin/rule_doadd','Admin\RuleController@doadd')->name('rule_doadd');
// 显示修改
Route::get('/Admin/rule_edit','Admin\RuleController@edit')->name('rule_edit');
// 修改
Route::post('/Admin/rule_update','Admin\RuleController@update')->name('rule_update');
//管理员删除
Route::get('/Admin/rule_del','Admin\RuleController@delete')->name('rule_delete');   


});


// 前台注册
Route::get('/Before/register','Before\RegisterController@create')->name('user_register');
Route::post('/Before/doregister','Before\RegisterController@doregister')->name('doregister');
//验证码 
Route::get('/sendmobilecode','Before\RegisterController@sendmobilecode')->name('ajax-send-modbile-code');

// 前台登录
Route::get('/Before/login','Before\LoginController@create')->name('user_login');
Route::post('/Before/dologin','Before\LoginController@dologin')->name('user_dologin');
Route::get('/Before/loginout','Before\LoginController@loginout')->name('login_out');
// 前台首页
Route::get('/','Before\IndexController@index')->name('before_index');
Route::get('/Before/category','Before\IndexController@category')->name('index_cate');

// 分类的商品页面显示
Route::get('/Before/goods_list','Before\GoodsController@create')->name('before_goods_list');
Route::get('/Before/xiangqing_create','Before\GoodsController@xiangqing_create')->name('xiangqing_create');
Route::get('/Before/goods_xiangqing','Before\GoodsController@goods_xiangqing')->name('goods_xiangqing');


