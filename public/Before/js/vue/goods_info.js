function getGoodsInfo(goods_id){
    return axios.get("route('goods_xiangqing'?id=)"+goods_id)
}