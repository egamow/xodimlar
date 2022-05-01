@extends('layout')
@section('title')Ходимлар@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><a href="{{ route('course.index') }}"> {{ $course->name }}</a> / Ходимлар</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Ходимлар</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                @if (auth()->user()->admin)
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="#"
                                   @if ( $course->number_of_students > count($groups) ) onclick="loadAddModal()" @else disabled @endif
                                >Қўшиш</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                    <p>Максимал ходим {{ $course->number_of_students }} та кўшиш мумкин</p>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center"  width="50px">#</th>
                        <th scope="col">Ходим Ф.И.Ш</th>
                        @if (auth()->user()->admin)
                            <th scope="col"   width="50px"></th>@endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($groups as $index => $group)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $group->lastname ?? '' }} {{ $group->firstname ?? '' }} {{ $group->middlenam ?? ''}}</td>
                            @if (auth()->user()->admin)
                                <td>
                                    <button class="btn btn-sm btn-danger"
                                            onclick="loadDeleteModal({{ $group->pivot->id }})"><i
                                                class="zmdi zmdi-delete"></i>
                                    </button>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if( !count($groups) )
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
                    <form action="{{ route('courses.users', $course->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-header justify-content-center">
                            <h4 class="title">Қўшиш</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user1_id">Ходим</label>
                                <select required class="form-control show-tick" name="user_id"
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
        function loadDeleteModal(id) {
            var route = '{{ route("group.delete", ":id") }}';
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
