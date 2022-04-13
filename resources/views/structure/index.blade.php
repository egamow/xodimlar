@extends('layout')
@section('title')Ташкилий структура@endsection
@section('main_content')
    <!-- Main Content -->
    <link rel="stylesheet" href="{{asset('assets/newplugins/hierarchical-tree-table-view/css/tree-table.css')}}">
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Ташкилий структура</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Ташкилий структура</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('structure.create') }}"> Қўшиш</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-striped table-bordered tree-table">
                    <thead>
                    <tr>
                        <th scope="col">Номи</th>
                        <th width="350" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="table-tree">
                    </tbody>
                </table>
                @if( !count($items) )
                    <div class="align-center">Маълумот йук</div>
                @endif
            </div>
        </div>
    </section>
    <!-- Default Size -->
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
        var items = [
                @foreach($items as $item)
            {
                id: {{ $item->id }},
                name: '{{ $item->name }}',
                action: '<td> <a class="btn btn-sm btn-primary" href="{{ route('position.index',$item->id) }}">Штатлари ({{$item->count_positions_count}}) </a> <a class="btn btn-sm btn-secondary" href="{{ route('structure.edit',$item->id) }}">Таҳрирлаш </a> <button class="btn btn-sm btn-danger" onclick="loadDeleteModal({{ $item->id }})">Ўчириш </button></td>',
                @if($item->pid) parentId: {{ $item->pid }}, @endif
            },
            @endforeach
        ];
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="{{asset('assets/newplugins/hierarchical-tree-table-view/tree-table.js')}}"></script>

    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("structure.destroy", ":structure") }}';
            route = route.replace(':structure', id);
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
