<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Tank-architect-管理员</h1>
<form>
	<input type="text" name="l_name" value="{{$l_name}}"placeholder="请输入用户名查询">&nbsp;&nbsp;&nbsp;<input type="submit" value="搜索">
</form>
<table>
	<tr>
		<td>用户ID</td>
		<td>用户名</td>
		<td>用户头像</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;操作</td>
	</tr>
	@foreach ($data as $k=>$v)
	<tr>
		<td>{{$v->l_id}}</td>
		<td>{{$v->l_name}}</td>
		<td>
			@if($v->l_img)<img src="{{env('UPLOAD_URL')}}{{$v->l_img}}" width="30" height="30">@endif
		</td>
		<td><a href="{{url('shop_login/edit/'.$v->l_id)}}">编辑</a>|<a href="{{url('shop_login/destroy/'.$v->l_id)}}">删除</a></td>
	</tr>
	@endforeach
	<tr><td>{{$data->appends(['l_name'=>$l_name])->links()}}</td></tr>
</table>
<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a><a href=""><br><b>########################################<br>########################################</b></a>
</body>
</html>