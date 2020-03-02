<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Tank-architect-管理员</h1>
<form method="post" action="{{url('shop_login/store')}}" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>用户名</td>
			<td><input type="text" name="l_name"><b style="color:red">{{$errors->first('l_name')}}</b></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="l_password"><b style="color:red">{{$errors->first('l_password')}}</b></td>
		</tr>
		<tr>
			<td>头像</td>
			<td><input type="file" name="l_img"></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td></td>
		</tr>
	</table>
</form>
<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a>&nbsp;&nbsp;<a href="">tank自制</a><a href="">翻版必究</a><a href=""><br><b>########################################<br>########################################</b></a>

</body>
</html>