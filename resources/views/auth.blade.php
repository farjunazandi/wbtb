<!doctype html>
<html lang="en">

<head>
    <title>WBTB - Bengkulu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sistem Pendukung Keputusan Warisan Budaya Takbenda</h2>
                    <h4>PROVINSI BENGKULU</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(assets/img/bengkulu.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            @if(session()->has('loginerror'))
                                <div class="autohide alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    {{ session('loginerror'); }}
                                </div>
                            @endif
                            @if(session()->has('registersuccess'))
                                <div class="autohide alert alert-success alert-dismissible fade show text-center" role="success">
                                    {{ session('registersuccess'); }}
                                </div>
                            @endif
                            <form action="/auth" class="signin-form" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" class="form-control " placeholder="Username" name="username" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
                                </div>
                            </form>
                            <small>Belum terdaftar? <a href="/register">Daftar sekarang!</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/login/js/jquery.min.js"></script>
    <script src="assets/login/js/popper.js"></script>
    <script src="assets/login/js/bootstrap.min.js"></script>
    <script src="assets/login/js/main.js"></script>

</body>

</html>