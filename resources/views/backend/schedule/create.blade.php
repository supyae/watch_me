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
                    @include('backend.common.error')

                    <div class="x_content">

                        {!! Form::open(array('action'=> [$controller.'@store'],
                       'method'=>'POST', 'files' => true, 'class'=> 'form-horizontal form-label-left','id'=> 'demo-form2')) !!}

                        @foreach($column as $col)

                            <div class="form-group">

                                @if($col != 'total_day')
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="first-name">{{ ucfirst($col) }} <span class="required">*</span>
                                    </label>
                                @endif


                                @if($col == 'theatre_id')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select($col,array_pluck($theatre, 'name', 'id'), null, ['class' => 'form-control']) !!}
                                    </div>
                                @elseif($col == 'movie_id')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select($col,array_pluck($movie, 'movie_name', 'id'), null, ['class' => 'form-control']) !!}
                                    </div>

                                @elseif(strpos($col, '_date') !== false)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="{{ $col }}" name="{{ $col }}"
                                               class="date-picker form-control col-md-7 col-xs-12"
                                               required="required"
                                               type="text">
                                    </div>
                                    {{--@elseif($col == 'total_day')--}}

                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input type="text" name="{{ $col }}" required="required"--}}
                                    {{--class="form-control col-md-7 col-xs-12" onclick="dt();" id="total_day">--}}
                                    {{--</div>--}}

                                @elseif($col != 'total_day')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="{{ $col }}" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                @endif
                            </div>

                        @endforeach


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="button" class="btn btn-danger" onclick="history.back();" value="Cancel">
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


@include('backend.common.footer')