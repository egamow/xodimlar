@extends('layout')
@section('title')Тизим фойдаланувчилари
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><strong>Фойдаланувчилар </strong></h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Фойдаланувчилар рўйхати</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div hidden class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('employees.create') }}"> Янги ходим қўшиш</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Фамилияси, исми ва отасининг исми</th>
                        <th scope="col">Телефон рақами</th>
                        <th hidden scope="col">Бўлим ва лавозими</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index=>$user )
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->lastname }} {{ $user->firstname }} {{ $user->middlename}}</td>
                            <td>{{ $user->phone }}</td>
                            <td hidden>{{ $user->department_id }} {{ $user->position_id }}</td>
                            <td>
                               <a class="btn btn-sm btn-info" href="{{ route('admin.show',$user->id) }}">Кўриш</a>
                               {{--<form action="{{ route('admin.reset', $user->id) }}" method="GET">--}}
                                    {{--@csrf--}}
                                    {{--@method('GET')--}}
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.reset',$user->id) }}">Паролни бекор килиш</a>

                                    {{--<button type="submit" class="btn btn-sm btn-danger">Паролни бекор килиш</button>--}}
                                {{--</form>--}}


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}

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
