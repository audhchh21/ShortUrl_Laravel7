<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShorturlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Short Url
        DB::table('shorturls')
        ->insert([
            [
                'shortUserID' => null,
                'shortCode' => Str::random(5),
                'shortLink' => '',
                'shortPwd' => null,
                'shortClick' => 0,
            ],
            [
                'shortUserID' => null,
                'shortCode' => Str::random(5),
                'shortLink' => '',
                'shortPwd' => null,
                'shortClick' => 0,
            ],
            [
                'shortUserID' => null,
                'shortCode' => Str::random(5),
                'shortLink' => '',
                'shortPwd' => null,
                'shortClick' => 0,
            ],
            [
                'shortUserID' => null,
                'shortCode' => Str::random(5),
                'shortLink' => '',
                'shortPwd' => null,
                'shortClick' => 0,
            ],
            [
                'shortUserID' => null,
                'shortCode' => Str::random(5),
                'shortLink' => '',
                'shortPwd' => null,
                'shortClick' => 0,
            ],
        ]);
    }
}
