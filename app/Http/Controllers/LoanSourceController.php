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
    public function decatur($state): View
    {
        $loanSources = LoanSource::where('state', $state)
            ->get();

        abort_if($loanSources->isEmpty(), 404);

        return view('decatur', compact('loanSources'));
    }
}
