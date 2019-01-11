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
                'name' => 'Layout 4_4_4',
                'fname'=>'layout_4_4_4'
            ],
               [
                'name' => 'Layout 2_5_5',
                'fname'=>'layout_2_5_5'
            ],[
                'name' => 'Layout 5_5_2',
                'fname'=>'layout_5_5_2'
            ],[
                'name' => 'Layout 7_5',
                'fname'=>'layout_7_5'
            ],[
                'name' => 'Layout 5_7',
                'fname'=>'layout_5_7'
            ],[
                'name' => 'Layout 4_8',
                'fname'=>'layout_4_8'
            ],[
                'name' => 'Layout 8_4',
                'fname'=>'layout_8_4'
            ],[
                'name' => 'Layout 6_6',
                'fname'=>'layout_6_6'
            ], 
        ]);
        \DB::table('widgetboards')->delete();
        \DB::table('widgetboards')->insert([
            [
                'name'=>'System dashboard',
                'widgetlayout_id'=>1
            ]
        ]);
    }
}
