<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        DB::table(str_replace("=","",base64_encode('users')))->insert(
            [
                'name'=>'haku',
                'email'=>'haku@gmail.com',
                'password'=>password_hash('haku123',PASSWORD_BCRYPT),
                'subscription'=>1,
                'created_at'=>$time->format('Y-m-d H:i:s')
            ]
        );
    }
}
