<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>tank-architect - 后台</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<center><h1>tank-architect - 品牌添加</h1></center>
<form  action="{{url('/brand/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="brand_name" id="firstname" 
				   placeholder="请输入品牌名称">
			<b style="color:red">{{$errors->first('brand_name')}}</b>	   
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="brand_url" id="firstname" 
				   placeholder="请输入品牌网址">
			<b style="color:red">{{$errors->first('age')}}</b>
		</div>
	</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" name="brand_logo" class="form-control"  
				   >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加<tton>
		</div>
	</div>
</form>

</body>
</html>
