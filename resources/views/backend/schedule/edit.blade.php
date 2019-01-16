@include('backend.common.header')


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
                        <br/>
                        {!! Form::model(
                        $data,
                        [
                            'action' => [$controller.'@update', $data[0]->id],
                            'method' => 'put',
                            'files' => true,
                            'class' => 'form-horizontal form-label-left',
                            'id'=> 'demo-form2'
                        ])  !!}

                        <input type="hidden" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Movie Name <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"
                                       value="{{ $data[0]->schedule->movie->movie_name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Theatre Name <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"
                                       value="{{ $data[0]->schedule->theatre->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Movie Name <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"
                                       value="{{ $data[0]->schedule->start_date}}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Movie Name <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"
                                       value="{{ $data[0]->schedule->end_date }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Movie Name <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"
                                       value="{{ $data[0]->show_date }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Change Timetable <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ul>
                                    @foreach($timetable as $tkey=>$time)

                                        <li>
                                            <input type='radio' value="{{ $time->id }}" <?php if($time->id == $data[0]->timetable_id){ echo 'checked';}?>
                                            name="timetableid" onchange="multiple_timetable('timetable{{ $tkey }}')" id="timetable{{ $tkey }}">
                                            {{ $time->start_time }} - {{ $time->end_time }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" onclick="history.back();">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!---- ---->

    </div>
</div>


<script src="/node_modules/gentelella/production/js/moment/moment.min.js"></script>
<script src="/node_modules/gentelella/production/js/datepicker/daterangepicker.js"></script>
<!-- bootstrap-daterangepicker -->
<script>
    $(document).ready(function () {
        $('#birthday').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

@include('backend.common.footer')