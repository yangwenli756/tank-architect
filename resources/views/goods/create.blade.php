<!DOCTYPE html>
<html>
<head>
	<title>tank商城</title>
</head>
<body>
<center> <h2>商品添加</h2></center>
<form role="form" action="{{url('/goods/store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <table border="2">
  	<tr>
  		<td>商品名称</td>
  		<td><input type="text" class="form-control" id="firstname" name="goods_name"></td>
  	</tr>
  	<tr>
  		<td>货号</td>
  		<td><input type="text" class="form-control" id="firstname" name="goods_no"></td>
  	</tr>
  	<tr>
  		<td>商品价格</td>
  		<td><input type="number" class="form-control" id="firstname" name="goods_price"></td>
  	</tr>
  	<tr>
  		<td>商品图片</td>
  		<td><input type="file" class="form-control" id="firstname" name="goods_img"></td>
  	</tr>
  	<tr>
  		<td>商品相册</td>
  		<td><input type="file" class="form-control" id="firstname" multiple="multiple" name="goods_imgs[]"></td>
  	</tr>
  	<tr>
  		<td>商品库存</td>
  		<td><input type="number" class="form-control" id="firstname" name="goods_num"></td>
  	</tr>
  	<tr>
  		<td>是否精品</td>
  		<td> <input type="radio" name="is_best" value="1" checked>是
            <input type="radio" name="is_best" value="2">否</td>
  	</tr>
  	<tr>
  		<td>是否热卖 </td>
  		<td><input type="radio" name="is_hot" value="1" checked>是
            <input type="radio" name="is_hot" value="2">否</td>
  	</tr>
  	<tr>
  		<td>所属品牌</td>
  		<td>
  			<select name="brand_id" id="" class="col-sm-2 control-label">
                <option value="">--请选择--</option>
                @foreach($brandInfo as $v)
                <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                @endforeach
            </select>
  		</td>
  	</tr>
  	<tr>
  		<td>所属分类</td>
  		<td>
  			<select name="cate_id" id="" class="col-sm-2 control-label">
                <option value="">--请选择--</option>
                @foreach($cateInfo as $vv)
                <option value="{{$vv->cate_id}}">{{str_repeat('|--', $vv->level)}}{{$vv->cate_name}}</option>
                @endforeach
            </select>


  		</td>
  	</tr>
  	<tr>
  		<td>商品描述</td>
  		<td><textarea name="goods_desc" class="form-control" id="" cols="50" rows="5"></textarea></td>
  	</tr>
  	<tr>
  		<td></td>
  		<td><button type="submit" class="btn btn-default">添加</button></td>
  	</tr>
  </table>
</form>
</body>
</html>