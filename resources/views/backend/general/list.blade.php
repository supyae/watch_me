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

                        {!! Html::linkAction($controller.'@create','Add',null, ['class' => 'btn btn-round btn-primary']) !!}

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                @foreach($column as $col)
                                    @if ($col != 'trailer' && $col != 'movie_img' && $col != 'maps')
                                    <td>  {{ ucfirst($col) }}</td>
                                    @endif
                                @endforeach
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $data)
                                <tr>

                                    @foreach($column as $col)
                                        @if($col == $relationKey)
                                            <td> {{ $data->$relation->$attr }} </td>

                                        @elseif ($col != 'trailer' && $col != 'movie_img' && $col != 'maps')
                                            <td>{{ $data->$col }}</td>
                                        @endif

                                    @endforeach
                                    <td>
                                        {!! Html::linkAction($controller.'@edit','Edit',array('id'=> $data->id), ['class' => 'btn btn-round btn-success']) !!}
                                        &nbsp;
                                        {!! Html::linkRoute('back/'.$title.'/destroy','Delete',['id' => $data->id], ['class' => 'btn btn-round btn-danger']) !!}
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>


@include('backend.common.footer')