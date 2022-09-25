@extends('layout')
@section('title')
    Бош саҳифа
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content home">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2><strong>Умумий</strong> натижалар</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="index"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Бош саҳифа</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <input type="text" class="knob" value="66" data-width="90" data-height="90"
                                   data-thickness="0.1" data-fgColor="#26dad2" readonly>
                            <h6 class="m-t-20">Ижро интизоми</h6>
                            <p class="displayblock m-b-0">47% Ўртача <i class="zmdi zmdi-trending-up"></i></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <input type="text" class="knob dial2" value="75" data-width="90" data-height="90"
                                   data-thickness="0.1" data-fgColor="#7b69ec" readonly>
                            <h6 class="m-t-20">Меҳнат интизоми</h6>
                            <p class="displayblock m-b-0">70% Ўртача <i class="zmdi zmdi-trending-down"></i></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <input type="text" class="knob dial3" value="76" data-width="90" data-height="90"
                                   data-thickness="0.1" data-fgColor="#f9bd53" readonly>
                            <h6 class="m-t-20">Техника хавфсизлиги</h6>
                            <p class="displayblock m-b-0">75% Ўртача <i class="zmdi zmdi-trending-up"></i></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <input type="text" class="knob dial4" value="72" data-width="90" data-height="90"
                                   data-thickness="0.1" data-fgColor="#00adef" readonly>
                            <h6 class="m-t-20">Умумий холат</h6>
                            <p class="displayblock m-b-0">54% Ўртача <i class="zmdi zmdi-trending-up"></i></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <h6 class="text-left">Тестлар</h6>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Тест номи</th>
                                    <th scope="col">Саволлар сони</th>
                                    <th scope="col">Давомийлиги (мин.)</th>
                                    <th scope="col">Топшириш муддати</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user_new_tests as $index => $user_new_test )
                                    <tr>
                                        <td>{{ $user_new_test->name }}</td>
                                        <td>{{ $user_new_test->countQuestions() }}</td>
                                        <td>{{ $user_new_test->minutes }}</td>
                                        <td>{{ date('d.m.Y', strtotime($user_new_test->begin_date)) }}
                                            <br> {{ date('H:i', strtotime($user_new_test->begin_date))      }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if( !count($user_new_tests) )
                                <div class="align-center">Маълумот йук</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            {{--                        <input type="text" class="knob dial2" value="75" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#7b69ec" readonly>--}}
                            {{--                        <h6 class="m-t-20">Меҳнат интизоми</h6>--}}
                            {{--                        <p class="displayblock m-b-0">70% Ўртача <i class="zmdi zmdi-trending-down"></i></p>--}}
                            <h6 class="text-left">Топширилган тестлар</h6>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Тест номи</th>
                                    <th scope="col">Натижа</th>
                                    <th scope="col">Сана</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user_passed_tests as $index => $user_passed_test )
                                    <tr>
                                        <td>{{ $user_passed_test->name }}</td>
                                        <td>{{ $user_passed_test->result }}</td>
                                        <td>{{ $user_passed_test->date_result }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if( !count($user_passed_tests) )
                                <div class="align-center">Маълумот йук</div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->
    <script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- sparkline Plugin Js -->
    <script src="{{asset('assets/plugins/chartjs/Chart.bundle.js')}}"></script> <!-- Chart Plugins Js -->
    <script src="{{asset('assets/plugins/chartjs/polar_area_chart.js')}}"></script><!-- Polar Area Chart Js -->

    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
    <script src="{{asset('assets/js/pages/charts/polar_area_chart.js')}}"></script>

    <script src="{{asset('assets/js/pages/calendar/calendar.js')}}"></script>
    <script src="{{asset('assets/js/pages/profile.js')}}"></script>

@endsection

