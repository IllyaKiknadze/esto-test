<?php

use App\Models\TransactionTypes;
use Illuminate\Database\Seeder;

class TransactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionTypes::insert([
            ['title' => 'debit'],
            ['title' => 'credit']
        ]);
    }
}
