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
        $in = Incomevisitor::where('out_time', '=', null)->get();

        $showVisitorArr = [];
        foreach($in as $arr) {
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

        $id =  $addIncVisitor->id;

        return redirect()->route('visitor-print', $id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    public function print($id) {
        $printData = Incomevisitor::where('id', '=', $id)->first();

        $printDataArr = [
            'id' => $id,
            'visitor' => $printData->visitor->name . ' ' . $printData->visitor->surname,
            'firm' => $printData->visitor->firm->name,
            'employee' => $printData->employee->name,
            'date' => $printData->currentdate->currentdate,
            'time' => $printData->in_time,
            'security' => $printData->security->name
        ];

        return view('includes/visitor/reportBlank', compact('printDataArr'));
    }

    public function exit(Request $request) {
        $exitPeople = Incomevisitor::where('id', '=', $request->id)->first();

        if($request->out_time !== null) {
            $exitPeople->out_time = $request->out_time;
        } else {
            $exitPeople->out_time = date("H:i:s");
        }
        
        $exitPeople->save();
        return redirect()->route('visitor-index');
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

    public function autoinsert(Request $request) {
        if($request->key == "id") {
            $resp =  Visitor::with('firm')
            ->where('id', '=', $request->data)
            ->first();
        } elseif($request->key == "surname") {
            $resp =  Visitor::where('surname', 'LIKE', $request->data . '%')->get();
        } 

        return $resp;
    }
}
