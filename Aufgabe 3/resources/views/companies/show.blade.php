<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }} Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #333;
        }

        div {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: #4285f4;
        }

        p {
            color: #555;
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
    <h1>Firma Detail Ansicht</h1>
    <div>
        <h2>Firmen ID: {{ $company->id }}</h2>
        <h2>Firmen Name: {{ $company->name }}</h2>
        <p>Beschreibung: {{ $company->description }}</p>
    </div>
</body>
</html>
