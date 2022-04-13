@extends('layout')
@section('title')Қоидабузарлик қўшиш
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i
                                            class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('structure.index') }}">Ташкилий структура</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-info" href="{{ route('structure.index') }}"> Ортга кайтиш</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Диққат!</strong> Илтимос маълумотларни тўлиқ киритинг<br><br>
                    </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-12 margin-tb">
                        <h5>Бўлим қўшиш</h5>
                        <form action="{{ route('structure.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">Юқори бўлим</label>
                                <select class="form-control" name="pid" data-live-search="true">
                                    <option></option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"> {{$department->name ?? ''}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><label for="" class="text-danger">*</label> Номи</label>
                                <input type="text" class="form-control" placeholder="Номи" name="name">
                                <input hidden name="type" value="d">
                            </div>
                            <div class="form-group">
                                <label for="description">Изох</label>
                                <textarea type="text" class="form-control" placeholder="Изох"
                                          name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Сақлаш</button>
                        </form>
                    </div>
                    @if (false)
                        <div class="col-lg-6 col-md-12 margin-tb">
                            <h5>Штат қўшиш</h5>
                            <form action="{{ route('structure.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id"><label for="" class="text-danger">*</label> Бўлим</label>
                                    <select required class="form-control" name="pid">
                                        <option></option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"> {{$department->name ?? ''}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"><label for="" class="text-danger">*</label> Номи</label>
                                    <input type="text" class="form-control" placeholder="Номи" name="name">
                                    <input hidden name="type" value="p">
                                    <div class="form-group">
                                        <label for="description">Изох</label>
                                        <textarea type="text" class="form-control" placeholder="Изох"
                                                  name="description"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Сақлаш</button>
                                </div>
                            </form>
                        </div>
                    @endif
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




