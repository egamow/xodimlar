@extends('layout')
@section('title')Тахрирлаш
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Тахрирлаш</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i
                                            class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tds.index') }}">Меҳнат интизоми бўйича қоидабузарликлар</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-info" href="{{ route('tds.index') }}"> Ортга кайтиш</a>
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
                <form action="{{ route('tds.update', $td->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_id">Номи</label>
                        <input type="text" class="form-control" value="{{ $td->name}}"
                               placeholder="Номи" name="name">
                    </div>
                    <div class="form-group">
                        <label for="ball">Балл</label>
                        <input type="number" class="form-control" value="{{$td->ball}}"
                               placeholder="Балл" name="ball">
                    </div>
                    <div class="form-group">
                        <label for="description">Изох</label>
                        <textarea type="text" class="form-control" placeholder="Изох"
                                  name="description">{{$td->description}}</textarea>
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




