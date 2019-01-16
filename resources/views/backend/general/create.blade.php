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
                        {!! Form::open(array('action'=> [$controller.'@store'],
                        'method'=>'POST', 'files' => true, 'class'=> 'form-horizontal form-label-left','id'=> 'demo-form2')) !!}

                        @foreach($column as $col)

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="first-name">{{ ucfirst($col) }} <span class="required">*</span>
                                </label>

                                @if($col == $relationKey)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select($col,array_pluck($dropdown, 'name', 'id'), null, ['class' => 'form-control']) !!}
                                    </div>
                                @elseif(strpos($col, '_img') !== false )
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::file('upload',['class'=>'content-box-large']) !!}
                                    </div>
                                @elseif(strpos($col, '_date') !== false)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="{{ $col }}" name="{{ $col }}"
                                               class="date-picker form-control col-md-7 col-xs-12"
                                               required="required"
                                               type="text">
                                    </div>

                                @elseif($col == 'trailer')
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="{{ $col }}" required="required"
                                               class="form-control col-md-7 col-xs-12" placeholder="https://www.youtube.com/embed/[youtube_id]">
                                    </div>
                                @else
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
                                <input type="button" class="btn btn-danger" onclick="history.back()" value="Cancel">
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