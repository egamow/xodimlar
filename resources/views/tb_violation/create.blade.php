@extends('layout')
@section('title')Қоидабузарлик қўшиш
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><strong>Янги </strong>қўшиш</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tb_violation.index') }}">Техника хафсизлиги бўйича бахолаш</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-info" href="{{ route('tb_violation.index') }}"> Ортга кайтиш</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Диққат!</strong> Илтимос маълумотларни тўлиқ киритинг<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tb_violation.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_tb">Қоидабузарлик тури</label>
                        <select class="form-control" name="id_tb" data-live-search="true">
                            @foreach($tbs as $tb)
                                <option value="{{$tb->id}}">{{$tb->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Ходим</label>
                        <select class="form-control" name="user_id" data-live-search="true">
                            <option disabled selected> Танланг </option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Изох</label>
                        <textarea type="text" class="form-control" placeholder="Изох" name="description"></textarea>
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

@endsection




