<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Company</title>
</head>
<body>
	<h1>Firmen</h1>
	<div id="success-message" style="display: none; background-color: #4CAF50; color: #fff; padding: 10px; position: fixed; top: 10px; right: 10px; z-index: 1000;"></div>

	@if(session()->has('success'))
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var successMessage = document.getElementById('success-message');
				successMessage.innerHTML = "{{ session('success') }}";
				successMessage.style.display = 'block';
				setTimeout(function() {
					successMessage.style.display = 'none';
				}, 9000);
			});
		</script>
	@endif
	<div>
		<table border="1">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach ($companies as $company)
			<tr>
				<td>{{$company->id}}</td>
				<td>{{$company->name}}</td>
				<td>{{$company->description}}</td>
				<td>
					<a href="{{route('company.edit', ['company' => $company])}}">Edit</a>
				</td>
				<td>
					<form method="post" action="{{route('company.destroy', ['company' => $company])}}">
						@csrf
						@method('delete')
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>

</body>
</html>