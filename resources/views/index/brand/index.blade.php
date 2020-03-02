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
<center><h1>tank-architect - 品牌展示</h1></center>
<form class="form-horizontal" role="form">
	<div class="form-group">
		<div class="col-sm-8">
			<input type="text"  name="brand_name" value="{{$brand_name}}" placeholder="请输入网址名称"> 
			<input type="text"  name="brand_url"  value="{{$brand_url}}"  placeholder="请输入网址网址">  
		
		<button type="submit">搜索</button>
	</div>
</form>
  <table class="table">
	<!-- <caption>上下文表格布局</caption> -->
	<thead>
		<tr>
			<th>品牌编号</th>
			<th>品牌名称</th>
			<th>品牌logo</th>
			<th>品牌网址</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($brand as $k=>$v)
		<tr @if($k%2==0)class="active"@else class="success" @endif>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td>@if($v->brand_logo)<img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}"width="50px"height="50px">@endif</td>
			<td><a href="{{url('brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
				<a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a></td>			
		</tr>
		@endforeach
		<tr><td colspan="7">{{$brand->appends(['brand_name'=>$brand_name,'brand_url'=>$brand_url])->links()}}</td></tr>
	</tbody>
</table>
</body>
<ml>

