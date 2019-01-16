@include('front.common.header')

<style>

    /** timer box */

    div#timerbox {
        width: 300px;
        height: 70px;
        border: 1px solid #214961;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        margin: auto;
        margin-bottom: 10px;
    }

    div h2 {
        font-family: Georgia, Tahoma;
        color: white;
    }

    div#timerticking {
        text-align: center;
    }

    div#tick {
        font-weight: bold;
        font-family: Georgia, Tahoma;
        text-align: center;
    }

    p.tickvalue {
        font-size: 20pt;
        padding: 10px;
        margin: 2px;
        background: #f3f3f3;
        color: #D20009;
        border-radius: 4px
    }

</style>

<script language='Javascript'>
    var h = 00;
    var m = 15;
    var s = 00;
    var mup, hup;
    var op = 'start';
    var timr;
    var timrstatus = true;
    function start() {
        if (timrstatus == true) {
            timr = setInterval("ticking()", 1000);
            timrstatus = false;
        }
    }
    function pause() {
        clearInterval(timr);
        timrstatus = true;
    }
    function stop() {
        clearInterval(timr);
        h = 00;
        m = 00;
        s = 00;
        document.getElementById('tickhours').innerHTML = h;
        document.getElementById('tickminutes').innerHTML = m;
        document.getElementById('tickseconds').innerHTML = s;
        timrstatus = true;
    }

    function ticking() {
        if (m == 00 && s == 00) {
            var bid = document.getElementById('bkid').value;

            alert("session time out. Please Try again ");
            //location.href='hello.htm';
            //location.href='sessiontimeout.php?bookingid='+bid;
        }

        if (s <= 00) {
            s = 59;
            mup = true;
        }
        else if (s > 00) {
            s = s - 01;
            mup = false;
            hup = false;
            if (s < 10) {
                s = '0' + s;
            }
        }

        if (mup == true && m < 59) {
            m = m - 01;
            if (m < 10) {
                m = '0' + m;
            }
        }
        else if (mup == true && m == 59) {
            m == 00;
            hup = true;
        }

        var h = '00';
        document.getElementById('tickhours').innerHTML = h;
        document.getElementById('tickminutes').innerHTML = m;
        document.getElementById('tickseconds').innerHTML = s;
    }
</script>

<div id="page-wrapper">
    <div class="inner-content">
        <!-- /blog -->
        <div class="tittle-head">

            <h3 class="tittle">YOUR ORDER</h3>

            <div id='timerbox'>
                <center>
                    <span style='font-size:10pt;color:#FF0000;'>...Make a booking during 15 minutes...</span>
                </center>
                <div id='timerticking'>
                    <div id='tick'>
                        <table align='center'>
                            <tr>
                                <td>
                                    <p class='tickvalue' id='tickhours'>00</p></td>
                                <td>
                                    <p class='tickvalue' id='tickminutes'>15</p></td>
                                <td>
                                    <p class='tickvalue' id='tickseconds'>00</p></td>
                                <td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>


            <div class="clearfix"></div>
        </div>

        <div id="bk">

            <div id="booking_detail">

                <table style='border-collapse:collapse;' class="detail">
                    <tbody>
                    <tr>
                        <td colspan='3'>
                            <center><h4 style="color: #e0bd4e">Booking Information</h4></center>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Time : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $time->start_time }}
                            ~ {{ $time->end_time }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">Location: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $theatre->township_id }}</td>
                    </tr>
                    <tr>
                        <td style='background-color:#000000;'><label class="cus">Cinema</label></td>
                        <td style='background-color:#000000;'><label class="cus"> Qty </label></td>
                        <td style='background-color:#000000;'><label class="cus"> Price </label></td>
                    </tr>
                    <tr>
                        <td>{{ $theatre->name }}</td>
                        <td>{{ $seat_total }}</td>
                        <td>{{ $price_total }}</td>
                    </tr>
                    <tr>
                        <td colspan='3' align='center' style='background-color:#000000;'>Your Seater List</td>
                    </tr>

                    @for($i=0;$i < $seat_total; $i++)

                        <tr>
                            <td colspan='2' align='center'>{{ $seats[$i] }}</td>
                            <td>Price - {{ $prices[$i] }}</td>
                        </tr>
                    @endfor

                    </tbody>
                </table>

            </div>


            <div id="customer_form">
                {!! Form::open(
                      [
                           'action' => ['FrontEnd\Booking\BookingController@update', $booking_id],
                           'method' => 'put',
                           'data-parsley-validate',
                           'id' => 'payment-form'
                      ])  !!}



                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                <table class="customer_form">
                    <tr>
                        <td colspan='2'>
                            <center><h4 style="color: #e0bd4e">Customer Information</h4></center>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="cus">Name: </label>
                        </td>
                        <td><input type="text" name="name" class="form-control" value=""
                                   placeholder="Enter u r name here"/>

                    <tr>
                        <td>
                            <label class="cus">Address:</label>
                        </td>
                        <td><input type="text" name="address" class="form-control" value=""
                                   placeholder="Enter u r address here"/>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="cus"> Phone:</label>
                        </td>

                        <td><input type="text" name="phone" value="" class="form-control"
                                   placeholder="Enter u r phone here"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="cus"> Email: </label>
                        </td>
                        <td><input type="text" name="email" value="" class="form-control"
                                   placeholder="Enter u r email here"/>

                    </tr>


                    <tr>
                        <td colspan="2">

                            <div style="float: left;"><h4 style="color: #e0bd4e;float:left;">Payment Detail
                                    Information</h4></div>

                            <div style="float:right;"><img src="http://i76.imgup.net/accepted_c22e0.png"></div>
                        </td>


                    </tr>

                    <tr>

                        <td colspan="2">

                            <!-- payment form -->

                            <div class="panel-body">
                                <div class="col-md-12">

                                    <div class="form-group" id="product-group">
                                        {!! Form::label('plane', 'Select Plan:') !!}
                                        {!! Form::select('plane', ['silver-small-014' => 'silver-small-014', 'google' => 'Google ($10)', 'game' => 'Game ($20)', 'movie' => 'Movie ($15)'], 'Book', [
                                            'class'                       => 'form-control',
                                            'required'                    => 'required',
                                            'data-parsley-class-handler'  => '#product-group'
                                            ]) !!}
                                    </div>
                                    <div class="form-group" id="cc-group">
                                        {!! Form::label(null, 'Credit card number:') !!}
                                        {!! Form::text(null, 4242424242424242, [
                                            'class'                         => 'form-control',
                                            'required'                      => 'required',
                                            'data-stripe'                   => 'number',
                                            'data-parsley-type'             => 'number',
                                            'maxlength'                     => '16',
                                            'data-parsley-trigger'          => 'change focusout',
                                            'data-parsley-class-handler'    => '#cc-group'
                                            ]) !!}
                                    </div>
                                    <div class="form-group" id="ccv-group">
                                        {!! Form::label(null, 'CVC (3 or 4 digit number):') !!}
                                        {!! Form::text(null, 123, [
                                            'class'                         => 'form-control',
                                            'required'                      => 'required',
                                            'data-stripe'                   => 'cvc',
                                            'data-parsley-type'             => 'number',
                                            'data-parsley-trigger'          => 'change focusout',
                                            'maxlength'                     => '4',
                                            'data-parsley-class-handler'    => '#ccv-group'
                                            ]) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="exp-m-group">
                                                {!! Form::label(null, 'Ex. Month') !!}
                                                {!! Form::selectMonth(null, null, [
                                                    'class'                 => 'form-control',
                                                    'required'              => 'required',
                                                    'data-stripe'           => 'exp-month'
                                                ], '%m') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="exp-y-group">
                                                {!! Form::label(null, 'Ex. Year') !!}
                                                {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                                                    'class'             => 'form-control',
                                                    'required'          => 'required',
                                                    'data-stripe'       => 'exp-year'
                                                    ]) !!}

                                                <span style="font-size: 9pt;color: floralwhite"> choose 01/2017 </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- payment form -->

                        </td>
                    </tr>

                </table>

                <input type="hidden" name='available_id' value={{ $available_id }} >
                <input type="hidden" name="booking_id" value={{ $booking_id }}>
                <input type="hidden" name="seat_total" value={{ $seat_total }}>


                <input type='submit' value='ORDER' class='btn btn-primary' style='float:right;'>
                <a href='javascript:void(0);' onclick='history.back();' class='btn btn-danger'
                   style='float:right;margin-right:1%;'>REJECT</a>

                {!! Form::close() !!}


            </div>
        </div>


        <!-- PARSLEY -->
        <script>
            window.ParsleyConfig = {
                errorsWrapper: '<div></div>',
                errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
                errorClass: 'has-error',
                successClass: 'has-success'
            };
        </script>

        <script src="http://parsleyjs.org/dist/parsley.js"></script>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script>
            Stripe.setPublishableKey("<?php echo env('STRIPE_PUBLISHABLE_SECRET') ?>");
            jQuery(function ($) {
                $('#payment-form').submit(function (event) {
                    var $form = $(this);
                    $form.parsley().subscribe('parsley:form:validate', function (formInstance) {
                        formInstance.submitEvent.preventDefault();
                        alert();
                        return false;
                    });
                    $form.find('#submitBtn').prop('disabled', true);
                    Stripe.card.createToken($form, stripeResponseHandler);
                    return false;
                });
            });
            function stripeResponseHandler(status, response) {
                var $form = $('#payment-form');
                if (response.error) {
                    $form.find('.payment-errors').text(response.error.message);
                    $form.find('.payment-errors').addClass('alert alert-danger');
                    $form.find('#submitBtn').prop('disabled', false);
                    $('#submitBtn').button('reset');
                } else {
                    var token = response.id;
                    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                    $form.get(0).submit();
                }
            }
            ;
        </script>


@include('front.common.footer')

