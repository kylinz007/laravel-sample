<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 生成测试假数据
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
        $user = User::find(1);
        $user->name = 'kylinzz007';
        $user->email = 'kylinzz007@gmail.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}
