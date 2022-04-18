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
                            <li class="breadcrumb-item"><a href="{{ route('user.main') }}"><i
                                            class="zmdi zmdi-home"></i></a></li>
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
                <form action="{{route('admin.index')}}" method="GET">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="search" value=""
                               placeholder="Кидириш...">
                        <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                    </div>
                    <button hidden type="submit"></button>
                </form>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Логин</th>
                        <th scope="col">Фамилияси, исми ва отасининг исми</th>
                        <th scope="col">Телефон рақами</th>
                        <th scope="col">Амаллар</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index=>$user )
                        <tr class="bg-light">
                            <td class="align-top">{{ $user->login }}</td>
                            <td class="align-top">{{ $user->lastname }} {{ $user->firstname }} {{ $user->middlename}}</td>
                            <td class="align-top align-content-center">{{ $user->phone }}</td>
                            <td class="align-top">
                                <a class="btn btn-sm btn-info waves-effect collapsed margin-0" role="button"
                                   data-toggle="collapse" href="#collapseExample{{$user->id}}" aria-expanded="false"
                                   aria-controls="collapseExample"><i class="zmdi zmdi-settings"></i></a>
                                <a class="btn btn-sm btn-danger margin-0" href="{{ route('admin.reset',$user->id) }}">Паролни
                                    бекор килиш</a>

                                <button class="btn btn-sm btn-info"
                                        onclick="loadEditModal({{ $user->id }})"><i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger"
                                        onclick="loadDeleteModal({{ $user->id }})"><i class="zmdi zmdi-delete"></i>
                                </button>

                                <div class="collapse" id="collapseExample{{$user->id}}">
                                    <div class="card-title">Ходимнинг тизимдаги роллари:</div>
                                    <form action="{{route('admin.role_update', $user->id)}}" method="GET">
                                        @csrf
                                        @method('GET')
                                        <div class="checkbox">
                                            <input id="admin{{$user->id}}" name="admin" type="checkbox"
                                                   @if($user->admin==True) checked @endif>
                                            <label for="admin{{$user->id}}">Администратор</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="trainer{{$user->id}}" name="trainer" type="checkbox"
                                                   @if($user->trainer==True) checked @endif>
                                            <label for="trainer{{$user->id}}">Тренер</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="inspector{{$user->id}}" name="inspector" type="checkbox"
                                                   @if($user->inspector==True) checked @endif>
                                            <label for="inspector{{$user->id}}">Текширувчи</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="personnel_officer{{$user->id}}" name="personnel_officer"
                                                   type="checkbox" @if($user->personnel_officer==True) checked @endif>
                                            <label for="personnel_officer{{$user->id}}">Кадр инспектори</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="curator{{$user->id}}" name="curator" type="checkbox"
                                                   @if($user->curator==True) checked @endif >
                                            <label for="curator{{$user->id}}">Куратор</label>
                                        </div>
                                        <button class="btn btn-info btn-sm btn-round waves-effect" type="submit">
                                            Саклаш
                                        </button>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="POST" id="editFormClient">
                    @csrf
                    @method('PUT')
                    <div class="modal-header justify-content-center">
                        <h4 class="title" id="defaultModalLabel">Тахрирлаш</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" class="form-control" name="login" id="login" placeholder="Логин"
                                       value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control show-tick department" name="department_id" id="department_id"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control show-tick" name="position_id" id="position_id">
                                data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                       placeholder="Фамилия" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                       placeholder="Исми" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="middlename" id="middlename"
                                       placeholder="Отасини исми" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="Телефон" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Саклаш</button>
                        <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">
                            Бекор килиш
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="POST" id="deleteFormClient">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header justify-content-center">
                        <h4 class="title" id="defaultModalLabel">Учирмокчимисиз?</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-danger btn-round waves-effect">Ха</button>
                        <button type="button" class="btn btn-outline-secondary btn-round waves-effect"
                                data-dismiss="modal">Йук
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("admin.destroy", ":admin") }}';
            route = route.replace(':admin', id);
            $('#deleteFormClient').attr('action', route);
            $('#deleteModal').modal('show');
        }

    </script>
    <script>
        function loadEditModal(id) {
            var route = '{{ route("admin.show", ":id") }}';
            var action_route = '{{ route("admin.update", ":id_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                console.log(data);
                action_route = action_route.replace(':id_update', data.id);
                $('#editFormClient').attr('action', action_route);
                $('#login').val(data.login);
                $('#lastname').val(data.lastname);
                $('#firstname').val(data.firstname);
                $('#middlename').val(data.middlename);
                $('#phone').val(data.phone);
                $('#editModal').modal('show');
                $('select[name=department_id]').val(data.department_id);
                $('select[name=position_id]').val(data.position_id);
                $('.show-tick').selectpicker('refresh');
            })
        }
    </script>
{{--    <script>--}}
{{--        $("select").on("changed.bs.select", function (e) {--}}
{{--            console.log('asdadadad', $(this).val());--}}
{{--            var url = {{route('admin.index', ':department_id')}};--}}
{{--            url = url.replace(':department_id', $(this).val());--}}
{{--            $.get(url, function (data) {--}}
{{--                //success data--}}
{{--                console.log(data);--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="{{asset('assets/plugins/nestable/jquery.nestable.js')}}"></script> <!-- Jquery Nestable -->
    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>


@endsection
{{--<div class="modal fade" id="addModal" tabindex="-1" role="dialog">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <form action="{{route('admin.create')}}" method="POST" id="addFormClient">--}}
{{--                @csrf--}}
{{--                <div class="modal-header justify-content-center">--}}
{{--                    <h4 class="title" id="defaultModalLabel">Кушиш</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="number" class="form-control" name="login" placeholder="Логин"--}}
{{--                                   value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <select class="form-control show-tick department" name="department_id"--}}
{{--                                data-live-search="true">--}}
{{--                            <option disabled selected> Танланг</option>--}}
{{--                            @foreach($departments as $department)--}}
{{--                                <option value="{{$department->id}}">{{$department->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <select class="form-control show-tick" name="position_id"--}}
{{--                                data-live-search="true">--}}
{{--                            <option disabled selected> Танланг</option>--}}
{{--                            @foreach($positions as $position)--}}
{{--                                <option value="{{$position->id}}">{{$position->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="text" class="form-control" name="lastname"--}}
{{--                                   placeholder="Фамилия" value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="text" class="form-control" name="firstname"--}}
{{--                                   placeholder="Исми" value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="text" class="form-control" name="middlename"--}}
{{--                                   placeholder="Отасини исми" value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="number" class="form-control" name="phone"--}}
{{--                                   placeholder="Телефон" value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="submit" class="btn btn-primary btn-round waves-effect">Саклаш</button>--}}
{{--                    <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">--}}
{{--                        Бекор килиш--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}