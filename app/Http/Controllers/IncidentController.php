<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Currentdate;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $showIncidentArr = [];

        if($currentDate->incident !== null) {
            foreach($currentDate->incident as $arr) {
                $showIncidentArr[] = [
                    'id' => $arr->id,
                    'description' => $arr->description,
                    'action' => $arr->action,
                    'time' => $arr->in_time
                ];
            }
        }
        return view('incident', compact('showIncidentArr'))->with('page', 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('incident')->with('page', 'new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $addIncIncident = new Incident;
        $addIncIncident->in_time = date("H:i:s");
        $addIncIncident->description = $request->description;
        $addIncIncident->action = $request->action;
        $currentdate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $currentdate->incomecar()->save($addIncIncident);

        return redirect()->route('incident-index')->with('success', 'Происшествие зарегистрировано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $incident = Incident::where('id', $id)->first();

        return view('incident', compact('incident'))->with('page', 'show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Incident::where('id', $id)->
        update([
            'description' => $request->description,
            'action' => $request->action,
            'in_time' => $request->in_time
        ]);

        return redirect()->route('incident-index')->with('success', 'Данные изменены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Incident::where('id', $id)->delete();

        return redirect()->route('incident-index')->with('success', 'Данные удалены!!');
    }
}
