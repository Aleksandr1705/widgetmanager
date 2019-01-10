<?php
namespace almosoft\widgetmanager\database\seeds;

use Illuminate\Database\Seeder;

class WidgetLayoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('widgetlayouts')->delete();

        \DB::table('widgetlayouts')->insert([
             [
                'name' => 'Разметка 4_4_4',
                'fname'=>'layout_4_4_4'
            ],
               [
                'name' => 'Разметка 2_5_5',
                'fname'=>'layout_2_5_5'
            ],[
                'name' => 'Разметка 5_5_2',
                'fname'=>'layout_5_5_2'
            ],[
                'name' => 'Разметка 7_5',
                'fname'=>'layout_7_5'
            ],[
                'name' => 'Разметка 5_7',
                'fname'=>'layout_5_7'
            ],[
                'name' => 'Разметка 4_8',
                'fname'=>'layout_4_8'
            ],[
                'name' => 'Разметка 8_4',
                'fname'=>'layout_8_4'
            ],[
                'name' => 'Разметка 6_6',
                'fname'=>'layout_6_6'
            ], 
        ]);
    }
}
