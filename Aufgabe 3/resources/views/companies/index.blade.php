<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3490dc;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            margin: 0;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
        }

        .detail-view {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Additional Styles for the logout section */
        div[style="text-align: right; padding: 10px;"] {
            text-align: right;
            padding: 10px;
        }

        div[style="text-align: right; padding: 10px;"] p {
            margin: 0;
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
	<h1>Firmen<a href="{{ route('company.create') }}"> + </a></h1>
    <div id="success-message"></div>

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
        <table>
            <thead>
                <tr>
                    <th>Nummer</th>
                    <th>Name</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                    <th>Details</th>
                </tr>
            </thead>
            @php
                $counter = 1;
            @endphp
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$company->name}}</td>
                        <td>
                            <a href="{{route('company.edit', ['company' => $company])}}">Bearbeiten</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('company.destroy', ['company' => $company])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Löschen">
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('company.show', ['company' => $company]) }}">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Detail View Section -->
    @if(isset($selectedCompany))
        <div class="detail-view">
            <h2>Company Details</h2>
            <p><strong>Name:</strong> {{ $selectedCompany->name }}</p>
            <p><strong>Description:</strong> {{ $selectedCompany->description }}</p>
        </div>
    @endif

</body>
</html>
