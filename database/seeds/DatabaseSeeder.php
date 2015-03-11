<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('SettingsTableSeeder');
    }
}
