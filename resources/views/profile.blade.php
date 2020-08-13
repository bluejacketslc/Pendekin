<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')
    <title>Profile {{ session()->get('user')->username }}</title>
</head>

<body>
    @include('navbar')
    <div class="card mx-auto mt-3 mb-3" style="width: 18rem;">
        <img class="card-img-top" src="{{ session()->get('user')->imageUrl }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Profile {{ session()->get('user')->username }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email: {{ session()->get('user')->email }}</li>
            <li class="list-group-item">Premium:
                @if (session()->get('user')->subscription === 1)
                    No
                @else
                    Yes
                @endif
            </li>
        </ul>
    </div>
    @include('footer')
</body>

</html>
