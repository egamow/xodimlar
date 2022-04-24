@extends('layout')
@section('title')Курслар@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Курслар</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Курслар</li>
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
                        <th scope="col">Талабалар сони</th>
                        <th scope="col">Дарслар сони</th>
                        <th scope="col">Укитувчи</th>
                        <th scope="col">2-Укитувчи</th>
                        <th scope="col">Дарс бошланиши</th>
                        @if (auth()->user()->admin)
                            <th scope="col"></th>@endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $index=>$course )
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->number_of_students }}</td>
                            <td>{{ $course->number_of_lessons }}</td>
                            <td>{{ $course->user1->lastname ?? '' }} {{ $course->user1->firstname ?? '' }} {{ $course->user1->middlenam ?? ''}}</td>
                            <td>{{ $course->user2->lastname ?? '' }} {{ $course->user2->firstname ?? '' }} {{ $course->user2->middlenam ?? ''}}</td>
                            <td>{{ config('app.month.'.$course->start_month)  }}</td>
                            @if (auth()->user()->admin)
                            <td>
                                <a class="btn btn-sm btn-primary" onclick="loadEditModal({{ $course->id }})"
                                   href="#"><i class="zmdi zmdi-edit"></i></a>
                                <button class="btn btn-sm btn-danger"
                                        onclick="loadDeleteModal({{ $course->id }})"><i
                                            class="zmdi zmdi-delete"></i>
                                </button>
                            </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( !count($courses) )
                    <div class="align-center">Маълумот йук</div>
                @endif
            </div>
        </div>
    </section>
    <!-- Add Modal HTML -->
    @if (auth()->user()->admin)

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('course.store')}}" method="POST">
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
                            <label for="number_of_lessons">Дарслар сони</label>
                            <input type="number" step="any" class="form-control" placeholder="Дарслар сони"
                                   name="number_of_lessons">
                        </div>
                        <div class="form-group">
                            <label for="number_of_students">Талабалар сони</label>
                            <input type="number" step="any" class="form-control" placeholder="Талабалар сони"
                                   name="number_of_students">
                        </div>
                        <div class="form-group">
                            <label for="user1_id">Укитувчи</label>
                            <select required class="form-control show-tick" name="user1_id"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user2_id">Укитувчи 2</label>
                            <select required class="form-control show-tick" name="user2_id"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_month">Дарс бошланиши</label>
                            <select required class="form-control show-tick" name="start_month">
                                <option disabled selected> Танланг</option>
                                @foreach(config('app.month') as $key => $month)
                                    <option value="{{$key}}">{{$month}}</option>
                                @endforeach
                            </select>
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
                            <label for="number_of_lessons">Дарслар сони</label>
                            <input type="number" step="any" class="form-control" placeholder="Дарслар сони"
                                   name="number_of_lessons" id="number_of_lessons">
                        </div>
                        <div class="form-group">
                            <label for="number_of_students">Талабалар сони</label>
                            <input type="number" step="any" class="form-control" placeholder="Талабалар сони"
                                   name="number_of_students" id="number_of_students">
                        </div>
                        <div class="form-group">
                            <label for="user1_id">Укитувчи</label>
                            <select required class="form-control show-tick" name="user1_id" id="user1_id">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user2_id">Укитувчи 2</label>
                            <select required class="form-control show-tick" name="user2_id" id="user2_id"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->login ?? ''}}
                                        - {{$user->lastname ?? ''}} {{$user->firstname ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_month">Дарс бошланиши</label>
                            <select required class="form-control show-tick" name="start_month" id="start_month"
                                    data-live-search="true">
                                <option disabled selected> Танланг</option>
                                @foreach(config('app.month') as $key => $month)
                                    <option value="{{$key}}">{{$month}}</option>
                                @endforeach
                            </select>
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
    @endif

    <script>
        function loadAddModal() {
            $('#addModal').modal('show');
        }
    </script>
    <script>
        function loadEditModal(id) {
            var route = '{{ route("course.show", ":id") }}';
            var action_route = '{{ route("course.update", ":id_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                console.log(data);
                action_route = action_route.replace(':id_update', data.id);
                $('#editFormClient').attr('action', action_route);
                $('#name').val(data.name);
                $('#number_of_students').val(data.number_of_students);
                $('#number_of_lessons').val(data.number_of_lessons);
                $('#start_month').val(data.start_month);
                $('#description').val(data.description);
                $('#editModal').modal('show');
                $('select[name=user1_id]').val(data.user1_id);
                $('select[name=user2_id]').val(data.user2_id);
                $('.show-tick').selectpicker('refresh');

            })
        }
    </script>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("course.destroy", ":id") }}';
            route = route.replace(':id', id);
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
