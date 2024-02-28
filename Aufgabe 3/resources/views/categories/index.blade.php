<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Categories</h1>
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
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>
					<a href="{{route('category.edit', ['category' => $category])}}">Edit</a>
				</td>
				<td>
					<form method="post" action="{{route('category.destroy', ['category' => $category])}}">
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