<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        DB::table('items')->insert([
            [
                'id' => '1',
                'name' => 'テスト屋',
                'name2' => 'テストヤ',
                'category_id' => '1',
                'review' => '1',
                'comment' => 'これはテストです。',
                'callNumber' => '000-0000-0000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,
            ],
            [
                'id' => '2',
                'name' => 'テストリア',
                'name2' => 'テストリア',
                'category_id' => '2',
                'review' => '2',
                'comment' => 'これもテストです。',
                'callNumber' => '111-11111-11111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,
            ],
            [
                'id' => '3',
                'name' => 'テストレストラン',
                'name2' => 'テストレストラン',
                'category_id' => '3',
                'review' => '3',
                'comment' => 'これこそテストです。',
                'callNumber' => '222-2222-2222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,
            ]
        ]);
    }
}
