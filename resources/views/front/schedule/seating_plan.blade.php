@include('front.common.header')

<link href="/front/css/sheet.css" rel="stylesheet">

<script>
    $(document).ready(function () {
        $("a[data-stateName]").click(function () {
            $(this).toggleClass("selected");

            //for seater number
            var itemsarray = [];
            $("#seatingplan li .selected").each(function () {

                var items = $(this).attr('id');
                itemsarray.push(items);
            });
            $('#views').html(itemsarray + ' ');
            $('#seatnum').val(itemsarray);

            //for total price
            var pricearray = [];
            $("#seatingplan li .selected").each(function () {

                var cprice = $(this).attr('id2');
                pricearray.push(cprice);
            });
            $('#pperseat').val(pricearray);
            var tprice = 0;
            for (var i = 0; i < pricearray.length; i++) {
                tprice += parseInt(pricearray[i]);
            }
            if (tprice == 0) {
                $('#viewc').html('');
            }
            if (tprice > 0) {
                $('#viewc').html("$ " + tprice);
            }
            $('#tpr').val(tprice);

        });
    });
    function viewseat(num) {
        //alert("seatnumber"+num);
        var sn = parseInt(num);
        document.getElementById('views').innerHTML = sn;
    }
    function check_seat() {
        var seatnum = document.getElementById('seatnum').value;
        if (seatnum == '') {
            alert('Please Choose Seat Number !');
            return false;
        }
        else {
            return true;
        }
    }
</script>


<style>
    .selected {
        background-image: url('/front/images/select.jpg');
    }
</style>


    <div id="page-wrapper">
        <div class="inner-content">
            <!-- /blog -->
            <div class="tittle-head">
                <h3 class="tittle"  style="color: floralwhite">Our Schedule </h3>

                <div class="clearfix"></div>
            </div>


            {{--<div id="templatemo_searchshedule">--}}
                <div id='seaterframe'>
                    <div style='float:left;margin-right: 2.5%;'>
                        <div id='container'>
                            <div id='stage'></div>
                            <ul id='seatingplan'>


                                @foreach($theatre_class as $class)
                                    <?php
                                    $classname = $class->class_name;
                                    $price = $class->price_per_row;
                                    $n = 1;
                                    ?>

                                    @while($n <= 20)
                                        <?php $seatnumber = $class->class_name . ' - ' . $n;

                                        if (in_array($seatnumber, $bkseats)) {
                                            echo '<li class="'.$classname.$n.'" id="notava">
                                            <a href="javascript:void(0);" style="display:block;width:18px; height:20px;" title="Seat No: '.$classname.' - '.$n.'">
                                            </a></li>';

                                        }
                                        else {
                                            echo '<li class="' . $classname . $n . '" id="ava">
                                             <a href="javascript:void(0);" style="display:block;width:18px; height:20px;" data-stateName="' . $n . '" id="' . $classname . ' - ' . $n . '"
                                            id2="' . $price . '" title="Seat No: ' . $classname . ' - ' . $n . '">
                                             </a></li>';
                                        }

                                        $n++;?>
                                    @endwhile

                                @endforeach
                            </ul>

                        </div>

                        <table class="seater_info">
                            <tr>
                                <td width='35%' style='color : #e33528;font-size:8pt;'>Available Seat</td>
                                <td>:</td>
                                <td><img src="/front/images/seata.jpg"></td>
                            </tr>
                            <tr>
                                <td style='color : #e33528;font-size:8pt;'>Selected Seat</td>
                                <td>:</td>
                                <td><img src="/front/images/select.jpg"></td>
                            </tr>
                            <tr>
                                <td style='color : #e33528;font-size:8pt;'>Booked Seat</td>
                                <td>:</td>
                                <td><img src="/front/images/bookedseat.jpg"></td>
                            </tr>
                        </table>

                    </div>

                    <div>
                        <table border='0' class="booking_info">
                            <tr>
                                <td colspan='2'
                                    style='background-color: #000000;border:1px solid #10243a;border-radius: 5px;line-height:22px;'>
                                    <center><span class='s'> Your Choosing Information </span></center>
                                </td>
                            </tr>
                            <tr>
                                <td width='80px'><span class='ss'> Seat number :</span></td>
                                <td><span id='views' style='color : #e33528;font-size:8pt;'></span></td>
                            </tr>

                            <tr>
                                <td><span class='ss'> Total Cost :</span></td>
                                <td><span id='viewc' style='color : #e33528;font-size:8pt;'></span></td>
                            </tr>

                            {!! Form::open(array('action' => ['FrontEnd\Booking\BookingController@store'] ,
                            'method' => 'POST', 'class' => '')) !!}
                            <input type='hidden' value='' id='seatnum' name='seatnum'>
                            <input type='hidden' value='' id='tpr' name='tprice'>
                            <input type='hidden' value='' id='pperseat' name='pperseat'>
                            <input type='hidden' value={{ $theatre_id }} name='theatre_id'>
                            <input type='hidden' value={{ $available_id }} name='available_id'>
                            <input type="hidden" value={{ $schedule_id }} name='schedule_id'>

                            <tr>
                                <td colspan='2'>
                                    <center><input type='submit' value='Make a Booking' class='btn btn-primary'
                                                   onclick='return check_seat();'></center>
                                </td>
                            </tr>
                            {!! Form::close() !!}
                        </table>

                        <br/>

                        <table class='detail'>

                            <tr>
                                <td colspan='2'
                                    style='background-color: #000000;border:1px solid #10243a;border-radius: 5px;line-height:22px;'>
                                    <center><span class='s'> Schedule Detail Information </span></center>
                                </td>
                            </tr>

                            <tr>
                                <td>Movie</td>
                                <td>{{ $movie->movie_name }}</td>
                            </tr>
                            <tr>
                                <td>Cinema</td>
                                <td> {{ $theatre->name }}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td> {{ $theatre->townhip_id }}</td>
                            </tr>
                            <tr>
                                <td>Show Date</td>
                                <td>{{ $available->show_date }}</td>
                            </tr>
                            <tr>
                                <td colspan='2' style='background-color:#000000;'>
                                    <center>Show Time</center>
                                </td>
                            </tr>
                            <tr>
                                <td>Start Time</td>
                                <td> {{ $time->start_time }}</td>
                            </tr>
                            <tr>
                                <td>End Time</td>
                                <td>{{ $time->end_time }}</td>
                            </tr>

                        </table>
                    </div>


                </div>


            {{--</div>--}}


        </div>
    </div>


@include('front.common.footer')