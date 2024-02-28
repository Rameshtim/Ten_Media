<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
		<div>
			@if($errors->any())
			<ul>
				@foreach($errors->all() as $error)
				<li>
					{{$error}}
				</li>
			@endforeach
			</ul>
			@endif
		</div>
	<form method="post" action="{{route('job.store')}}">
		@csrf
		@method('post')
		<label>Job Titel:</label>
		<input type="text" name="title" >

		<label >Job Beschreibung:</label>
		<textarea  name="description" rows="10" ></textarea>

		<label>Unternehmen Auswählen:</label>
    	<select name="company_id">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    	</select>
		<label>Kategorie Auswählen:</label>
    	<select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    	</select><br>
		<br>
		<button type="submit">Submit Job</button>
	</form>

</body>
</html>
