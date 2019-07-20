<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDateRequest;
use Carbon\Carbon;

class DateController extends Controller
{
    public function create()
    {
        session()->forget('full_date');
        return view('input');
    }

    public function store(StoreDateRequest $request)
    {
        $fullDate = Carbon::create($request->year, $request->month, $request->day);
        session()->put('full_date', $fullDate);
        return redirect()->route('complete');
    }

    public function complete()
    {
        $fullDate = session()->get('full_date');
        return view('complete', compact('fullDate'));
    }
}
