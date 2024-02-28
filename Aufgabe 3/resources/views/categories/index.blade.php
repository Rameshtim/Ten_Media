<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Categories</h1>
	<div>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<!-- <th>Description</th> -->
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>