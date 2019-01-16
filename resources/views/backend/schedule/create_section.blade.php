@include('backend.common.header')

        <!-- iCheck -->
<link href="/node_modules/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<script src="/js/dynamic.js" type="text/javascript"></script>
<script src="/js/jquery.js" type="text/javascript"></script>

<script>
    $(function () {

        $("ul#dfm li :checkbox").click(function () {
            var dateval = [];
            $("ul#dfm li :checkbox:checked").each(function (i) {
                dateval[i] = $(this).val();
            });
            console.log(dateval);
            $('#date_id').val(dateval);
        });

//        // for total date value;
//        $("form#dfm :checkbox").click(function () {
//            console.log('hi');
//            var dateval = [];
//            $('form#dfm :checkbox:checked').each(function (i) {
//                console.log($(this).val());
//                dateval[i] = $(this).val();
//            });
//            //console.log('date ----');
//            //console.log(dateval);
//            $('#date_id').val(dateval);
//        });

        $("a[data-stateName]").click(function () {
            var timeval = [];
            var row = $(this).attr("data-stateName");
            var result = row.split(',');
            var total_id = result[0];
            var tid = result[1];

            $("ul#tfm" + total_id + " li :checkbox:checked").each(function (i) {

                timeval[i] = $(this).val();
            });
            console.log(timeval);
            $('#timetable_id' + total_id).val(timeval);
        });

    });

</script>

<div class="right_col" role="main">
    <div class="">

        <!---- ---->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Detail Schedule

                        </h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <table>
                            <tr> <td>Movie : </td> <td> <span style="color: #f20d0d;">{{ $movie_name }} </span></td></tr>
                            <tr> <td>Cinema </td> <td> <span style="color: #f20d0d;"> {{ $cinema }} </span></td></tr>
                            <tr> <td>Date: </td> <td> <span style="color: #f20d0d;"> {{ $start_date }} ~ {{ $end_date }} </span> </td></tr>
                        </table>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th></th>

                                    <th class="column-title" style="width: 15%;">Choose Show Date</th>
                                    <th class="column-title">Choose Show Timetable</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                    class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                {!! Form::open(array('action'=> [$controller.'@store_data'],
                       'method'=>'POST', 'files' => true, 'class'=> 'form-horizontal form-label-left', 'id'=> 'section')) !!}

                                @for($j = 0; $j < $dates; $j++)

                                    <?php
                                    $newdate = date("Y-m-d", mktime(12, 0, 0, date("m", strtotime($start_date)),
                                            (date("d", strtotime($start_date)) + $j), date("Y", strtotime($start_date))));
                                    ?>


                                    <tr class="even pointer">

                                        <td class="" style="width: 2%;">

                                            <ul id="dfm">
                                                <li><input type="checkbox" class="flat" name="showdate"
                                                           id="showdate{{$j}}" value="{{$j}}" readonly></li>
                                            </ul>

                                        </td>
                                        <td class=" " style="width: 10%;"><input type="text"
                                                                                 value="{{ $newdate }}"
                                                                                 name="showdate{{$j}}"></td>

                                        <?php
                                            $timetable = \App\Repositories\Schedule\AvailableRepository::get_timetable_excerpt_insert($newdate, $theatre_id);
                                            ?>

                                        <td class=" " style="width: 70%">
                                            <ul id="tfm{{$j}}">

                                                @foreach($timetable as $i=>$timetables)
                                                    <li>
                                                        <a data-stateName="{{$j}},{{$i}}">
                                                            <input type='checkbox'
                                                                   value='{{ $timetables->id }}'
                                                                   onchange="multiple_timetable('timetable{{$i}}', '{{$j}}')"
                                                                   id='timetable{{$i}}'
                                                                   name='timetable{{ $j }}{{ $i }}'>
                                                            {{ $timetables->start_time }} - {{ $timetables->end_time }}
                                                        </a>

                                                    </li>

                                                @endforeach

                                                <input type="hidden" id="timetable_id{{$j}}" name="timetable{{$j}}" value="0">
                                            </ul>


                                        </td>
                                        <td class=" last" id="row{{$j}}"><a href="#">View</a></td>
                                    </tr>

                                @endfor

                                <input type="hidden" id="date_id" name="date_id"/>

                                <input type="hidden" value="{{ $schedule_id }}" name="schedule_id">
                                <input type="hidden" value="{{ $available_seat }}" name="available_seat">

                                </tbody>
                            </table>
                            <input type="submit" value="SAVE SCHEDULE" class="btn btn-danger">

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script src="/node_modules/gentelella/production/js/moment/moment.min.js"></script>
<script src="/node_modules/gentelella/production/js/datepicker/daterangepicker.js"></script>

@include('backend.common.footer')