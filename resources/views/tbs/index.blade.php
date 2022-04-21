@extends('layout')
@section('title')Техника хафсизлиги бўйича қоидабузарликлар@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Техника хафсизлиги бўйича қоидабузарликлар</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Техника хафсизлиги бўйича қоидабузарликлар</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                @if (auth()->user()->admin)

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" onclick="loadAddModal()" href="#">Қўшиш</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Номи</th>
                        <th scope="col">Балл</th>
                        @if (auth()->user()->admin) <th scope="col"></th> @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tbs as $index=>$tb )
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $tb->name }}</td>
                            <td>{{ $tb->ball }}</td>
                            @if (auth()->user()->admin)
                                <td>
                                    <a class="btn btn-sm btn-primary" onclick="loadEditModal({{ $tb->id }})"
                                       href="#"><i class="zmdi zmdi-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"
                                            onclick="loadDeleteModal({{ $tb->id }})"><i
                                                class="zmdi zmdi-delete"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( !count($tbs) )
                    <div class="align-center">Маълумот йук</div>
                @endif
            </div>
        </div>
    </section>
    <!-- Add Modal HTML -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('tbs.store')}}" method="POST">
                    @csrf
                    <div class="modal-header justify-content-center">
                        <h4 class="title">Қўшиш</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Номи</label>
                            <input type="text" class="form-control" placeholder="Номи" name="name">
                        </div>
                        <div class="form-group">
                            <label for="ball">Балл</label>
                            <input type="number" step="any" class="form-control" placeholder="Балл" name="ball">
                        </div>
                        <div class="form-group">
                            <label for="description">Изох</label>
                            <textarea type="text" class="form-control" placeholder="Изох" name="description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-round waves-effect">Саклаш</button>
                            <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">
                                Бекор килиш
                            </button>
                        </div>
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
                            <label for="name">Номи</label>
                            <input type="text" class="form-control" placeholder="Номи" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="ball">Балл</label>
                            <input type="number" step="any" class="form-control" placeholder="Балл" id="ball"
                                   name="ball">
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
            var route = '{{ route("tbs.show", ":id") }}';
            var action_route = '{{ route("tbs.update", ":id_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                console.log(data);
                action_route = action_route.replace(':id_update', data.id);
                $('#editFormClient').attr('action', action_route);
                $('#name').val(data.name);
                $('#ball').val(data.ball);
                $('#description').val(data.description);
                $('#editModal').modal('show');
            })
        }
    </script>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("tbs.destroy", ":tb") }}';
            route = route.replace(':tb', id);
            $('#deleteFormClient').attr('action', route);
            $('#deleteModal').modal('show');
        }
    </script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

    <script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->
    <script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->
    <script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script><!--/ calender javascripts -->

    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
    <script src="{{asset('assets/js/pages/calendar/calendar.js')}}"></script>
    <script src="{{asset('assets/js/pages/profile.js')}}"></script>

@endsection
