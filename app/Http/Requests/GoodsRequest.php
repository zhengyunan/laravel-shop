<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'goods_name'=>'required ',
            'attribution'=>'required',
            'title'=>'required',
            'content'=>'required',
            'old_price'=>'required|numeric',
            'new_price'=>'required|numeric',
            'quality'=>'required',
            'goods_bianhao'=>'required|numeric',
            'goods_weight'=>'required|numeric',
            
        ];
    }

    public function messages(){
       return[
            'goods_name.required'=>'商品名不能为空',
            'attribution.required'=>'地区不能为空',
            'title.required'=>'标题不能为空',
            'title.max'=>'标题最大不能超过50',
            'content.required'=>'内容不能为空',
            'content.max'=>'内容最大不能超过200',
            'old_price.required'=>'原价不能为空',
            'old_price.numeric'=>'原价必须为数字',
            'new_price.required'=>'现价不能为空',
            'new_price.numeric'=>'现价必须为数字',
            'quality.required'=>'材质不能为空',
            'goods_bianhao.required'=>'编号不能为空',
            'goods_bianhao.numeric'=>'编号必须为数字',
            'goods_weight.required'=>'编号不能为空',
            'goods_weight.numeric'=>'编号必须为数字',
       ];
    }
}
