<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Jobs Angebot</h1>
	<div>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Category</th>
				<th>Company</th>
			</tr>
			@foreach ($jobs as $job)
			<tr>
				<td>{{$job->id}}</td>
				<td>{{$job->title}}</td>
				<td>{{$job->description}}</td>
				<td>{{$job->category->name}}</td>
				<td>{{$job->company->name}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>