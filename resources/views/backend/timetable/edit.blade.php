@include('backend.common.header')

<link rel="stylesheet" type="text/css" href="/timepicker/jquery-ui.css" />


<link rel="stylesheet" type="text/css" href="/timepicker/jquery.ptTimeSelect.css" />

<script type="text/javascript" src="/timepicker/jquery.min.js"></script>

<script src="/node_modules/gentelella/vendors/jquery/dist/jquery.min.js"></script>

<script type="text/javascript" src="/timepicker/jquery.ptTimeSelect.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // find the input fields and apply the time select to them.
        // $('#sample1 input').ptTimeSelect();
        $('#stime').ptTimeSelect();
        $('#etime').ptTimeSelect();
    });
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


                        <div class="module_content">
                            {!! Form::open(array(
                            'action'=> [$controller.'@update', $data->id],
                            'method' => 'put',
                            'files' => true,
                            'class'=> 'form-horizontal form-label-left',
                            'id'=> 'demo-form2')) !!}
                            <fieldset style="width:55%;">

                                <table>
                                    <tr style='line-height: 40px;'> <td width='40%'>Start Time</td>
                                        <td> <input name="start_time" value="{{ $data->start_time }}" id='stime'/></td></tr>
                                    <tr style='line-height: 40px;'><td>End Time</td>
                                        <td><input name="end_time" value="{{ $data->end_time }}" id='etime'/></td></tr>
                                    <tr><td></td><td>
                                            <input type='submit' value='Save' class='btn btn-success'>
                                            &nbsp;
                                            <input type="button" value="Cancel" class="btn btn-warning" onclick="history.back();">
                                        </td></tr>
                                </table>

                            </fieldset>
                            {!! Form::close() !!}
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <!---- ---->

</div>
</div>



<!-- Bootstrap -->
<script src="/node_modules/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/node_modules/gentelella/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/node_modules/gentelella/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/node_modules/gentelella/build/js/custom.min.js"></script>