@extends('layout')
@section('title')Профил
@endsection
@section('main_content')
    <!-- Main Content -->
    <section class="content profile-page">
        <div class="container">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Фойдаланувчи профили</h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <ul class="breadcrumb float-md-right padding-0">
                            <li class="breadcrumb-item"><a href="index"><i class="zmdi zmdi-home"></i></a></li>
                            <li class="breadcrumb-item active">Профил</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body bg-dark profile-header">
                            <div class="row">
                                <div class="col-lg-10 col-md-12">
                                    <img src="assets/images/profile_av.jpg" class="user_pic rounded img-raised" alt="User">
                                    <div class="detail">
                                        <div class="u_name">
                                            <h4><strong>Эшмат</strong> Тошматов</h4>
                                            <span>Тизим администратор</span>
                                        </div>
                                        <div id="m_area_chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12 user_earnings">
                                    <h6>Рейтинг</h6>
                                    <h4>
                                        <small class="number count-to" data-from="0" data-to="2124" data-speed="1500" data-fresh-interval="1000">
                                            2124
                                        </small>
                                    </h4>
                                    <input type="text" class="knob" value="89" data-width="80" data-height="80" data-thickness="0.1"
                                           data-bgcolor="#485058" data-fgColor="#f97c53">
                                    <span>Умумий ўртача 89% <i class="zmdi zmdi-caret-up text-success"></i></span>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs profile_tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#userdata">Шахсий маълумотлар</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersecurity">Хавфсизлик</a></li>
                            <li hidden class="nav-item"><a class="nav-link" data-toggle="tab" href="#schedule">Календар</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="userdata">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Шахсий маълумотлар </strong></h2>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <input readonly type="text" class="form-control" placeholder="Исмингиз" title="Исмингиз">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <input readonly type="text" class="form-control" placeholder="Фамилиянгиз" title="Фамилиянгиз">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <input readonly  type="text" class="form-control" placeholder="Отангизнинг исми" title="Отангизнинг исми">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <input readonly type="text" class="form-control" placeholder="Телефон рақамингиз"
                                                           title="Телефон рақамингиз">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea readonly rows="4" class="form-control no-resize btn-round" placeholder="Манзил" title="Манзил"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input readonly type="text" class="form-control" placeholder="Бўлим ёки бўлинма"
                                                           title="Бўлим ёки бўлинма">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input readonly type="text" class="form-control" placeholder="Лавозим"
                                                           title="Лавозим">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div role="tabpanel" class="tab-pane" id="usersecurity">
                                <form action="{{route('user.profile')}}" method="post">
                                    @csrf
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Хавфсизлик</strong></h2>
                                    </div>
                                    <div class="body">

                                        <div class="form-group">
                                           <h3>{{$login->created_at}}</h3>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" readonly class="form-control" placeholder="Логин" title="Логин">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Янги парол" title="Янги парол">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-round">Ўзгартиришларни сақлаш</button>
                                    </div>
                                </div>
                                </form>
                            </div>


                        <div hidden role="tabpanel" class="tab-pane page-calendar" id="schedule">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="card">
                                        <div class="body m-b-20">
                                            <div class="event-name b-lightred row">
                                                <div class="col-3 text-center">
                                                    <h4>09<span>Dec</span><span>2017</span></h4>
                                                </div>
                                                <div class="col-9">
                                                    <h6>Repeating Event</h6>
                                                    <p>It is a long established fact that a reader will be distracted</p>
                                                    <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="event-name b-greensea row">
                                                <div class="col-3 text-center">
                                                    <h4>16<span>Dec</span><span>2017</span></h4>
                                                </div>
                                                <div class="col-9">
                                                    <h6>Repeating Event</h6>
                                                    <p>It is a long established fact that a reader will be distracted</p>
                                                    <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body m-b-20 l-blue">
                                            <div class="event-name row">
                                                <div class="col-3 text-center">
                                                    <h4>28<span>Dec</span><span>2017</span></h4>
                                                </div>
                                                <div class="col-9">
                                                    <h6>Google</h6>
                                                    <p>It is a long established fact that a reader will be distracted</p>
                                                    <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body m-b-5 l-green">
                                            <div class="event-name row">
                                                <div class="col-3 text-center">
                                                    <h4>13<span>Dec</span><span>2017</span></h4>
                                                </div>
                                                <div class="col-9">
                                                    <h6>Birthday</h6>
                                                    <p>It is a long established fact that a reader will be distracted</p>
                                                    <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body l-green">
                                            <div class="event-name row">
                                                <div class="col-3 text-center">
                                                    <h4>11<span>Dec</span><span>2017</span></h4>
                                                </div>
                                                <div class="col-9">
                                                    <h6>Conference</h6>
                                                    <p>It is a long established fact that a reader will be distracted</p>
                                                    <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-round btn-primary m-t-15" data-toggle="modal" data-target="#addevent">Add
                                            Events
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="body">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Default Size -->
    <div class="modal fade" id="addevent" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Add Event</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" placeholder="Event Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Event Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea class="form-control no-resize" placeholder="Event Description..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round waves-effect">Add</button>
                    <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
    <script src="assets/bundles/morrisscripts.bundle.js"></script> <!-- Morris Plugin Js -->
    <script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts -->

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="assets/js/pages/calendar/calendar.js"></script>
    <script src="assets/js/pages/profile.js"></script>

@endsection
