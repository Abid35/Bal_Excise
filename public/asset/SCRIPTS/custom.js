
   
   function validate_field()
   {
   
   var check = true;






        if (Division == 0) {

            $('#Division').addClass('error');

            check = false;

        }    //edit by



        if (OwnerTypeID == 0) {

            $('#OwnerTypeID').addClass('error');

            check = false;

        }



        if (OwnerTypeID == 1) {



            if (oldCNIC == "" && newCnic == "") {



                if (NewCnic == "") {

                    $('#newCnic').addClass('error');

                    check = false;

                } //edit by

                if (oldCNIC == "") {

                    $('#oldCnic').addClass('error');

                    check = false;

                } //edit by

            }

            if (guardianName == "") {

                $('#guardianName').addClass('error');

                check = false;

            } //edit by



        }



        if (OwnerTypeID == 4) {



            if (NewCnic == "") {

                $('#newCnic').addClass('error');

                check = false;

            }



        }





        if (OwnerTypeID == 3) {



            if (oldCNIC == "" && newCnic == "") {



                if (NewCnic == "") {

                    $('#newCnic').addClass('error');

                    check = false;

                } //edit by

                if (oldCNIC == "") {

                    $('#oldCnic').addClass('error');

                    check = false;

                } //edit by

            }

            if (guardianName == "") {

                $('#guardianName').addClass('error');

                check = false;

            } //edit by



        }             //edit by



        if (OwnerTitle == 0) {

           $('#OwnerTitle').addClass('error');

           check = false;

        }

        if (OwnerName == "" || ownerName == null) {

            $('#OwnerName').addClass('error');

            check = false;

        }       //edit by

        if (RegistrationMarkID == 0) {

            $('#RegistrationMarkID').addClass('error');

            check = false;

        }             //edit by

        if (regNo == "" || regNo == null) {

            $('#regNo').addClass('error');

            check = false;

        }



        if (Province == 0) {

            $('#Province').addClass('error');

            check = false;

        } //edit by



        if (City == null || City == "") {

            $('#City').addClass('error');

            check = false;

        } //edit by

        if (mobile == "" || mobile == null) {

            $('#mobile').addClass('error');

            check = false;

        }//edit by

        if (Category == 0) {

            $('#Category').addClass('error');

            check = false;

        }//edit by

        if (VehicleClass == 0) {

            $('#VehicleClass').addClass('error');

            check = false;

        }//edit by

        if (BodyType == 0) {

            $('#BodyType').addClass('error');

            check = false;

        }//edit by

        if (Manufacturer == 0) {

            $('#Manufacturer').addClass('error');

            check = false;

        }//edit by

        if (CC == 0) {

            $('#CC').addClass('error');

            check = false;

        } //edit by

        if (engineNo == "" || engineNo == null) {

           $('#engineNo').addClass('error');

           check = false;

        } //edit by

        if (chassisNo == "" || chassisNo == null) {

            $('#chassisNo').addClass('error');

            check = false;

        } //edit by

        if (seatingCapacity == "" || seatingCapacity == null) {

            $('#seatingCapacity').addClass('error');

            check = false;

        } //edit by

        if (EngineCapacity == "" || EngineCapacity == null) {

            $('#EngineCapacity').addClass('error');

            check = false;

        } //edit by

        if (maxLadenWeight == "" || maxLadenWeight == null) {

           $('#maxLadenWeight').addClass('error');

           check = false;

        } //edit by

        if (Color == 0) {

            $('#Color').addClass('error');

            check = false;

        } //edit by

        if (VehiclePrice == "" || VehiclePrice == null) {

            $('#VehiclePrice').addClass('error');

            check = false;

        } //edit by





        if (Years == null || Years == "") {

           $('#Years').addClass('error');

           check = false;

        }



        if (BodyType == null || BodyType == "") {

           $('#BodyType').addClass('error');

           check = false;

        }

        if (CC == null || CC == "") {

           $('#CC').addClass('error');

           check = false;

        }

        if (engineNo == "") {

           $('#engineNo').addClass('error');

           check = false;

        }

        if (chassisNo == "") {

           $('#chassisNo').addClass('error');

           check = false;

        }

        if (VehicleClass == null || VehicleClass == "") {

           $('#VehicleClass').addClass('error');

           check = false;

        }

        if (regNo == "") {

           $('#regNo').addClass('error');

           check = false;

        }

        if (isSpecialNo == "" || isSpecialNo == null) {

           $("#NumberType").css("display", "block");

           $("#NumberType").html("Select the number type");

           check = false;

        }

        if (isTrailerVeh == "" || isTrailerVeh == null) {

           $("#TrailerType").css("display", "block");

           $("#TrailerType").html("Select the trailer type")

           check = false;

        }

        if (IsTrailerVeh == 1) {





           if (TrailerBodyType == "" || TrailerBodyType == null) {

               $('#TrailerBodyType').addClass('error');

               check = false;

           }

           if (frontAxle == "" || frontAxle == null) {

               $('#frontAxle').addClass('error');

               check = false;

           }

           if (rearAxle == "" || rearAxle == null) {

               $('#rearAxle').addClass('error');

               check = false;

           }

           if (otherAxle == "" || otherAxle == null) {

               $('#otherAxle').addClass('error');

               check = false;

           }

           if (check == false) {

               return false

           }



        }

        if (Role == null || Role == "") {

           $('#Role').addClass('error');

           check = false;

        }

        if (Name == null || Role == "") {

           $('#Name').addClass('error');

           check = false;

        }

        if (inspectionDate == "") {

           $('#inspectionDate').addClass('error');

           check = false;

        }

        if (remarks == "") {

           $('#remarks').addClass('error');

           check = false;

        }

        if (verificationNo == "") {

           $('#verificationNo').addClass('error');

           check = false;

        }

        if (verificationDate == "") {

           $('#verificationDate').addClass('error');

           check = false;

        }

        if (isTribleVeh == "" || isTribleVeh == null) {

           $("#TribleType").css("display", "block");

           $("#TribleType").html("Select the trailer type");

           check = false;

        }
    }