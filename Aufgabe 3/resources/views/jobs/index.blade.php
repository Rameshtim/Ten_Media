<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Offers</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		h1 {
			color: #333;
		}

		#success-message {
			display: none;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			position: fixed;
			top: 10px;
			right: 10px;
			z-index: 1000;
			border-radius: 5px;
		}

		table {
			width: 80%;
			margin-top: 20px;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		th, td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #4CAF50;
			color: #fff;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		a {
			text-decoration: none;
			color: #3498db;
		}

		form {
			margin: 0;
		}

		input[type="submit"] {
			background-color: #e74c3c;
			color: #fff;
			padding: 8px 12px;
			border: none;
			cursor: pointer;
			border-radius: 3px;
		}
	</style>
</head>
<body>

	<div style="text-align: right; padding: 10px;">
		@if (Auth::check())
			<p>
				<a href="{{ route('welcome') }}">Zurück zur Welcome</a> |
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
				<br>{{ Auth::user()->name }}
			</p>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		@else
			<p><a href="{{ route('welcome') }}">Go back to Welcome</a></p>
			<p>You are a guest</p>
		@endif
	</div>


	<h1>Job Angebote</h1>
	<div id="success-message"></div>

	@if(session()->has('success'))
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				var successMessage = document.getElementById('success-message');
				successMessage.innerHTML = "{{ session('success') }}";
				successMessage.style.display = 'block';
				setTimeout(function() {
					successMessage.style.display = 'none';
				}, 5000);
			});
		</script>
	@endif

	<div>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Titel</th>
					<th>Kategorien</th>
					<th>Unternehmen</th>
					<th>Bearbeiten</th>
					<th>Löschen</th>
					<th>Details</th>
				</tr>
			</thead>
			@php
				$counter = 1;
			@endphp
			@foreach ($jobs as $job)
			<tr>
				<td>{{$counter++}}</td>
				<td>{{$job->title}}</td>
				<td>{{$job->category->name ?? 'undefined'}}</td>
				<td>{{$job->company->name}}</td>
				<td>
					<a href="{{route('job.edit', ['job' => $job])}}">Edit</a>
				</td>
				<td>
					<form method="post" action="{{route('job.destroy', ['job' => $job])}}">
						@csrf
						@method('delete')
						<input type="submit" value="Delete">
					</form>
				</td>
				<td>
					<a href="{{ route('job.show', ['job' => $job]) }}">Details</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>
