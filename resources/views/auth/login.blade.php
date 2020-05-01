<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/css/themify-icons.css">
    <link rel="stylesheet" href="frontend/css/gijgo.css">
    <link rel="stylesheet" href="frontend/css/nice-select.css">
    <link rel="stylesheet" href="frontend/css/flaticon.css">
    <link rel="stylesheet" href="frontend/css/slicknav.css">

    <link rel="stylesheet" href="frontend/css/style.css">
    <link rel="stylesheet" href="frontend/css/custom.css">
    <!-- <link rel="stylesheet" href="frontend/css/responsive.css"> -->
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="logo text-center">
                        <a href="/">
                            <img src="frontend/img/shwe/logo.png" alt="">
                        </a>
                        <h2>Sign in to Shwe Palin</h2>
                        
                    </div>
                    <div class="lgform">
                        <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <label for="fname">Email Address</label>
                            <input type="text" id="fname" name="email" placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                            <label for="lname">Password</label>
                            <input type="password" id="lname" name="password" placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <input type="submit" value="{{ __('Login') }}">
                        </form>
                    </div>
                    <div class="create">
                        <a href="{{ route('register') }}"><input type="submit" class="btn btn-md btn-secondary" value="Create an account"></a>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>


    </div>
</body>

</html>