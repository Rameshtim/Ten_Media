<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Company</title>
</head>
<body>
	<h1>Firmen</h1>
	<div>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
			</tr>
			@foreach ($companies as $company)
			<tr>
				<td>{{$company->id}}</td>
				<td>{{$company->name}}</td>
				<td>{{$company->description}}</td>
			</tr>
			@endforeach
		</table>
	</div>

</body>
</html>