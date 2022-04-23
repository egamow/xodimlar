@extends('layout')
@section('title')Техника хафсизлиги бўйича бахолаш@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Техника хафсизлиги бўйича бахолаш</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Техника хафсизлиги бўйича бахолаш</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" onclick="loadAddModal()" href="#">Қўшиш</a>
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
                        <th scope="col">Ходим</th>
                        <th scope="col">Қоидабузарлик номи</th>
                        <th scope="col">Вакти</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tb_violations as $index=>$tb_violation )
                        {{--                        {{$tb_violation}}--}}
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ ($tb_violation->user->lastname ?? '') .' '.($tb_violation->user->firstname ?? '')}}</td>
                            <td>{{ $tb_violation->tbs->name }}</td>
                            <td>{{  date('Y-m-d H:i', strtotime($tb_violation->datetime)) }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" onclick="loadEditModal({{ $tb_violation->id }})"
                                   href="#"><i class="zmdi zmdi-edit"></i></a>
                                <button class="btn btn-sm btn-danger"
                                        onclick="loadDeleteModal({{ $tb_violation->id }})"><i
                                            class="zmdi zmdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( !count($tb_violations) )
                    <div class="align-center">Маълумот йук</div>
                @endif
            </div>
        </div>
    </section>
    <!-- Add Modal HTML -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('tb_violation.store')}}" method="POST">
                    @csrf
                    <div class="modal-header justify-content-center">
                        <h4 class="title">Қўшиш</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_tb">Қоидабузарлик тури</label>
                            <select required class="form-control show-tick" name="id_tb" data-live-search="true">
                                <option disabled selected>Танланг</option>
                                @foreach($tbs as $tb)
                                    <option value="{{$tb->id}}">{{$tb->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Ходим</label>
                            <select required class="form-control show-tick" name="user_id" data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="description">Санаси</label>
                                <input type="date" class="form-control" name="created_at"
                                       placeholder="Санаси" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Изох</label>
                            <textarea type="text" class="form-control" placeholder="Изох" name="description"></textarea>
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
    {{--    <!-- Edit Modal HTML -->--}}
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
                            <label for="id_tb">Қоидабузарлик тури</label>
                            <select required class="form-control show-tick" id="id_tb" name="id_tb"
                                    data-live-search="true">
                                <option disabled selected>Танланг</option>
                                @foreach($tbs as $tb)
                                    <option value="{{$tb->id}}">{{$tb->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Ходим</label>
                            <select required class="form-control show-tick" id="user_id" name="user_id"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="description">Санаси</label>
                                <input type="date" class="form-control" id="created_at" name="created_at"
                                       placeholder="Санаси" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Изох</label>
                            <textarea type="text" class="form-control" placeholder="Изох" id="description"
                                      name="description"></textarea>
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
    <script>
        function loadAddModal() {
            $('#addModal').modal('show');
        }
    </script>
    <script>
        function loadEditModal(id) {
            var route = '{{ route("tb_violation.show", ":id") }}';
            var action_route = '{{ route("tb_violation.update", ":tb_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                var created_at = data.created_at ? data.created_at.substring(0, 10) : '';
                console.log(created_at);
                action_route = action_route.replace(':tb_update', data.id);
                $('#editFormClient').attr('action', action_route);
                $('#created_at').val(created_at);
                $('#description').val(data.description);
                $('#editModal').modal('show');
                $('select[name=id_tb]').val(data.id_tb);
                $('select[name=user_id]').val(data.user_id);
                $('.show-tick').selectpicker('refresh');
            })
        }
    </script>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("tb_violation.destroy", ":tb_violation") }}';
            route = route.replace(':tb_violation', id);
            $('#deleteFormClient').attr('action', route);
            $('#deleteModal').modal('show');
        }
    </script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
{{--    <script src="assets/js/pages/ui/notifications.js"></script>--}}

    <script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->
    <script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->

    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
    <script src="{{asset('assets/js/pages/profile.js')}}"></script>

@endsection
