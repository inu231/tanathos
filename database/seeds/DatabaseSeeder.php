<?php

use Illuminate\Database\Seeder;
//  use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Model::unguard();
        //$this->call(UsersTableSeeder::class);
        //factory(App\UserPhone::class, 50)->create();
        factory(Modules\Admin\Entities\Message::class, 50)->create();


        /*DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'adm@jtsoft.com.br',
            'password' => Hash::make('123457'),
        ]);*/

        //Model::reguard();
    }
}
