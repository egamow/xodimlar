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
                            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Ходимлар рўйхати</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
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
                            <td hidden>{{ $employee->department_id }} {{ $employee->position_id }}</td>
                            <td>
                                {{--<form action="{{ route('employees.destroy',$employee->id) }}" method="POST">--}}
                                    <a class="btn btn-sm btn-info" href="{{ route('employees.show',$employee->id) }}">Кўриш</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('employees.edit',$employee->id) }}">Таҳрирлаш</a>
                                    {{--@csrf--}}
                                    {{--@method('DELETE')--}}
                                    <button class="btn btn-sm btn-danger"
                                            data-modal-id="myModal" data-user_id="{{$employee->id}}"
                                            data-toggle="modal" data-target="#myModal">Delete</button>
                                    {{--<button type="button" data-user_id="{{$employee->id}}" data-color="pink" data-toggle="modal" data-target="#colorModal" class="btn bg-pink waves-effect">PINK</button>--}}

                                    {{--<button type="submit" class="btn btn-sm btn-danger">Ўчириш</button>--}}
                                {{--</form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>

        </div>
    </section>
    <!-- For Material Design Colors -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Color Modal title</h4>
                </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                </div>
                <div class="modal-footer">
                    <form action="{{ route('employees.destroy', 1) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-round">Ўчириш</button>
                    </form>
                    {{--<button type="button" class="btn btn-primary btn-round">SAVE CHANGES</button>--}}
                    <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">CLOSE</button>
                </div>
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
    <script >
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('user_id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })

    </script>

@endsection
