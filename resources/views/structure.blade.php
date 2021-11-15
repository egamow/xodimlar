@extends('layout')
@section('title')Корхона ташкилий структураси
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><strong>Корхона</strong> структураси</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="index"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Корхона структураси</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix m-b-20">
                <div class="dd">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="2">
                            {{--<button data-action="collapse" type="button" style="">Collapse</button>--}}
                            {{--<button data-action="expand" type="button" style="display: none;">Expand</button>--}}
                            <div class="dd-handle">Наблюдательный совет</div>
                            <ol class="dd-list" style="">
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle">Item 3</div>
                                </li>
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle">Item 1</div>
                                </li>
                                <li class="dd-item" data-id="5">
                                    {{--<button data-action="collapse" type="button" style="">Collapse</button>--}}
                                    {{--<button data-action="expand" type="button" style="display: none;">Expand</button>--}}
                                    <div class="dd-handle">Item 5</div>
                                    <ol class="dd-list" style="">
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle">Item 6</div>
                                        </li>
                                        <li class="dd-item" data-id="7">
                                            <div class="dd-handle">Item 7</div>
                                        </li>
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle">Item 8</div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9">
                                    <div class="dd-handle">Item 9</div>
                                </li>
                                <li class="dd-item" data-id="10">
                                    <div class="dd-handle">Item 10</div>
                                </li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="4">
                            <div class="dd-handle">Item 4</div>
                        </li>
                        <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                        </li>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle">Item 12</div>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </section>


<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="assets/plugins/nestable/jquery.nestable.js"></script> <!-- Jquery Nestable -->
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/ui/sortable-nestable.js"></script>

{{--<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->--}}
{{--<script src="assets/bundles/sparkline.bundle.js"></script> <!-- sparkline Plugin Js -->--}}
{{--<script src="assets/plugins/chartjs/Chart.bundle.js"></script> <!-- Chart Plugins Js -->--}}
{{--<script src="assets/plugins/chartjs/polar_area_chart.js"></script><!-- Polar Area Chart Js -->--}}

{{--<script src="assets/js/pages/index.js"></script>--}}
{{--<script src="assets/js/pages/charts/polar_area_chart.js"></script>--}}

{{--<script src="assets/js/pages/calendar/calendar.js"></script>--}}
{{--<script src="assets/js/pages/profile.js"></script>--}}
{{--=======--}}


@endsection
