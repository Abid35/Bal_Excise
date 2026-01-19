@extends('layouts.dash')



@section('content')



<style>

     .table {

   display: block !important;

}



.main {

 width: 80%;

 align-content: center;

 align-items: center;

 float: right;

}

@media (max-width: 992px) {

    .main {

 width: 100%;



 float: none;

}

}

.strong {

    font-weight: bold;

    color: black;

}



.has-search .form-control {

    padding-left: 2.375rem;

}



.has-search .form-control-feedback {

    position: absolute;

    z-index: 2;

    display: block;

    width: 2.375rem;

    height: 2.375rem;

    line-height: 1.75rem;

    padding-right: 15%;

    text-align: center;

    pointer-events: none;

    color: #aaa;

}

.headings {

    border-bottom: solid 2px black;

}

td {

    padding-left: 3rem;

}

</style>



<div id="maindiv" class="container main">



    <div class="row">

        <div class="col-md-4 ">

            <h2 class="strong"> Search Challan Number </h2>

        </div>

        <!-- <div class="col-md-2">

        </div>

        <div class="col-md-2">

        </div> -->







    </div>

    <div class="row">

        <div class="col-md-3 ">



        </div>
        <div class="col-md-6" style="margin-top: 1%">

            <div class="form-group has-search">

                <span class="fa fa-search form-control-feedback"></span>

                <input type="text" class="form-control"  id="reg_no" placeholder="Search By Challan No.">



              </div>

        </div>

        <div class="col-md-3 " style="margin-top: 1%">

        <button  type="button" class="btn  btn-dark" id="Search" >Search</button>

        </div>


    </div>

    <div id="client" >

    </div>



</div>


<script>

$(document).ready(function () {

    $("#Search").click(function(){

        id= $('#reg_no').val();
        $.ajax({

            url: "/banksearch/"+id,

            type: "GET",

            dataType: "JSON",

            contentType: "application/json",


            success: function (response) {

                if (response.data != null) {

                    var data= response.data;
                    var voucher= response.voucher;
                    console.log(response);
                    printn="";
                    stat="";
                    total=0;

                    if(voucher.status_voucher!="Paid")
                    {
                        stat=` <a href="paid/`+voucher.id+`" type="button" class="btn-lg  btn-info" id="pay" >Paid</a> `;
                    }

                    $.each(response.fees, function(index, value) {

                    printn +=  `<tr>
                                                <td class="col-md-9">`+value.title+`</td>
                                                <td class="col-md-3">Rs  `+value.amount+`</td>
                                            </tr>`;
                    });

                    $.each(response.arrear, function(index, value) {

                    printn +=  `<tr>
                                                <td class="col-md-9">`+value.title+`(`+value.tax_arrears_type+` Arrear )`+`</td>
                                                <td class="col-md-3">Rs  `+value.amount+`</td>
                                            </tr>`;
                    total+=parseFloat( value.amount);
                    });

                    total+=parseFloat( voucher.total_amount);
                    $("#client").append(`<div class="col-md-12">
                        <div class="row">

                            <div class="receipt-main col-xs-12 col-sm-12 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 bg-white text-dark" style="padding:3%;">
                                <div class="row">
                                    <div class="receipt-header">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="receipt-left">

                                                <p><b>District :</b> `+voucher.district+`</p>
                                                <p><b>Status :</b> `+voucher.status+`</p>
                                                <p><b>Date :</b> `+voucher.issue_date+`</p>                                </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                            <div class="receipt-right">
                                                <h5>`+data.registration_no+`.</h5>
                                                <p>`+data.name_+`</p>
                                                <p>`+data.mobile_no+` <i class="fa fa-phone"></i></p>
                                                <p>`+data.new_cnic_no+`</p>
                                                <p>`+data.owner_type+`</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="receipt-header receipt-header-mid">
                                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                            <div class="receipt-right">

                                                <p><b>Chassis No :</b>`+data.chassis_no+` </p>
                                                <p><b>Engine No :</b>`+data.engine_no+` </p>
                                                <p><b>Category :</b> `+data.category_of_vehicle+`</p>
                                                <p><b>Last tax paid upto :</b> `+voucher.last_paid_year+`</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="receipt-left">
                                                <h3>Challan No. # `+voucher.challan_no+`</h3>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            `+printn+`

                                            <tr>
                                                <td class="text-right">
                                                <p>
                                                    <strong>Total Amount: </strong>
                                                </p>


                                                </td>
                                                <td>
                                                <p>
                                                    <strong>Rs `+total+`/-</strong>
                                                </p>


                                                </td>
                                            </tr>
                                            <tr>

                                                <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                                <td class="text-left text-danger"><h2><strong>Rs  `+total+`/-</strong></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>

                            <div class="row">
                                    <div class="receipt-header receipt-header-mid receipt-footer">
                                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                            <div class="receipt-right">
                                                <p><b>Date :</b>`+ moment().format()+`</p>
                                                <h5 style="color: rgb(140, 140, 140);">Thanks for using Panel.!</h5>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="receipt-left">
                                                <h2 style="color: blue;">`+voucher.status_voucher+`</h2>
                                                `+stat+`
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>`);


                }

                else {
                    swal("Record not Found.");
                }

            },

            error: function (response) {
                swal("Something Went Wrong Please Try Again Letter....!");
            }

        });
    });


});


</script>


@endsection
