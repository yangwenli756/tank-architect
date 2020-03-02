<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Tank-architect-管理员</h1>
<form method="post" action="{{url('shop_login/update/'.$data->l_id)}}" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>用户名</td>
			<td><input type="text" name="l_name" value="{{$data->l_name}}"></td>
		</tr>
		<tr>
			<td>头像</td>
			<td>
				<img src="{{env('UPLODA_URL')}}{{$data->l_img}}" width="30" height="30">
				<input type="file" name="l_img" value="{{$data->l_img}}">
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
</form>
<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a><a href=""><br><b>########################################<br>########################################</b></a>
</body>
</html>