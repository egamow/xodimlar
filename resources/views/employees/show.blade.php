
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
                        <h2><strong>Ходим </strong>маълумотлари</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Ходимлар руйхати</a></li>
                            <li class="breadcrumb-item active">Ходим маълумотлари</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                            <a class="btn btn-info" href="{{ route('employees.index') }}"> Ходимлар рўйхатига қайтиш</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="body">
                   <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Табел рақами:</strong>
                            {{ $employee->login }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Фамилияси, исми ва отасининг исми:</strong>
                            {{ $employee->lastname }} {{ $employee->firstname }} {{ $employee->middlename }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Туғилган санаси:</strong>
                            {{ $employee->birthdate}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Телефон рақами:</strong>
                            {{ $employee->phone}}
                        </div>
                    </div>

                </div>
               </div>
               </div>
            </div>

        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="{{asset('assets/plugins/nestable/jquery.nestable.js')}}"></script> <!-- Jquery Nestable -->
    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>


@endsection




