<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>tank 建筑</title>
</head>
<body>
    <center><h1>商品列表</h1></center>
    <hr />
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名称</th>
            <th>商品货号</th>
            <th>商品价格</th>
            <th>商品缩略图</th>
            <th>商品相册</th>
            <th>商品库存</th>
            <th>是否精品</th>
            <th>是否热卖</th>
            <th>所属品牌</th>
            <th>所属分类</th>
            <th>商品描述</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
        <tr>
            <th>{{$v->goods_id}}</th>
            <th>{{$v->goods_name}}</th>
            <th>{{$v->goods_no}}</th>
            <th>{{$v->goods_price}}</th>
            <th></th>
            <th>
                @if(is_array($v->goods_imgs))
                    @foreach($v->goods_imgs as $vv)
                    <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="40">
                    @endforeach
                @endif
            </th>
            <th>{{$v->goods_num}}</th>
            <th>{{$v->is_best == 1 ? '是' : '否'}}</th>
            <th>{{$v->is_hot == 1 ? '是' : '否'}}</th>
            <th>{{$v->brand_name}}</th>
            <th>{{$v->cate_name}}</th>
            <th>{{$v->goods_desc}}</th>
            <th>{{date('Y-m-d H:i:s',$v->add_time)}}</th>
            <th><a href="{{url('/goods/edit/'.$v->goods_id)}}">编辑</a> |
                <a href="{{url('/goods/destroy/'.$v->goods_id)}}">删除</a></th>
        </tr>
        @endforeach
        <tr><td colspan="7">{{$data->appends(['data'=>$data])->links()}}</td></tr>
        </tbody>
    </table>
</body>
</html>

