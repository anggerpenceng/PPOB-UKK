<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TableRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama_role' => 'admin',
            'created_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'nama_role' => 'pelanggan',
            'created_at' => Carbon::now(),
        ]);
    }
}
