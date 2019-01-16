@include('backend.common.header')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> {{ ucfirst($title) }} </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <button class="btn btn-default" onclick="history.back();"> Back </button>

                        <table id="datatable" class="table table-bordered">
                            <tr> <td colspan="2" style="background: #f0f0f0"><center> <h4>Customer Information </h4></center> </td> </tr>
                            <tr> <td width="20%;"> Name </td> <td>{{ $data->customer->name }} </td></tr>
                            <tr> <td> Phone </td> <td>{{ $data->customer->phone }} </td></tr>
                            <tr> <td> Address </td> <td>{{ $data->customer->address }} </td></tr>
                            <tr> <td> Email </td> <td>{{ $data->customer->email }}</td></tr>

                            <tr> <td colspan="2" style="background: #f0f0f0"> <center><h4>Booking Information</h4> </center></td> </tr>
                            <tr> <td> Ticket  </td> <td>{{ $data->ticket_no }} </td></tr>
                            <tr> <td> Booking Date </td> <td>{{ $data->booking_date }} </td></tr>
                            <tr> <td> Qty </td> <td>{{ $data->total_seat }} </td></tr>
                            <tr> <td> Total Amount </td> <td>{{ $data->total_amount }} </td></tr>
                            <tr> <td> Discount  </td> <td>{{ $data->discount_amount }} </td></tr>
                            <tr> <td> Amount </td> <td>{{ $data->amount }}</td></tr>

                            <tr> <td colspan="2" style="background: #f0f0f0"> <center><h4>Reservation Information</h4> </center> </td> </tr>
                            <tr> <td> Movie </td> <td> {{ $data->schedule->movie->movie_name }}</td></tr>
                            <tr> <td> Cinema </td> <td> {{ $data->schedule->theatre->name }} </td></tr>
                            <tr> <td> Show Date </td> <td> {{ $data->available->show_date }}</td></tr>
                            <tr> <td> Show Time </td> <td> {{ $data->available->timetable->start_time }} ~ {{ $data->available->timetable->end_time }}</td></tr>
                            <tr> <td> Seater List</td>
                                <td>
                                    <table class="table table-bordered" style="width:40%;">
                                        <tr> <td>Seat Number</td> <td> Price </td> </tr>
                                    @if(sizeof($data->available->seater) > 1)

                                        @foreach($data->available->seater as $str)
                                            <tr>
                                                <td> {{ $str->seat_no }} </td>
                                                <td> {{ $str->price }} </td>
                                            </tr>
                                        @endforeach

                                    @else
                                        <tr>
                                            <td> {{$data->available->seater->seat_no}} </td>
                                            <td> {{$data->available->seater->price}}</td>
                                        </tr>

                                    @endif
                                    </table>

                                </td>
                            </tr>

                        </table>
                        <button class="btn btn-default" onclick="history.back();"> Back </button>
                    </div>
                </div>
            </div>


        </div>
    </div>


@include('backend.common.footer')