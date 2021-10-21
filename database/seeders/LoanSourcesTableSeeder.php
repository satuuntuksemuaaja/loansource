<?php

namespace Database\Seeders;

use App\Models\LoanSource;
use Illuminate\Database\Seeder;

class LoanSourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loanSources = [
            ['name' => 'Advance America', 'state' => 'al', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '904 Mcmeans Avenue Bay Minette AL', 'phone' => '251-937-5687'],
            ['name' => 'ADVANCE AMERICA', 'state' => 'al', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '904 Mcmeans Ave Bay Minette AL', 'phone' => '251-937-5687'],
            ['name' => 'Check Cashing Center', 'state' => 'al', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '715 Dolive Street Bay Minette AL', 'phone' => '251-937-8807'],
            ['name' => 'CHECK INTO CASH', 'state' => 'al', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '2610 Brentwood Dr Bay Minette AL', 'phone' => '251-937-2069'],
            ['name' => 'THE MONEY STORE', 'state' => 'al', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '201 N Fletcher Dr Bay Minette AL', 'phone' => '251-580-2426'],
        ];

        collect($loanSources)
            ->each(function ($loanSource) {
                LoanSource::create($loanSource);
            });
    }
}
