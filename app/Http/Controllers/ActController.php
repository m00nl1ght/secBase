<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Checkbox;
use App\Models\Employee;
use App\Models\Firm;
use App\Models\Visitor;

use Illuminate\Http\Request;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $checkboxArr = Checkbox::all();

        $main = [];
        foreach($checkboxArr as $arr) {
            if($arr->category == 'head') {
                $id = $arr->id;
                $name = $arr->description;

                foreach($checkboxArr as $arr) {
                    if($id == $arr->parent_id && $arr->category == 'main') {
                        $main[$name][$arr->name] = $arr->description;
                    }
                }
            }
        }

        $sub = [];
        foreach($checkboxArr as $arr) {
            if($arr->category == 'head') {
                $id = $arr->id;
                $name = $arr->description;

                foreach($checkboxArr as $arr) {
                    if($id == $arr->parent_id && $arr->category == 'sub') {
                        $sub[$name][$arr->name] = $arr->description;
                    }
                }
            }
        }

        return view('includes/act/main', compact(['main', 'sub']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $act = new Act;
        $act->place = $request->place;
        $act->description = $request->description;
        $act->instrument = $request->instrument;
        $act->from_time = $request->timeFrom;
        $act->till_time = $request->timeTill;
        $act->from_date = $request->dateFrom;
        $act->till_date = $request->dateTill;

        if(isset($request->weekend)){
            $act->weekend = true;
        } else {
            $act->weekend = false;
        }

        //employee;
        $addEmployee = Employee::where([
            ['name', '=', $request->nameEmployee], 
            ['surname', '=', $request->surnameEmployee],
        ])->first();

        if($addEmployee === null) {
            $addEmployee = new Employee;
            $addEmployee->name = $request->nameEmployee;
            $addEmployee->surname = $request->surnameEmployee;
            $addEmployee->patronymic = $request->patronymicEmployee;
            $addEmployee->save();
        }

        //contractor;
        $addVisitor = Visitor::where([
            ['name', '=', $request->nameContractor], 
            ['surname', '=', $request->surnameContractor],
        ])->first();
 
        if ($addVisitor === null) {
            $addVisitor = new Visitor;
            $addVisitor->name = $request->nameContractor;
            $addVisitor->surname = $request->surnameContractor;
            $addVisitor->patronymic = $request->patronymicContractor;
            $addVisitor->save();
        }

        //firm
        $addFirm = Firm::where('name', '=', $request->firm)->first();

        if($addFirm === null) {
            $addFirm = new Firm;
            $addFirm->name = $request->firm;
            $addFirm->save();
        }
        $addFirm->visitor()->save($addVisitor);

        $act->save();
        $addEmployee->act()->save($act);
        $addVisitor->act()->save($act);

        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Act  $act
     * @return \Illuminate\Http\Response
     */
    public function show(Act $act)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Act  $act
     * @return \Illuminate\Http\Response
     */
    public function edit(Act $act)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Act  $act
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Act $act)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Act  $act
     * @return \Illuminate\Http\Response
     */
    public function destroy(Act $act) {
        //
    }

    public function printAct($id) {
        //
    }
}
