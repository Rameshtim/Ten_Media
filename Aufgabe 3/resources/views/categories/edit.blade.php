<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Editing Form</title>
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
	<form method="post" action="{{route('category.update', ['category' => $category])}}">
		@csrf
		@method('put')
		<label>Category Title:</label>
		<input type="text" name="name" value="{{$category->name}}"/>
<!-- 
		<label >Category Description:</label>
		<textarea  name="categoryDescription" rows="10" ></textarea> -->

		<button type="submit">Submit Category</button>
	</form>

</body>
</html>
