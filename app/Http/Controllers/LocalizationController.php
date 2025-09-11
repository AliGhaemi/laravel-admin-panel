<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $lang)
    {
        if (!in_array($lang, ['en', 'tr'])) {
            abort(400);
        }
        session(['locale' => $lang]);
        return redirect()->back();
    }
}
