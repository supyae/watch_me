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
                    @include('backend.common.error')
                    <div class="x_content">
                        <br/>
                        {!! Form::model(
                        $data,
                        [
                            'action' => [$controller.'@update', $data->id],
                            'method' => 'put',
                            'files' => true,
                            'class' => 'form-horizontal form-label-left',
                            'id'=> 'demo-form2'
                        ]) !!}

                        <input type="hidden" value="{{ csrf_token() }}">

                        @foreach($column as $col)

                            <div class="form-group">
                                @if($col != 'password')
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="first-name">{{ ucfirst($col) }} <span class="required">*</span>
                                </label>
                                @endif

                                @if($col == 'user_type_id')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select($col,array_pluck($user_type, 'name', 'id'), $data->$col, ['class' => 'form-control']) !!}
                                    </div>
                                @elseif($col == 'theatre_id' )
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select($col,array_pluck($theatre, 'name', 'id'), $data->$col, ['class' => 'form-control']) !!}
                                    </div>
                                @elseif($col != 'password')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="{{ $col }}" required="required"
                                               value="{{ $data->$col }}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                @endif
                            </div>

                        @endforeach


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary" onclick="history.back();">Cancel</button>
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