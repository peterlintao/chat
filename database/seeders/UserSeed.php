<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::find(1)->update([
            'name' => 'Lucy',
            'email' => 'lucy@qq.com',
            'avatar' => url('fakers/avatars/face1.jpg'),
            'introduction' => '宝剑锋自磨砺出',
        ]);
        User::find(2)->update([
            'name' => 'Lili',
            'email' => 'lili@qq.com',
            'avatar' => url('fakers/avatars/face16.jpg'),
            'introduction' => '梅花香自苦寒来',
        ]);
        User::find(3)->update([
            'name' => 'Rose',
            'email' => 'rose@qq.com',
            'avatar' => url('fakers/avatars/face7.jpg'),
            'introduction' => '如要你知道自已想去哪里，全世界都会为你让路',
        ]);
    }
}
