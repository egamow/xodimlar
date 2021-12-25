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
                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                                    <a class="btn btn-sm btn-info" href="{{ route('employees.show',$employee->id) }}">Кўриш</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('employees.edit',$employee->id) }}">Таҳрирлаш</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" data-color="pink" data-toggle="modal" data-target="#colorModal" class="btn bg-pink waves-effect">PINK</button>

                                    <button type="submit" class="btn btn-sm btn-danger">Ўчириш</button>
                                </form>
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
    <div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-pink">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Color Modal title</h4>
                </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                    vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                    Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                    nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                    Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc. </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round">SAVE CHANGES</button>
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




@endsection
