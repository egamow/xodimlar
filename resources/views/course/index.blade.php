@extends('layout')
@section('title')
    Курслар
@endsection
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
                        <th scope="col">Ходимлар сони</th>
                        <th scope="col">Дарслар сони</th>
                        <th scope="col">Укитувчилар</th>
                        <th scope="col">Тест номи</th>
                        @if (auth()->user()->admin)
                            <th scope="col"></th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $index=>$course )
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $course->name }}
                                <br>
                                @if($course->begin_date)
                                    <span
                                        class="text-secondary">{{ date('d.m.Y', strtotime($course->begin_date))   }}</span>
                                @else
                                    <i class=" text-secondary">Бошланмаган</i>
                                @endif
                            </td>
                            <td>{{ $course->number_of_students }}</td>
                            <td>{{ $course->number_of_lessons }}</td>
                            <td>{{ $course->user1->lastname ?? '' }} {{ $course->user1->firstname ?? '' }} {{ $course->user1->middlenam ?? ''}}
                                <br>
                                {{ $course->user2->lastname ?? '' }} {{ $course->user2->firstname ?? '' }} {{ $course->user2->middlenam ?? ''}}
                            </td>
                            <td>{{ $course->test->name ?? '' }}</td>
                            @if (auth()->user()->admin)
                                <td>
                                    @if (!$course->begin_date)
                                        <a class="btn btn-sm btn-primary" href="#" title="Курсни бошлаш"
                                           onclick="startTest({{ $course }})">
                                            <i class="zmdi zmdi-play"></i> </a>
                                    @else
                                        <a class=" btn btn-sm btn-secondary" readonly href="#"
                                           title="Курс  {{ $course->begin_date }} да бошланган">
                                            <i class="zmdi zmdi-stop"></i></a>
                                    @endif
                                    <a class="btn btn-sm btn-primary" title="Курсга ходимлар қўшиш"
                                       href="{{ route('courses.group', $course->id) }}"><i
                                            class="zmdi zmdi-accounts-add"></i></a>
                                    <a class="btn btn-sm btn-primary" title="Курни таҳрирлаш"
                                       onclick="loadEditModal({{ $course->id }})"
                                       href="#"><i class="zmdi zmdi-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" title="Курсни ўчириш"
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
    @if (auth()->user()->admin)

        <!-- Add Modal HTML -->
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
                                <label for="number_of_students">Ходимлар сони</label>
                                <input type="number" step="any" class="form-control" placeholder="Ходимлар сони"
                                       name="number_of_students">
                            </div>
                            <div class="form-group">
                                <label for="test_id">Тест</label>
                                <select class="form-control show-tick" name="test_id"
                                        data-live-search="true">
                                    <option disabled selected> Танланг</option>
                                    @foreach($tests as $test)
                                        <option value="{{$test->id}}">{{$test->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="test_deadline">Тест топширишнинг охирги санаси</label>
                                <input type="date" class="form-control" placeholder="Тест топширишнинг охирги санаси"
                                       name="test_deadline">
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
                                <label for="description">Изох</label>
                                <textarea type="text" class="form-control" placeholder="Изох"
                                          name="description"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-round waves-effect">Саклаш</button>
                                <button type="button" class="btn btn-simple btn-round waves-effect"
                                        data-dismiss="modal">
                                    Бекор килиш
                                </button>
                            </div>
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
                                <label for="name">Номи</label>
                                <input type="text" class="form-control" placeholder="Номи" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="number_of_lessons">Дарслар сони</label>
                                <input type="number" step="any" class="form-control" placeholder="Дарслар сони"
                                       name="number_of_lessons" id="number_of_lessons">
                            </div>
                            <div class="form-group">
                                <label for="number_of_students">Ходимлар сони</label>
                                <input type="number" step="any" class="form-control" placeholder="Ходимлар сони"
                                       name="number_of_students" id="number_of_students">
                            </div>
                            <div class="form-group">
                                <label for="test_id">Tect</label>
                                <select class="form-control show-tick" name="test_id"
                                        data-live-search="true" id="test_id">
                                    <option selected value="0"> Танланг</option>
                                    @foreach($tests as $test)
                                        <option value="{{$test->id}}">{{$test->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="test_deadline">Тест топширишнинг охирги санаси</label>
                                <input type="date" class="form-control" placeholder="Тест топширишнинг охирги санаси"
                                       name="test_deadline" id="test_deadline">
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
                                <label for="description">Изох</label>
                                <textarea type="text" class="form-control" placeholder="Изох" id="description"
                                          name="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-round waves-effect">Саклаш</button>
                            <button type="button" class="btn btn-simple btn-round waves-effect"
                                    data-dismiss="modal">
                                Бекор килиш
                            </button>
                        </div>
                </form>
            </div>
        </div>
        </div>
        <!-- Delete Modal HTML -->
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
        {{-- Start Modal HTML --}}
        <div class="modal fade" id="startModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="startFormClient">
                        @csrf
                        @method('PUT')
                        <div class="modal-header justify-content-center">
                            <h4 class="title">Курсга бошлаш</h4>
                        </div>
                        <div class="modal-body justify-content-center">
                            <div class="form-group">
                                <label for="begin_date">Санани киритинг</label>
                                <input required type="date" class="form-control" name="begin_date" id="begin_date">
                            </div>
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
                $('#begin_date').val(data.begin_date);
                $('#test_deadline').val(data.test_deadline);
                $('#description').val(data.description);
                $('#editModal').modal('show');
                $('select[name="test_id"]').val(data.test_id);
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
    <script>
        function startTest(course) {
            let hasTest = Boolean(course.test_id);
            let hasUsers = Boolean(course.users_count);

            if (!hasTest && !hasUsers) {
                alert('Курсни бошлаш учун тестни танланг ва ходимларни кўшинг!!');
                return;
            }

            if (!hasUsers) {
                alert('Курсга ходим бириктирилмаган!');
            }
            if (!hasTest) {
                alert('Курсга тест бириктирилмаган!');
            } else {
                var route = '{{ route("courses.start", ":id") }}';
                route = route.replace(':id', course.id);
                $('#startFormClient').attr('action', route);
                $('#startModal').modal('show');
            }
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
