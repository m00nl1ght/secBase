<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Currentdate;

class IncomeCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        
        if($currentDate == null){
            $currentDate = new Currentdate;
            $currentDate->currentdate = date('Y-m-d');
            $currentDate->save();
        }

        $showCardArr = [];

        foreach($currentDate->incomecard as $arr) {
   
            $showCardArr[] = [
                'id' => $arr->id,
                'card_number' => $arr->card['number'],
                'time' => $arr->in_time,
                'employee' => $arr->employee->first()->name
            ];
        }

        return view('card', compact('showCardArr'))->with('page', 'income-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
