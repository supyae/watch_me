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

                                    <td>  {{ ucfirst($col) }}</td>

                                @endforeach
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $datas)
                                <tr>
                                    @foreach($column as $col)

                                        <td>{{ $datas->$col }}</td>

                                    @endforeach
                                    <td>
                                        {!! Html::linkAction($controller.'@detail','Detail',array('id'=> $datas->id), ['class' => 'btn btn-round btn-success']) !!}
                                        &nbsp;
                                        {!! Html::linkRoute('back/'.$title.'/destroy','Reject',['id' => $datas->id], ['class' => 'btn btn-round btn-danger']) !!}
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