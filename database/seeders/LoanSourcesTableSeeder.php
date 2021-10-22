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
        // 4 dummy data
        $loanSources = [
            ['company' => 'Advance America', 'state_code' => 'AL', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '904 Mcmeans Avenue', 'phone' => '251-937-5687', 'city' => 'Bay Minette'],
            ['company' => 'Check Cashing Center', 'state_code' => 'AL', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '715 Dolive Street', 'phone' => '251-937-8807', 'city' => 'Bay Minette'],
            ['company' => 'CHECK INTO CASH', 'state_code' => 'AL', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '2610 Brentwood Dr', 'phone' => '251-937-2069', 'city' => 'Bay Minette'],
            ['company' => 'THE MONEY STORE', 'state_code' => 'AL', 'state_name' => 'Alabama', 'zipcode' => '36507', 'address' => '201 N Fletcher Dr', 'phone' => '251-580-2426', 'city' => 'Bay Minette'],
        ];

        collect($loanSources)
            ->each(function ($loanSource) {
                LoanSource::create($loanSource);
            });
    }
}
