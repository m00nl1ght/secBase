<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Currentdate;
use App\Models\Dategroup;
use App\Models\Employee;
use App\Models\Firm;
use App\Models\Incomevisitor;
use App\Models\Security;
use App\Models\Visitor;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $visitorArr = $currentDate->incomevisitor;
        $showVisitorArr = [];
        foreach($visitorArr as $arr) {
            $showVisitorArr[] = [
                'id' => $arr->id,
                'surname' => $arr->visitor->surname,
                'name' => $arr->visitor->name,
                'time' => $arr->in_time,
                'phone' => $arr->visitor->phone
            ];
        }
        return view('visitor', compact('showVisitorArr'))->with('page', 'index');
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
    public function store(Request $request) {
        $addIncVisitor = new Incomevisitor;
        $addIncVisitor->in_time = date("H:i:s");
        $currentdate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $currentdate->incomevisitor()->save($addIncVisitor);

        //visitor
        $addVisitor = Visitor::where([
            ['name', '=', $request->visitor_name], 
            ['surname', '=', $request->visitor_surname],
        ])->first();

        if ($addVisitor === null) {
            $addVisitor = new Visitor;
            $addVisitor->name = $request->visitor_name;
            $addVisitor->surname = $request->visitor_surname;
            $addVisitor->patronymic = $request->visitor_patronymic;
            $addVisitor->phone = $request->visitor_phone;
            $addVisitor->save();
        }
        $addVisitor->incomevisitor()->save($addIncVisitor);

        //firm
        $addFirm = Firm::where('name', '=', $request->visitor_firm)->first();

        if($addFirm === null) {
            $addFirm = new Firm;
            $addFirm->name = $request->visitor_firm;
            $addFirm->save();
        }

        $addFirm->visitor()->save($addVisitor);

        //employee
        $addEmployee = Employee::where('name', '=', $request->visitor_employee)->first();

        if($addEmployee === null) {
            $addEmployee = new Employee;
            $addEmployee->name = $request->visitor_employee;
            $addEmployee->save();
        }
        $addEmployee->incomevisitor()->save($addIncVisitor);

        //security
        $securityWriter = Currentdate::where('currentdate', date('Y-m-d'))->first()->dategroup->security->where('category', '=', 'writer')->first();
        $securityWriter->incomevisitor()->save($addIncVisitor);

        $printDataArr = [
            'id' => $addIncVisitor->id,
            'visitor' => $addVisitor->name . ' ' . $addVisitor->surname,
            'firm' => $addFirm->name,
            'employee' => $addEmployee->name,
            'date' => $currentdate->currentdate,
            'time' => $addIncVisitor->in_time,
            'security' => $securityWriter->name
        ];
        // return redirect()->route('visitor-index')->with('success', 'Посетитель добавлен');
        return view('includes/visitor/reportBlank', compact('printDataArr'))->with('page', 'visitor');
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
