<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')
    <title>Register - Pendekin</title>
</head>

<body>
    @include('navbar')
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Daftarkan akun mu sekarang!</h4>
            <p class="text-center">Dapatkan fitur lain nya dengan memiliki akun di pendekin!</p>
            <form action="/register" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="" class="form-control" placeholder="Username" type="text">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="" class="form-control" placeholder="Email address" type="email">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password">
                </div> 
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password">
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                </div> 
            </form>
        </article>
    </div>
    </div>
    @include('footer')
</body>

</html>
