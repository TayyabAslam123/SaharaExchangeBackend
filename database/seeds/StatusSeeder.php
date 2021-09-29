<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

       Status::where('id','>',1)->delete();

        $data=[
         'active',
         'inactive'
     ];


    foreach($data as $value){
        $var=new Status;
        $var->status=$value;
        $var->save();
   }
        

    }
}
