<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $keys = [
            'name',
            'guard_name',
            'created_at',
            'updated_at',

        ];
        $values = [
            ['admin-dashboard', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['admin-setting', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['admin-chkPassword', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['update-pwd', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['users.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['users.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['users.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['users.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],

            /**Roles Controller*/


            ['roles.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['roles.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['roles.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['roles.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],

            /**Categories Controller*/


            ['categories.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['categories.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['categories.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['categories.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],

            /**Product Controller*/


            ['products.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['products.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['products.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['products.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],

            /**Fabrics Controller*/

            ['fabrics.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['fabrics.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['fabrics.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['fabrics.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],


            /**DesignOption Controller*/

            ['design_options.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['design_options.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['design_options.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['design_options.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],


            /**GarmentsOption Controller*/

            ['garment_options.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['garment_options.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['garment_options.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['garment_options.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],


            /**Measurement Controller*/

            ['measurements.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['measurements.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['measurements.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['measurements.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],


            /**LiningColour Controller*/

            ['lining_colour.index', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['lining_colour.create', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['lining_colour.edit', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],
            ['lining_colour.delete', 'web', '2018-04-19 06:04:42', '2018-04-19 06:04:42'],


        ];
        $insert_array = [];
        foreach ($values as $value) {
            $insert_array[] = array_combine($keys, $value);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Spatie\Permission\Models\Permission::query()->truncate();
        //   print_r($insert_array);exit;
        DB::table('permissions')->insert($insert_array);
        //  \App\Http\Models\Permission::create($insert_array);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
