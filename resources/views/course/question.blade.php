@extends('layout')
@section('title')Саволлар@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><a href="{{ route('course.index', $course->id) }}"> {{ $course->name }}</a> /
                            <a href="{{ route('courses.test', $test->id) }}"> {{ $test->name }}</a> / Саволлар</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Саволлар</li>
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
                        <th scope="col" class="text-center" width="50px">#</th>
                        <th scope="col">Номи</th>
                        @if (auth()->user()->admin)
                            <th scope="col" width="180px"></th>@endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($questions as $index => $question)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $question->question }}</td>
                            @if (auth()->user()->admin)
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" onclick="loadShowModal({{ $question->id }})"
                                       href="#"><i class="zmdi zmdi-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" onclick="loadEditModal({{ $question->id }})"
                                       href="#"><i class="zmdi zmdi-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"
                                            onclick="loadDeleteModal({{ $question->id }})"><i
                                                class="zmdi zmdi-delete"></i>
                                    </button>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( !count($questions) )
                    <div class="align-center">Маълумот йук</div>
                @endif
            </div>
        </div>
    </section>
    @if (auth()->user()->admin)
        <!-- Add Modal HTML -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <div class="modal-header justify-content-center">
                            <h4 class="title">Қўшиш</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user1_id">Савол номи</label>
                                <input id="textareaID" type="text" class="form-control" placeholder="Номи"
                                       name="question">
                                <input hidden name="test_id" value="{{ $test->id }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <ul class="list-group">
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check1" checked>
                                        <input type="text" class="form-control" placeholder="1-Савол" name="answer1">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check2">
                                        <input type="text" class="form-control" placeholder="2-Савол" name="answer2">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check3">
                                        <input type="text" class="form-control" placeholder="3-Савол" name="answer3">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check4">
                                        <input type="text" class="form-control" placeholder="4-Савол" name="answer4">
                                    </div>
                                </ul>
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
        {{--    <!-- Show Modal HTML -->--}}
        <div class="modal fade" id="showModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    @csrf
                    {{--                        <div class="modal-header justify-content-center">--}}
                    {{--                            <h4 class="title" id="defaultModalLabel">Тахрирлаш</h4>--}}
                    {{--                        </div>--}}
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 id="show_question"></h4>
                        </div>
                        <hr>
                        <div class="form-group">
                            <ul class="list-group">
                                <li class="list-group-item" id="show_answer1"></li>
                                <li class="list-group-item" id="show_answer2"></li>
                                <li class="list-group-item" id="show_answer3"></li>
                                <li class="list-group-item" id="show_answer4"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-round waves-effect" data-dismiss="modal">
                            Ёпиш
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{--    <!-- Edit Modal HTML -->--}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="editFormClient">
                        @csrf
                        @method('PUT')
                        <div class="modal-header justify-content-center">
                            <h4 class="title" id="defaultModalLabel">Тахрирлаш</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user1_id">Савол номи</label>
                                <input id="question" type="text" class="form-control" placeholder="Номи"
                                       name="question">
                            </div>
                            <hr>
                            <div class="form-group">
                                <ul class="list-group">
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check1" id="check1">
                                        <input type="text" class="form-control" placeholder="1-Савол" name="answer1"
                                               id="answer1">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check2" id="check2">
                                        <input type="text" class="form-control" placeholder="2-Савол" name="answer2"
                                               id="answer2">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check3" id="check3">
                                        <input type="text" class="form-control" placeholder="3-Савол" name="answer3"
                                               id="answer3">
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input check-input-question" type="radio"
                                               name="check" value="check4" id="check4">
                                        <input type="text" class="form-control" placeholder="4-Савол" name="answer4"
                                               id="answer4">
                                    </div>
                                </ul>
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
            $('#addModal').on('shown.bs.modal', function () {
                $('#textareaID').focus();
            })
        }
    </script>
    <script>
        function loadShowModal(id) {
            var route = '{{ route("question.show", ":id") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                $('#show_question').text(data.question);
                $('#show_answer1').text(data.answer1);
                $('#show_answer2').text(data.answer2);
                $('#show_answer3').text(data.answer3);
                $('#show_answer4').text(data.answer4);

                if (data.check1) {
                    $('#show_answer1').addClass('active');
                } else if (data.check2) {
                    $('#show_answer2').addClass('active');
                } else if (data.check3) {
                    $('#show_answer3').addClass('active');
                } else if (data.check4) {
                    $('#show_answer4').addClass('active');
                }
                $('#showModal').modal('show');
            })
        }
    </script>
    <script>
        function loadEditModal(id) {
            var route = '{{ route("question.show", ":id") }}';
            var action_route = '{{ route("question.update", ":id_update") }}';
            route = route.replace(':id', id);
            $.get(route, function (data) {
                console.log($('#check4').val());
                action_route = action_route.replace(':id_update', data.id);
                $('#editFormClient').attr('action', action_route);

                $('#question').val(data.question);
                $('#answer1').val(data.answer1);
                $('#answer2').val(data.answer2);
                $('#answer3').val(data.answer3);
                $('#answer4').val(data.answer4);

                $('#check1').prop('checked', data.check1);
                $('#check2').prop('checked', data.check2);
                $('#check3').prop('checked', data.check3);
                $('#check4').prop('checked', data.check4);
                $('#editModal').modal('show');
            })
        }
    </script>
    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("question.delete", ":id") }}';
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
