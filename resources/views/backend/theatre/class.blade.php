@include('backend.common.header')

<script src="/js/dynamic.js"></script>

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

                        {!! Form::open(array('action'=> [$controller.'@store'],'name' => 'cinema',
                                'method'=>'POST', 'files' => true, 'class'=> 'form-horizontal form-label-left','id'=> 'demo-form2')) !!}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Theatre Name : <span class="required">*</span>
                            </label>

                            <div class="control-label col-md-10 col-sm-3 col-xs-12">
                                <bold> {{ $name }} </bold>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="first-name"> Type Numbers of Rows:
                                <small> (Number only)</small>
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="rowno" id="rno" onkeyup="return produce_dynamic(event);"/>
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <td valign='top'><span id="tab">
					</span></td>
                            </tr>
                            <tr>
                                <td style='padding-top: 5px;float:right;'>
                                    <input type="button"
                                           onclick="javascript:history.back();"
                                           value="Back"/> <input type="submit"
                                                                 value="Save"/>
                                </td>
                            </tr>

                        </table>

                        <input type='hidden' value='{{ $last_id }}' name='tid'>
                        <input type='hidden' value='' name='tclass' id='totalclass'>

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

@include('backend.common.footer')