<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;

// use Illuminate\Support\Facades\DB;


class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $seasons = ['春', '夏', '秋', '冬'];

        // foreach ($seasons as $season) {
            // Season::create(['name' => $season]);
            // Season::insert([
            //     ['id' => 1, 'name' => '春'],
            //     ['id' => 2, 'name' => '夏'],
            //     ['id' => 3, 'name' => '秋'],
            //     ['id' => 4, 'name' => '冬'],
            // ]);


    //     // 外部キー制約を一時的に無効に
    // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // // テーブルを空にする（IDリセット）
    // Season::truncate();

    // // 外部キー制約を元に戻す
    // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // データを挿入
    Season::insert([
        ['id' => 1, 'name' => '春'],
        ['id' => 2, 'name' => '夏'],
        ['id' => 3, 'name' => '秋'],
        ['id' => 4, 'name' => '冬'],
    ]);

    }
}
