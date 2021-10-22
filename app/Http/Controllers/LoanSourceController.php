<?php

namespace App\Http\Controllers;

use App\Models\LoanSource;
use Illuminate\View\View;

class LoanSourceController extends Controller
{
    /**
     * @param $state
     * @return View
     */
    public function cities($state): View
    {
        $cities = LoanSource::getCities($state)
            ->get();

        abort_if($cities->isEmpty(), 404);

        return view('city', compact('cities'));
    }

    /**
     * @param $state
     * @param $city
     * @return View
     */
    public function companies($state, $city): View
    {
        $companies = LoanSource::getCompanies($state, $city)
            ->get();

        abort_if($companies->isEmpty(), 404);

        return view('company', compact('companies'));
    }
}
