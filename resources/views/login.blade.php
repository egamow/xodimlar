<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>:: APTS :: Тизимга кириш</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/sweetalert/sweetalert.css">

<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-black">
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <h4 class="logo"><img src="assets/images/logo.svg" alt=""> APTS 1.0</h4>
                        <h4 class="text-uppercase">Автоматлаштирилган кадрлар тайёрлаш тизими</h4>
                        <p><span class="font-bold">"Farg'onazot"</span> АЖ талаби асосида ишлаб чиқилган </p>
                        <div class="footer">
                            <ul  class="social_link list-unstyled">
                                <li><a href="https://azot.uz" title="Farg'onazot"><i class="zmdi zmdi-globe"></i> "Farg'onazot" АЖ</a></li>
                            </ul>
                            <hr>
                            <p>© <span class="font-bold">APTS,</span> <a href="http://holding.uz" target="_blank">"Узбек-Холдинг" МЧЖ</a>, 2021</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Тизимга кириш</h5>
                        </div>
                        <form class="form" method="post" action="{{route('user.login')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Логин" name="login">
                                <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                            <div class="input-group">
                                <input type="password" placeholder="Парол" class="form-control" name="password"/>
                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                            @error('login')
                            <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        <div class="footer">
                            <button class="btn btn-primary btn-round btn-block">Кириш</button>
                        </div>
                        </form>
                            <div class="body js-sweetalert">
                                <button class="btn btn-raised btn-neutral waves-effect btn-round" data-type="with-title">Паролни унутдингизми ?</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/ui/dialogs.js"></script>

<script type="text/javascript">
    function showWithTitleMessage() {
        swal('Тавсия',"Паролни тиклаш учун тизим администраторига мурожаат килинг!");
    }

</script>

</body>
</html>