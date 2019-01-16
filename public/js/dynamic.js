function produce_dynamic(e){
    var rowno = document.getElementById("rno").value;
    //alert( "keyCode for the key pressed: " + e.keyCode + "\n" );

    //check numeric;

    if ((e.keyCode >= 48 && e.keyCode <=57) || (e.keyCode >= 96 && e.keyCode <= 105) ||
        e.keyCode == 8 || e.keyCode == 40 || e.keyCode == 37 || e.keyCode == 39 || e.keyCode == 46)
    {

        // for keycode from character a to z; keycode 65= a;
        var end = parseInt("65")+parseInt(rowno);
        //alert(end);

        if (end > 91)
        {
            alert('Exceed Limitation');
            return false;
        }
        else
        {

            var table = "<table cellpadding='5px' style='background-color: #fff;border:1px solid #fff;border-radius: 5px;'>";
            for(var i=65;i<end;i++){

                var res = String.fromCharCode(i);
                table += "<tr>";
                //table += "<td>"+res+"</td>";
                table += "<td><small>Class  : </small></td>";
                table += "<td><input type='text' name='class"+i+"' value="+res+" /></td><td width='2px'></td>";
                table += "<td>Price<input type='text' name='price"+i+"' /></td>";
                table += "<td>Floor<select name='floor"+i+"'><option value='1'>first floor</option><option value='2'>second floor</option></select>"
                table += "</tr>";
                //alert(res);
            }
            table += "</table>";
            var tc = parseInt(end-65);

            document.getElementById("tab").innerHTML = table;
            document.getElementById("tab").value = tc;

            document.forms["cinema"].tclass.value=tc;

        }
    }
    else
    {
        alert("Please enter only numeric numbers !!");
        e.preventDefault();
        return false;
    }
    /*
     if(!rowno.match(/[0-9|\b|/]/))
     {
     alert("Please only enter numeric characters");
     return false;
     }
     */

}
//
//function multiple_timetable(id)
//{
//    if(document.getElementById(id).checked==true)
//    {
//        var multi=document.getElementById('timetablecount').value;
//        //price = price+Number(tax);
//        var multip= Number(multi)+1;
//        document.getElementById('timetablecount').value = multip;
//    }
//    else
//    {
//        var multi=document.getElementById('timetablecount').value;
//        //price = price+Number(tax);
//        var multip= Number(multi)-1;
//        document.getElementById('timetablecount').value = multip;
//    }
//}


//function multiple_date(date_id){
//
//    var date_arr = [];
//
//    if(document.getElementById('showdate'+ date_id).checked == true){
//        date_arr.push(date_id);
//        document.getElementById('datecount').value = date_arr;
//
//    } else {
//
//        document.getElementById('datecount').value = date_arr;
//    }
//
//    console.log(date_arr);
//
//}


function multiple_timetable(id, date_id)
{
    if(document.getElementById(id).checked==true)
    {
        var multi=document.getElementById('timetablecount'+date_id).value;
        //price = price+Number(tax);
        var multip= Number(multi)+1;
        document.getElementById('timetablecount'+date_id).value = multip;
    }
    else
    {
        var multi=document.getElementById('timetablecount'+date_id).value;
        //price = price+Number(tax);
        var multip= Number(multi)-1;
        document.getElementById('timetablecount'+date_id).value = multip;
    }

}

