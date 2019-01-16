@include('backend.common.header')

<script src="/js/dynamic.js" type="text/javascript"></script>

<script>
    function dtdiff(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
        console.log(t2 - t1);
        var diff = (parseInt((t2 - t1) / (24 * 3600 * 1000)));
        console.log(diff);
        return diff;
        // return parseInt((t2 - t1) / (24 * 3600 * 1000));
    }

    function dt() {
        var fr = document.getElementById('start_date').value;
        var to = document.getElementById('end_date').value;

        var fr = fr.split("/");
        var to = to.split("/");

//        var dString = fr[0] + "," + fr[1] + "," + fr[2];
//        var dString2 = to[0] + "," + to[1] + "," + to[2];

        var dString = fr[2] + "," + fr[0] + "," + fr[1];
        var dString2 = to[2] + "," + to[0] + "," + to[1];
        console.log(dString);
        console.log(dString2);

        var d1 = new Date(dString);
        console.log(d1);
        var d2 = new Date(dString2);
        console.log(d2);

        var ans = dtdiff(d1, d2);
        console.log(ans);

        document.getElementById('total_day').value = ans + 1;

    }


</script>

<div class="right_col" role="main">
    <div class="">

        <!---- ---->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ ucfirst($title) }} </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <tr>
                                <td><span style="font-size: 11pt;font-weight: bold"> Movie </span></td>
                                <td><span style="font-size: 11pt;font-weight: bold"> Cinema </span></td>
                                <td><span style="font-size: 11pt;font-weight: bold"> Start Date </span></td>
                                <td><span style="font-size: 11pt;font-weight: bold"> End Date </span></td>
                                <td><span style="font-size: 11pt;font-weight: bold"> Total Day </span></td>
                                <td><span style="font-size: 11pt;font-weight: bold"> Action </span></td>
                            </tr>

                            @foreach($schedules as $schedule)

                                <tr style="background: #2a3f54;color: floralwhite">
                                    <td><span style="font-size: 11pt;">{{ $schedule->movie->movie_name }}</span></td>
                                    <td><span style="font-size: 11pt;">{{ $schedule->theatre->name }}</span></td>
                                    <td><span style="font-size: 11pt;">{{ $schedule->start_date }}</span></td>
                                    <td><span style="font-size: 11pt;">{{ $schedule->end_date }}</span></td>
                                    <td><span style="font-size: 11pt;">{{ $schedule->total_day }}</span></td>

                                    <td>
                                        {!! Html::linkRoute('back/'.$title.'/destroy','Destroy Whole Schedule',['id' => $schedule->id], ['class' => 'btn btn-round btn-danger']) !!}
                                        {!! Html::linkRoute('back/'.$title.'/destroy','Add',['id' => $schedule->id], ['class' => 'btn btn-round btn-primary']) !!}

                                    </td>
                                </tr>

                                <tr>

                                    <td colspan="6" bgcolor="#f0f8ff">
                                        <div class="x_title">Available Section</div>

                                        <table class="table table-bordered">
                                            <tr>
                                                <td> Show Date</td>
                                                <td> TimeTable</td>
                                                <td> Available Seat</td>
                                                <td> Action</td>
                                            </tr>


                                            @foreach(\App\Repositories\Schedule\Available::where('schedule_id', $schedule->id)->with('timetable')->get() as $ava)
                                                <tr>
                                                    <td> {{ $ava->show_date }}</td>

                                                    <td> {{ $ava->timetable->start_time }}
                                                        ~ {{ $ava->timetable->end_time }} </td>

                                                    <td> {{ $ava->available_seat }}
                                                        <span style="color: #6f1400">( sold {{ $ava->sold }} )</span>
                                                    </td>

                                                    <td>
                                                        <a href="{{ url('back/available/edit', ['available_id' => $ava->id]) }}"
                                                           title="Edit TimeTable">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </a>
                                                        &nbsp;
                                                        <a href="{{ url('back/available/destroy', $ava->id) }}"
                                                           title="Remove">
                                                            <span class="glyphicon glyphicon-remove-circle"></span>
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" title="Show Booking List">
                                                            <span class="glyphicon glyphicon-th-list"></span>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>

                                    </td>


                                </tr>

                            @endforeach

                        </table>


                        <div align="center">
                            {!! str_replace('/?', '?', $schedules->render()) !!}
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <!---- ---->

    </div>
</div>


@include('backend.common.footer')