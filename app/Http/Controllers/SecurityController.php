<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SecurityRequest;
use App\Models\Security;
use App\Models\Dategroup;
use App\Models\Currentdate;

class securityController extends Controller {
    public function submit(SecurityRequest $req) {
        checkSec($req);
        return redirect()->route('security-current')->with('success', 'Смена добавлена');
    }

    public function current() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $securityGuys = $currentDate->dategroup->security;

        return view('security', compact('securityGuys'))->with('page', 'current');
     }
}