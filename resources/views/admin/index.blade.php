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
                        <th scope="col">Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index=>$user )
                        <tr class="bg-light">
                            <th class="align-top" scope="row">{{ $index+1 }}</th>
                            <td class="align-top">{{ $user->login }}</td>
                            <td class="align-top">{{ $user->lastname }} {{ $user->firstname }} {{ $user->middlename}}</td>
                            <td class="align-top align-content-center">{{ $user->phone }}</td>
                            <td class="align-top">
                                <a class="btn btn-sm btn-info waves-effect collapsed margin-0" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-settings"></i></a>
                                <a class="btn btn-sm btn-danger margin-0" href="{{ route('admin.reset',$user->id) }}">Паролни бекор килиш</a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card-title">Ходимнинг тизимдаги роллари:</div>
                                            <form action="{{route('admin.role_update', $user->id)}}" method="GET">
                                                @csrf
                                                @method('GET')
                                                <div class="checkbox">
                                                    <input id="admin" name="admin" type="checkbox" value="@if($user->admin==True) on @else off @endif">
                                                    <label for="admin">Администратор</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="trainer" name="trainer" type="checkbox" value="@if($user->trainer==True) on @else off @endif">
                                                    <label for="trainer">Тренер</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="inspector" name="inspector" type="checkbox" value="@if($user->inspector==True) on @else off @endif">
                                                    <label for="inspector">Текширувчи</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="personnel_officer" name="personnel_officer" type="checkbox" value="@if($user->personnel_officer==True) on @else off @endif" >
                                                    <label for="personnel_officer">Кадр инспектори</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="curator" name="curator" type="checkbox" value="@if($user->curator==True) on @else off @endif" >
                                                    <label for="curator">Куратор</label>
                                                </div>
                                                <button class="btn btn-info btn-sm btn-round waves-effect" type="submit">Саклаш</button>
                                            </form>

                                </div>
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
