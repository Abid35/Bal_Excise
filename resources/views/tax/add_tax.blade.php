<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>



    $(document).ready(function(){

        $('#exc').hide();

        $('input:radio[name="pro_type"]').change(
            function(){
                if ($(this).is(':checked') && $(this).val() == 'Ex') {
                    $('#exc').show();
                }
                else
                {
                    $('#exc').hide();
                }
        });




        $('#tabledet').change(function(){
            if($('#tabledet').val()=="fam")
                       {
                        $('#fam_div').append(`

                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="fam" maxlength="20" name="fam" placeholder="Enter  amount/Percentage/per rate" /></div></div>

                        <input type="radio" id="type_am1" name="type_am" value="PERCC">
                        <label for="type_am1">PER CC</label><br>
                        <input type="radio" id="type_am1" name="type_am" value="PERWEIGHT">
                        <label for="type_am6">PER unlen WEIGHT</label><br>
                        <input type="radio" id="type_am6" name="type_am" value="LIMIT">
                        <label for="type_am5">LIMITED TILL</label>
                        <input type="text" name='limityear' id ="limityear" placeholder="Enter no Years" style='display:none'  />
                        <br>

                        <input type="radio" id="type_am2" name="type_am" value="LT" >
                        <label for="type_am2">Life Time</label><br>
                        <input type="radio" id="type_am3" name="type_am" value="REG">
                        <label for="type_am3">Registration Fees</label><br>
                        <input type="radio" id="type_am4" name="type_am" value="YEAR">
                        <label for="type_am4">Yearly Fees</label><br>
                        `);
                       }
            $('input:radio[name="type_am"]').change(
            function(){
                if ($(this).is(':checked') && $(this).val() == 'LIMIT') {
                    $('#limityear').show();
                    $('#limityear').prop('required',true);
                }
                else
                {
                    $('#limityear').hide();
                    $('#limityear').prop('required',false);
                }

             });
        });




        $('#table').change(function(){
            var p = $(this).val();
            if(p!=0)
            {

                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/para/"+p+"/0/key",

                    dataType: 'json',

                    async: false,

                    success: function (response) {
                        var arr="";
                        $.each(response, function (index, value) {
                                arr= arr + `<option value="` + value+ `">` + value + `</option>`
                                });
                        let x = Math.floor((Math.random() * 100000) + 1);
                        $('#tablelist').append(`
                        <div id="b`+x+`">

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label  >`+p+` </label></div>

                                    <select name="tablelists[]" id="`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>
                                    <input type="checkbox" name="con_constant`+p+`" id="con_constant`+p+`" />
                                    <label for="con_constant`+p+`">Connected With Constant Parameter</label><br>
                                    <div id=clist`+p+` >


                                    </div>

                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove `+p+`</a>

                                </div>

                            </div>
                        <hr/>
                        </div>


                        `);


                    }
                });

            $('#'+p).change(function(){
                console.log();
                var c=$(this).attr("id");
                var p=$(this).val();
                if(p!=0)
                {
                console.log(p);
                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/para/"+c+"/"+p+"/value",

                    dataType: 'json',

                    async: false,

                    success: function (response) {

                        var arr="";

                            $.each(response, function (index, value) {

                                arr= arr + `<option value="` + value[0]+ `">` + value[1] + `</option>`;
                                });

                        console.log('#clist'+c);
                        let x = Math.floor((Math.random() * 100000) + 1);
                       if( $('#tabledet').val()=="wam")
                       {
                        $('#clist'+c).append(`
                        <div id="b`+x+`">
                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>`+p+` </label></div>
                                    <select name="tablelists`+p+`[]" id="`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>
                                    <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`am" maxlength="20" name="`+p+`am[]" placeholder="Enter `+p+` amount" /></div></div>
                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                    <div id="`+p+`a" class="div" >
                                        <a href="javascript:void(0)" id="add`+p+`" >Add `+p+`</a>
                                        <div id="block`+p+`" >



                                        </div>
                                    </div>



                                </div>

                            </div>

                        <hr/>
                        </div>


                        `);
                       }
                       else

                       {
                        $('#clist'+c).append(`
                        <div id="b`+x+`">
                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>`+p+` </label></div>
                                    <select name="tablelists`+p+`[]" id="`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>
                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                    <div id="`+p+`a" class="div" >
                                        <a href="javascript:void(0)" id="add`+p+`" >Add `+p+`</a>
                                        <div id="block`+p+`" >



                                        </div>
                                    </div>



                                </div>

                            </div>

                        <hr/>
                        </div>


                        `);
                       }


                        $('#add'+p).click(function(){
                        let x = Math.floor((Math.random() * 100000) + 1);
                        var ma=$('#'+p).val();
                       console.log('clicked');

                        if( $('#tabledet').val()=="wam")
                        {
                            $('#block'+p).append( `<div id="b`+x+`">
                                     <select name="tablelists`+p+`[]" id="`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>
                                    <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`am" maxlength="20" name="`+p+`am[]" placeholder="Enter `+p+` amount" /></div></div>

                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                   </div>`);


                        }
                        else

                        {
                            $('#block'+p).append( `<div id="b`+x+`">
                                     <select name="tablelists`+p+`[]" id="`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>

                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                   </div>`);


                        }

                    });


                    }
                });
                }
            });

            }

        });

        $('#tableex').change(function(){
            var p = $(this).val();
            if(p!=0)
            {

                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/para/"+p+"/0/key",

                    dataType: 'json',

                    async: false,

                    success: function (response) {
                        var arr="";
                        $.each(response, function (index, value) {
                                arr= arr + `<option value="` + value+ `">` + value + `</option>`
                                });
                        let x = Math.floor((Math.random() * 100000) + 1);
                        $('#tablelistex').append(`
                        <div id="b`+x+`">

                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label  >`+p+` </label></div>

                                    <select name="tablelistsex[]" id="ex`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>

                                    <div id=exclistex`+p+` >


                                    </div>

                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove `+p+`</a>

                                </div>

                            </div>
                        <hr/>
                        </div>


                        `);


                    }
                });

            $('#ex'+p).change(function(){
                console.log();
                var c=$(this).attr("id");
                var p=$(this).val();
                if(p!=0)
                {
                console.log(p);
                $.ajax({

                    type: "Get",

                    contentType: 'application/json; charset=utf-8',

                    url: "/para/"+c+"/"+p+"/value",

                    dataType: 'json',

                    async: false,

                    success: function (response) {

                        var arr="";

                            $.each(response, function (index, value) {

                                arr= arr + `<option value="` + value[0]+ `">` + value[1] + `</option>`;
                                });

                        console.log('#exclist'+c);
                        let x = Math.floor((Math.random() * 100000) + 1);

                        $('#exclist'+c).append(`
                        <div id="b`+x+`">
                            <div class="col-md-6">

                                <div class="row form-group">

                                    <div class="col-md-5"><label>`+p+` </label></div>
                                    <select name="tablelistsex`+p+`[]" id="`+p+`ex" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>
                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                    <div id="`+p+`aex" class="div" >
                                        <a href="javascript:void(0)" id="addex`+p+`" >Add `+p+`</a>
                                        <div id="blockex`+p+`" >



                                        </div>
                                    </div>



                                </div>

                            </div>

                        <hr/>
                        </div>


                        `);



                        $('#addex'+p).click(function(){
                        let x = Math.floor((Math.random() * 100000) + 1);
                        var ma=$('#ex'+p).val();
                       console.log('clicked');


                            $('#blockex'+p).append( `<div id="b`+x+`">
                                     <select name="tablelistsex`+p+`[]" id="ex`+p+`" class="tablel" >
                                    <option value='0'>  Select `+p+`  </option>`
                                    + arr+

                                    `</select>

                                    <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                   </div>`);




                    });


                    }
                });
                }
            });

            }

        });


        $('#type').change(function(){
                if($(this).val()==0)
                {
                    $('#taxname').show();
                }
                else{
                    $('#taxname').hide();
                }
        });



        $('#parameter').change(function(){
                var p = $(this).val();
                let x = Math.floor((Math.random() * 100000) + 1);
                $('#para').append(`<div id="b`+x+`"><div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>`+p+` </label></div>
                        <input  type="hidden"  name="constant[]" id="constant" value="`+p+`" />
                        <select name="`+p+`" id="`+p+`">
                        <option value='0'>  Select Option  </option>
                            <option value="ram">In range with amount</option>
                            <option value="rwam">In range with out amount</option>
                            <option value="s">Single Value</option>
                            <option value="m">Multi Value fixed amounts</option>
                            <option value="ma">Multi Value with amount</option>
                        </select>

                        <select name="`+p+`f[]" id="`+p+`f" required>
                        <option value='0'>  Select Option  </option>
                            <option value="g">Greater than (>)</option>
                            <option value="l">Lesser than (<)</option>
                            <option value="ge">Greater than & equal to(>=)</option>
                            <option value="le">Lesser than & equal to (<=)</option>
                            <option value="f">Fixed</option>
                        </select>
                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`v" maxlength="20" name="`+p+`v[]" placeholder="Enter `+p+`" /></div></div>
                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`am" maxlength="20" name="`+p+`am[]" placeholder="Enter `+p+` amount" /></div></div>
                        <div id="rinfo">Use - for range</div>
                        <div id="`+p+`a" class="div" >
                            <a href="javascript:void(0)" id="add`+p+`" >Add `+p+`</a>
                            <div id="block`+p+`" >



                            </div>
                        </div>
                        <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove `+p+`</a>
                    </div>

            </div>
            <hr/>
            </div>


            `);

            $('#'+p+'f').hide();

            $('#'+p+'v').hide();

            $('#'+p+'am').hide();
            $('#rinfo').hide();

            $('#'+p).change(function(){
                       if($(this).val()=="ram" || $(this).val()=="s")
                       {
                           $('#'+p+'v').show();
                           $('#'+p+'f').show();
                           $('#'+p+'am').hide();
                       }
                       else if($(this).val()=="m")
                       {
                           $('#'+p+'v').show();
                           $('#'+p+'am').show();
                           $('#'+p+'f').show();

                       }
                       else if($(this).val()=="ma")
                       {
                           $('#'+p+'v').show();
                           $('#'+p+'am').show();
                           $('#'+p+'f').show();

                       }
                       else if($(this).val()=="rwam")
                       {
                           $('#'+p+'v').show();
                           $('#rinfo').show();
                           $('#'+p+'f').show();

                       }
                   });


            $('#add'+p).click(function(){
                        let x = Math.floor((Math.random() * 100000) + 1);
                        var ma=$('#'+p).val();
                       console.log('clicked');
                       if(ma=="ma")
                       {
                        $('#block'+p).append( `<div id="b`+x+`">
                                       <label>`+p+x+`</label>

                                        <select name="`+p+`f[]" id="`+p+`f" required>
                                        <option value='0'>  Select Option  </option>
                                            <option value="g">Greater than (>)</option>
                                            <option value="l">Lesser than (<)</option>
                                            <option value="ge">Greater than & equal to(>=)</option>
                                            <option value="le">Lesser than & equal to (<=)</option>
                                            <option value="f">Fixed</option>
                                        </select>
                                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`v" maxlength="20" name="`+p+`v[]" placeholder="Enter `+p+`" /></div></div>
                                         <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="`+p+`am" maxlength="20" name="`+p+`am[]" placeholder="Enter `+p+` amount" /></div></div>


                                       <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                   </div>`);
                       }
                       else
                       {
                       $('#block'+p).append( `<div id="b`+x+`">
                                       <label>`+p+x+`</label>

                                        <select name="`+p+`f[]" id="`+p+`f" required>
                                        <option value='0'>  Select Option  </option>
                                            <option value="g">Greater than (>)</option>
                                            <option value="l">Lesser than (<)</option>
                                            <option value="ge">Greater than & equal to(>=)</option>
                                            <option value="le">Lesser than & equal to (<=)</option>
                                            <option value="f">Fixed</option>
                                        </select>
                                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control"  maxlength="20" name="`+p+`v[]" /></div></div>


                                       <a href="javascript:void(0)" id="remove" onclick="RemoveBlock(`+x+`)">Remove</a>
                                   </div>`);
                       }
                   });












        });


        // ------------------------------------------------------




        $("#Category").change(function () {



            var CategoryID = $("#Category").val();



            $.ajax({

                type: "Get",

                contentType: 'application/json; charset=utf-8',

                url: "/DEO/LoadBodyType",

                data: { CategoryID: CategoryID},

                dataType: 'json',

                async: false,

                success: function (response) {



                    //removeOptions(document.getElementById("slabID"));

                    if (response.Status == true) {

                        if (typeof response != 'undefined' && response != null && response != 0) {



                            $('#BodyType').empty();

                            $('#BodyType').append("<option value='0'>--Select BodyType--</option>");

                            $.each(response.Data, function (index, value) {

                                $('<option value="' + value.id + '">' + value.type_of_body + '</option>').appendTo('#BodyType');

                            });



                        }

                        else {



                        }

                    }

                    else {





                    }

                },

                error: function (response) {

                    //alert("Something Went Wrong Please Try Again Letter....!");

                    swal(response.msg);

                }

            });

            });


    });

    function RemoveBlock(x)
                {
                    $('#b'+x).remove();
                }
</script>





    <form action="/tax_val" method="POST" >
        @csrf
        <select name="type" id="type">

            <option value="0">New Tax name</option>
            @php($fees= App\Models\fees::all())

            @foreach($fees as $f)
                 <option value="{{$f->id}}">{{$f->title}}</option>
            @endforeach

        </select>
        <input type="text" name="taxname" id="taxname" placeholder="Enter Tax" />


        <hr/>
        <input type="radio" id="pro_type1" name="pro_type" value="Inc" checked />
        <label for="pro_type1">Included</label><br>
        <input type="radio" id="pro_type2" name="pro_type" value="Ex" />
        <label for="pro_type2">Excluded</label><br>

        <hr/>

        <div class="col-md-6">

            <div class="row form-group">

                <div class="col-md-5"><label>Tables</label></div>

                <select name="table" id="table">


                    <option value='0'>  Select Table  </option>
                    @foreach($table as $f)
                        <option value="{{$f->Tables_in_kiccpk_deo}}">{{$f->Tables_in_kiccpk_deo}}</option>
                    @endforeach

                </select>
                <select name="tabledet" id="tabledet">


                    <option value='0'>  Select Table details </option>

                        <option value="wam">with amount</option>
                        <option value="woam">with out amount</option>
                        <option value="fam">Fixed amount</option>


                </select>
                <div id="fam_div"></div>
            </div>

            </div>
            <div id="tablelist" >

        </div>
        <hr/>


        <!-- <hr/>
        <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Category Of Vehicle</label></div>

                        <select name="Category" id="Category">

                            @php($fees= App\Models\category_of_vehicle::all())
                            <option value='0'>  Select Category  </option>
                            @foreach($fees as $f)
                                <option value="{{$f->id}}">{{$f->category_of_vehicle}}</option>
                            @endforeach

                        </select>
                    </div>

        </div>
        <hr/>
        <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Type Of Body</label></div>

                        <div class="col-md-7"><select class="form-control" id="BodyType" name="BodyType"><option value="none">--Select Body Type--</option></select></div>

                    </div>

        </div>
        <hr/>
        <div class="col-md-6">

            <div class="row form-group">

                <div class="col-md-5"><label>Class Of Vehicle</label></div>

                <select name="Class" id="Class">

                    @php($fees= App\Models\class_of_vehicle::all())
                    <option value='0'>  Select Category  </option>
                    @foreach($fees as $f)
                        <option value="{{$f->id}}">{{$f->class_of_vehicle}}</option>
                    @endforeach

                </select>
            </div>

        </div> -->


        <div class="col-md-6">

            <div class="row form-group">

                <div class="col-md-5"><label>Parameter</label></div>

                <select name="parameter" id="parameter">


                    <option value='0'>  Select Parameter  </option>
                    @foreach($col as $f)
                        <option value="{{$f}}">{{$f}}</option>
                    @endforeach

                </select>
            </div>

            </div>
            <hr/>


        <div id="para">

        </div>

        <!-- <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>laden weight</label></div>

                        <select name="laden" id="laden">
                            <option value='0'>  Select Option  </option>
                            <option value="r">In range</option>
                            <option value="s">Single Value</option>
                            <option value="m">Multi Value</option>
                        </select>

                        <select name="ladenf" id="ladenf">
                            <option value='0'>  Select Option  </option>
                            <option value="g">Greater than (>)</option>
                            <option value="l">Lesser than (<)</option>
                            <option value="ge">Greater than & equal to(>=)</option>
                            <option value="le">Lesser than & equal to (<=)</option>
                            <option value="f">Fixed</option>
                        </select>

                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="ladenv" maxlength="20" name="ladenv" /></div></div>
                        <div id="ladena" class="div">
                            <a href="javascript:void(0)" id="addladen" >Add laden</a>
                            <div id="blockladen" >



                            </div>
                        </div>
                    </div>

        </div>
        <hr/>
        <div class="col-md-6">

                    <div class="row form-group">

                        <div class="col-md-5"><label>Wheel Base </label></div>
                        <select name="wheelbase" id="wheelbase">
                            <option value='0'>  Select Option  </option>
                            <option value="r">In range</option>
                            <option value="s">Single Value</option>
                            <option value="m">Multi Value</option>
                        </select>

                        <select name="wheelbasef" id="wheelbasef">
                            <option value='0'>  Select Option  </option>
                            <option value="g">Greater than (>)</option>
                            <option value="l">Lesser than (<)</option>
                            <option value="ge">Greater than & equal to(>=)</option>
                            <option value="le">Lesser than & equal to (<=)</option>
                            <option value="f">Fixed</option>
                        </select>
                        <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="wheelbasev" maxlength="20" name="wheelbasev" /></div></div>
                        <div id="wheelbasea" class="div">
                            <a href="javascript:void(0)" id="addwheelbase" >Add wheelbase</a>
                            <div id="blockwheelbase" >



                            </div>
                        </div>
                    </div>

        </div> -->
        <!-- <hr/>

        <div class="col-md-6">

            <div class="row form-group">

                <div class="col-md-5"><label>Engine CC </label></div>
                <select name="CC" id="CC">
                    <option value='0'>  Select Option  </option>
                    <option value="r">In range</option>
                    <option value="s">Single Value</option>
                    <option value="m">Multi Value</option>
                </select>

                <select name="CCf" id="CCf">
                    <option value='0'>  Select Option  </option>
                    <option value="g">Greater than (>)</option>
                    <option value="l">Lesser than (<)</option>
                    <option value="ge">Greater than & equal to(>=)</option>
                    <option value="le">Lesser than & equal to (<=)</option>
                    <option value="f">Fixed</option>
                </select>
                <div class="col-md-7 "><div class="input-group"><input type="text" class="form-control" id="CCv" maxlength="20" name="CCv" /></div></div>

                <div id="cca" class="div">
                    <a href="javascript:void(0)" id="addcc" >Add CC</a>
                    <div id="blockcc" >



                    </div>
                </div>

            </div>

        </div> -->
        <div id="exc">
        <div class="col-md-6">

<div class="row form-group">
<h1>Excluded Tables</h1>
    <div class="col-md-5"><label>Tables</label></div>

    <select name="tableex" id="tableex">


        <option value='0'>  Select Table  </option>
        @foreach($table as $f)
            <option value="{{$f->Tables_in_kiccpk_deo}}">{{$f->Tables_in_kiccpk_deo}}</option>
        @endforeach

    </select>

    <div id="fam_divex"></div>
    </div>

    </div>
    <div id="tablelistex" >

    </div>
        </div>
        <input type="submit" value="submit">
    </form>



    <hr>

    <h1>Disable the field by check one</h1>
    <form action="/tax_dis" method="post">
        @csrf
        <div class="col-md-5"><label>On Check the Tax:</label></div>
        <select name="ocheck" id="ocheck">

            <option value="0">New Tax name</option>
            @php($fees= App\Models\fees::all())

            @foreach($fees as $f)
                 <option value="{{$f->id}}">{{$f->title}}</option>
            @endforeach

        </select>

        <div class="col-md-5"><label>This Tax will be disabled:</label></div>
        <select name="dis" id="dis">

            <option value="0">New Tax name</option>
            @php($fees= App\Models\fees::all())

            @foreach($fees as $f)
                 <option value="{{$f->id}}">{{$f->title}}</option>
            @endforeach

        </select>

        <input type="submit" value="Submit"/>


    </form>



</body>

</html>
