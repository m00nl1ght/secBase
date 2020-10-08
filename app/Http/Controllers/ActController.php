<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Approve;
use App\Models\Checkbox;
use App\Models\Employee;
use App\Models\Firm;
use App\Models\Visitor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $acts = Act::where('status', 'new')->get();
        $approve = [];

        foreach($acts as $act) {          
            foreach($act->approve as $arr){         
                foreach($arr->user->roles as $array) {
                    if($array->slug == 'sto'){
                        $approve[$act->id][$array->slug] = $arr->approval;
                    } elseif($array->slug == 'sd') {
                        $approve[$act->id][$array->slug] = $arr->approval;
                    } elseif($array->slug == 'cc') {
                        $approve[$act->id][$array->slug] = $arr->approval;
                    }
                }
    
                if(!array_key_exists('sto', $approve[$act->id])){
                    $approve[$act->id]['sto'] = 'n/a';
                }
                if(!array_key_exists('sd', $approve[$act->id])){
                    $approve[$act->id]['sd'] = 'n/a';
                }
                if(!array_key_exists('cc', $approve[$act->id])){
                    $approve[$act->id]['cc'] = 'n/a';
                }   
            }
        }

        return view('includes/act/main', compact(['acts', 'approve']))->with('page', 'index');;
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
                $name = $arr->name;

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
                $name = $arr->name;

                foreach($checkboxArr as $arr) {
                    if($id == $arr->parent_id && $arr->category == 'sub') {
                        $sub[$name][$arr->name] = $arr->description;
                    }
                }
            }
        }

        return view('includes/act/main', compact(['main', 'sub', 'checkboxArr']))->with('page', 'new');
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
        $act->status = 'new';
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

        //сохраняем выбранные чекбоксы
        $checkbox = Checkbox::select('id','name')->get();
        
        foreach($checkbox as $array) {
            if($request->has($array->name)){
                $array->act()->save($act);
            }
            
        }

        //сохраняем таблицу согласования
        $approve = new Approve;
        $approve->user_id = Auth::id();
        $approve->act_id = $act->id;
        $approve->approval = 'owner';
        $approve->save();
        
        return redirect()->route('act-index');
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
    public function update(Request $request, $id) {
        $act = Act::where('id', $id)->first();   
        $currentApprove = $act->approve->where('user_id', '=', Auth::user()->id)->first();
    
        if($currentApprove == null) {
            $currentApprove = new Approve;
            $currentApprove->user_id = Auth::id();
            $currentApprove->act_id = $id;
            $currentApprove->approval = $request->approve;
            $currentApprove->save();
        } else {
            $currentApprove->approval = $request->approve;
            $currentApprove->update();
        }

        //проверка конечного статуса
        $checkStatus = function($approve) {
            $status = [
                'sto' => false,
                'cc' => false,
                'sd' => false
            ];

            foreach($approve as $arr) {
                if($arr->approval == 'approve' || $arr->approval == 'owner') {
                    foreach($arr->user->roles as $roles) {
                        if($roles->slug == 'sto' || $roles->slug == 'cc' || $roles->slug == 'sd') {
                            $status[$roles->slug] = true;
                        }
                    }
                }
            }
            return $status;
        };
      
        $approve = Act::where('id', $id)->first()->approve; 
        $checkStatusArr = $checkStatus($approve);

        if($checkStatusArr['sto'] && $checkStatusArr['cc'] && $checkStatusArr['sd']) {
            $act->status = 'approval';
            $act->update();
        }

        return redirect()->route('act-index');
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

    public function print($id) {
        $printData = Act::where('id', '=', $id)->first();
        $countDays = (strtotime($printData->till_date)  - strtotime($printData->from_date))/(60*60*24);

        return view('includes/act/print', compact(['printData', 'countDays']));
    }

    public function approval() {
        $acts = Act::where('status', '=', 'approval')->get();

        return view('includes/act/main', compact('acts'))->with('page', 'approval');

    }
}
