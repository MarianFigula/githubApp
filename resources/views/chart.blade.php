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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>

<div class="d-flex pt-2 justify-content-center"><h1>GitHub Users Application</h1></div>
<header class="mb-3 mt-2" >
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('index')}}">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="col-xl-6 mx-auto  p-2 justify-content-center" style="position: relative; height:50vh; width:80vw;">




@if($hours != null && $username != null && $followerCount != null)
    <canvas id="followerChart" style="position: relative; height:50vh; width:80vw"></canvas>

    <script>

    var ctx = document.getElementById('followerChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($hours) !!},
            datasets: [{
                label: 'Follower count of {{$username}} last 24 hours (UTC Time Zone)',
                data: {!! json_encode($followerCount) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@else
    <div class="container justify-content-center">
        <h2 class="text-center fst-italic mb-lg-5 text-danger">Could not find the data of {{$username}}'s followers, try again later.</h2>
    </div>
@endif
</div>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/tables.js') }}"></script>

<footer class="d-flex justify-content-center py-3 my-4 mt-4 border-top border-dark-subtle">
    <span class="text-muted">© 2023 Marián Figula</span>
</footer>
</body>
</html>
