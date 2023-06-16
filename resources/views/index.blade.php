<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>

<div class="d-flex pt-2 justify-content-center"><h1>GitHub Users Application</h1></div>
<header class="mb-3 mt-2" >
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Home</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<div class="table-responsive col-xl-6 mx-auto border p-2 rounded-2 border-dark">

    <table id="detail" class="table table-striped table-bordered table-hover border-dark text-center">
        <thead class="bg-dark text-white">
        <tr class="text-center">
            <th>#</th>
            <th>User</th>
            <th>Avatar</th>
            <th>Amount of followers</th>
            <th>Followers Chart</th>
       </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($usersData); $i++)
            <tr>
                <td>{{$i+1}}</td>
                <td><a href="{{$usersData[$i]["html_url"]}}">{{$usersData[$i]["login"]}}</a></td>
                <td><a href="{{$usersData[$i]["html_url"]}}"><img src="{{$usersData[$i]["avatar_url"]}}" alt="user avatar" width="40px"> </a></td>
                <td>{{$usersData[$i]["followers_count"]}}</td>
                <td><a href="{{ route('chart', ['username' => $usersData[$i]["login"]]) }}"><img src="{{asset("icons/pie-chart-fill.svg")}}" alt="pie-chart" width="25px"></a></td>
            </tr>
        @endfor
{{--
        <tr>
            <td>s</td>
            <td>a</td>
            <td>a</td>
            <td>a</td>
            <td><a href="{{url("https://www.google.com/")}}"></a><img src="{{asset("icons/pie-chart-fill.svg")}}" alt="pie-chart" width="20px"></td>
        </tr>--}}
        </tbody>
    </table>
</div>

<footer class="d-flex justify-content-center py-3 my-4 mt-4 border-top border-dark-subtle">
    <span class="text-muted">© 2023 Marián Figula</span>
</footer>

<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/tables.js') }}"></script>

</body>
</html>
