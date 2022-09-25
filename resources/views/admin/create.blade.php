
@extends('layout')
@section('title')Ходимлар рўйхати
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><strong>Янги </strong>ходим</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="index"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Ходимлар руйхати</a></li>
                            <li class="breadcrumb-item active">Янги ходим</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                         <div class="pull-right">
                            <a class="btn btn-info" href="{{ route('employees.index') }}"> Ортга кайтиш</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        Илтимос маълумотларни тўлиқ киритинг<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login">Табел рақами</label>
                        <input type="text" class="form-control"  placeholder="Табел рақами" name ="login">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Фамилияси</label>
                        <input type="text" class="form-control" placeholder ="Фамилияси" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Исми</label>
                        <input type="text" class="form-control"  placeholder="Исми" name ="firstname">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Отасининг исми</label>
                        <input type="text" class="form-control"  placeholder="Отасининг исми" name ="middlename">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Тугилган санаси</label>
                        <input type="date" class="form-control"  placeholder="Тугилган санаси" name ="birthdate">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон раками</label>
                        <input maxlength="9" minlength="9" type="tel" class="form-control"  placeholder="Телефон раками" name ="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Саклаш</button>
                </form>
            </div>

        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="{{asset('assets/plugins/nestable/jquery.nestable.js')}}"></script> <!-- Jquery Nestable -->
    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>

    {{--<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->--}}
    {{--<script src="assets/bundles/sparkline.bundle.js"></script> <!-- sparkline Plugin Js -->--}}
    {{--<script src="assets/plugins/chartjs/Chart.bundle.js"></script> <!-- Chart Plugins Js -->--}}
    {{--<script src="assets/plugins/chartjs/polar_area_chart.js"></script><!-- Polar Area Chart Js -->--}}

    {{--<script src="assets/js/pages/index.js"></script>--}}
    {{--<script src="assets/js/pages/charts/polar_area_chart.js"></script>--}}

    {{--<script src="assets/js/pages/calendar/calendar.js"></script>--}}
    {{--<script src="assets/js/pages/profile.js"></script>--}}
    {{--=======--}}


@endsection




