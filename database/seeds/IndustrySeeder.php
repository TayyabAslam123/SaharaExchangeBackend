<?php

use Illuminate\Database\Seeder;
use App\Industry;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::where('id','>',1)->delete();    
    
        $data=[
            'Art',
            'Bank',
            'Education',
            'Fashion',
            'Finance',
            'Goods',
            'Home',
            'Investment',
            'Internet',
            'Marketing',
            'Medical',
            'Retail',
            'Software',
            'Sales',
            'Trade',
            'Textile',
            'Technology',
            'Transport',

        ];

        foreach($data as $value){
            $var=new Industry;
            $var->name=$value;
            $var->save();
        }
    }
}
