<?php

use Illuminate\Database\Seeder;
use App\Monetization;

class MonetizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Monetization::where('id','>',1)->delete();    
    
        $data=[
            ['name'=>'Affiliate','is_featured'=>1],
            ['name'=>'Amazon FBA','is_featured'=>1],
            ['name'=>'Amazon FBM','is_featured'=>1],
            ['name'=>'Amazon KDP','is_featured'=>1],
            ['name'=>'Application','is_featured'=>1],
            ['name'=>'Digital Product','is_featured'=>1],
            ['name'=>'Display Advertising','is_featured'=>1],
            ['name'=>'Dropshiping','is_featured'=>1],
            ['name'=>'eCommerce','is_featured'=>0],
            ['name'=>'SaaS','is_featured'=>0],
            ['name'=>'Subscription','is_featured'=>0],
            ['name'=>'Service','is_featured'=>0],
            ['name'=>'Info Product','is_featured'=>0],
            ['name'=>'Other','is_featured'=>0],

        ];


        foreach($data as $key=>$value){
      
            $var=new Monetization;
            $var->name=$value['name'];
            $var->is_featured=$value['is_featured'];
            $var->save();

        }




    }
}
