<?php

namespace App\Imports;

use App\Models\register;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        // return new register([
        //     'eto_location_id'=> $arr['ETOLocation'] ,
        //     'eto_name_id'=> $arr['ETO'], 
        //     'Jurisdiction_id'=> $arr['DivisionID'], 
        //     'no_assign_type'=> $arr['RegistrationMarkID'], 
        //     'vehicle_price'=> $arr['VehiclePrice'], 
        //     'book_serialNo'=> $arr['RegBookNo'], 
        //     'owner_type_id'=> $arr['OwnerTypeID'], 
        //     'title'=> $arr['OwnerTitle'], 
        //     'name_'=> $name_, 
        //     'ntn_no'=> $ntn_no,
        //     'house_no'=> $arr['HouseNo'], 
        //     'Province_id'=> $arr['ProvinceID'], 
        //     'City_id'=> $arr['CityID'], 
        //     'mobile_no'=> $arr['Mobile'], 
        //     'category_of_vehicle_id'=> $arr['CategoryID'], 
        //     'type_of_body'=> $arr['BodyTypeID'], 
        //     'class_of_vehicle_id'=> $arr['VehicleClassID'], 
        //     'makers_name'=> $arr['ManufacturerID'], 
        //     'year_of_manufacture'=> $arr['YearOfManufacture'], 
        //     'chassis_no'=> $arr['ChassisNo'], 
        //     'engine_no'=> $arr['EngineNo'], 
        //     'number_of_cylinder'=> $arr['NoOfCyliners'], 
        //     'seating_capacity'=> $arr['SeatingCapacity'], 
        //     'engine_capacity'=> $arr['EngineCapacity'], 
        //     'unladen_weight'=> $arr['UnladenWeight'], 
        //     'color_of_vehicle_id'=> $arr['ColorID'], 
        //     'registration_no'=> $arr['RegNo'], 
        //     'remarks'=> $arr['Remarks'],  
        //    'secondregistration_date'=> $arr['SecondRegistrationDate'], 
        //     'registration_date'=> $arr['RegistrationDate'], 
        //     'fuel_type_id'=> $arr['FueltypeID'], 
        //     'trailer_vehicle'=>$tr,
        //     'wheelbox'=> $arr['wheelbox']
        // ]);
    }
}
