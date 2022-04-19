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
                        <h2><strong>Ходимлар </strong>рўйхати</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}"><i
                                            class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Ходимлар рўйхати</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                @if (auth()->user()->personnel_officer)

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" onclick="loadAddModal()" href="#"> Янги ходим
                                    қўшиш</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action="{{route('employees.index')}}" method="GET">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="search" placeholder="Кидириш..."
                               value="{{ $search }}">
                        <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                    </div>
                    <button hidden type="submit"></button>
                </form>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Табел рақами</th>
                        <th scope="col">Фамилияси, исми ва отасининг исми</th>
                        <th scope="col">Туғилган санаси</th>
                        <th scope="col">Телефон рақами</th>
                        <th hidden scope="col">Бўлим ва лавозими</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $index=>$employee )
                        <tr>
                            <td class="text-center">{{ $employee->login }}</td>
                            <td>{{ $employee->lastname }} {{ $employee->firstname }} {{ $employee->middlename}}</td>
                            <td>{{ $employee->birthdate }}</td>
                            <td>{{ $employee->phone }}</td>
                            {{--                            <td hidden>{{ $employee->department_id }} {{ $employee->position_id }}</td>--}}
                            <td>
                                <a class="btn btn-sm btn-info"
                                   href="{{ route('employees.show',$employee->id) }}">Кўриш</a>
                                @if (auth()->user()->personnel_officer)

                                    <a class="btn btn-sm btn-primary" onclick="loadEditModal({{ $employee->id }})"
                                       href="#"><i class="zmdi zmdi-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"
                                            onclick="loadDeleteModal({{ $employee->id }})"><i
                                                class="zmdi zmdi-delete"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>

        </div>
    </section>
    <!-- Add Modal HTML -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('employees.store')}}" method="POST">
                    @csrf
                    <div class="modal-header justify-content-center">
                        <h4 class="title">Ходим қўшиш</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" required class="form-control" name="login" placeholder="Логин">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control show-tick" name="department_id"
                                    data-live-search="true">
                                <option value="" selected> Танланг</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control show-tick" name="position_id" data-live-search="true">
                                <option value="" selected> Танланг</option>
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" required class="form-control" name="lastname"
                                       placeholder="Фамилия" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" required class="form-control" name="firstname"
                                       placeholder="Исми" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="middlename"
                                       placeholder="Отасини исми" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" name="birthdate"
                                       placeholder="Тугилган санаси" value="1990-01-01">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone"
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
    <!-- Edit Modal HTML -->
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
                                <option value="" selected> Танланг</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control show-tick" name="position_id" id="position_id">
                                data-live-search="true">
                                <option value="" selected> Танланг</option>
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
                                <input type="date" class="form-control" name="birthdate" id="birthdate"
                                       placeholder="Тугилган санаси" value="">
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
    {{-- Delete Modal HTML --}}
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

    <!-- Jquery Core Js -->

    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="{{asset('assets/plugins/nestable/jquery.nestable.js')}}"></script> <!-- Jquery Nestable -->
    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/sortable-nestable.js')}}"></script>
    <script src="http://foundation.zurb.com/sites/docs/assets/js/foundation.js?hash=b679e2177e3de7e04f4c100d03af1ad3"></script>
    <script>
        function loadAddModal() {
            $('#addModal').modal('show');
        }
    </script>
    <script>
        function loadEditModal(id) {
            var route = '{{ route("admin.show", ":id") }}';
            var action_route = '{{ route("employees.update", ":id_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                action_route = action_route.replace(':id_update', data.id);
                $('#editFormClient').attr('action', action_route);
                $('#login').val(data.login);
                $('#lastname').val(data.lastname);
                $('#firstname').val(data.firstname);
                $('#middlename').val(data.middlename);
                $('#phone').val(data.phone);
                $('#birthdate').val(data.birthdate);
                $('#editModal').modal('show');
                $('select[name=department_id]').val(data.department_id);
                $('select[name=position_id]').val(data.position_id);
                $('.show-tick').selectpicker('refresh');
            })
        }
    </script>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("employees.destroy", ":admin") }}';
            route = route.replace(':admin', id);
            $('#deleteFormClient').attr('action', route);
            $('#deleteModal').modal('show');
        }

    </script>
@endsection
