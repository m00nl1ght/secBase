<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Currentdate;
use App\Models\Employee;
use App\Models\Firm;
use App\Models\Incomecar;
use App\Models\Security;
use App\Models\Visitor;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $carArr = $currentDate->incomecar;

        $showCarArr = [];
        foreach($carArr as $arr) {
            $showCarArr[] = [
                'id' => $arr->id,
                'surname' => $arr->visitor->surname,
                'name' => $arr->visitor->name,
                'car_number' => $arr->visitor->car->number,
                'time' => $arr->in_time,
                'phone' => $arr->visitor->phone
            ];
        }

        return view('car', compact('showCarArr'))->with('page', 'index');
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
        $addIncCar = new Incomecar;
        $addIncCar->in_time = date("H:i:s");
        $currentdate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $currentdate->incomecar()->save($addIncCar);

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

            //car
            $addCar = Car::where('number', '=', $request->visitor_carNumber)->first();

            if($addCar === null){
                $addCar = new Car;
                $addCar->number = $request->visitor_carNumber;
                $addCar->model = $request->visitor_carModel;
                $addCar->save();
            }
            $addCar->visitor()->save($addVisitor);

            //firm
            $addFirm = Firm::where('name', '=', $request->visitor_firm)->first();

            if($addFirm === null) {
                $addFirm = new Employee;
                $addFirm->name = $request->visitor_firm;
                $addFirm->save();
            }
            $addFirm->visitor()->save($addVisitor);
        }
  
        else if ($addVisitor->car === null) {
            $addCar = Car::where('number', '=', $request->visitor_carNumber)->first();

            if($addCar === null){
                $addCar = new Car;
                $addCar->number = $request->visitor_carNumber;
                $addCar->model = $request->visitor_carModel;
                $addCar->save();
            }
            $addCar->visitor()->save($addVisitor);
        }
        $addVisitor->incomecar()->save($addIncCar);

        //employee
        $addEmployee = Employee::where('name', '=', $request->visitor_employee)->first();

        if($addEmployee === null) {
            $addEmployee = new Employee;
            $addEmployee->name = $request->visitor_employee;
            $addEmployee->save();
        }
        $addEmployee->incomecar()->save($addIncCar);

        //security
        $securityWriter = Currentdate::where('currentdate', date('Y-m-d'))->first()->dategroup->security->where('category', '=', 'writer')->first();
        $securityWriter->incomevisitor()->save($addIncCar);
    
        $printDataArr = [
            'id' => $addIncCar->id,
            'car_number' => $addVisitor->car->model . ' ' . $addVisitor->car->number,
            'visitor' => $addVisitor->name . ' ' . $addVisitor->surname,
            'firm' => $addVisitor->firm->name,
            'employee' => $addEmployee->name,
            'date' => $currentdate->currentdate,
            'time' => $addIncCar->in_time,
            'security' => $securityWriter->name
        ];
        return view('includes/car/reportBlank', compact('printDataArr'))->with('page', 'car');
        // return redirect()->route('car-index')->with('success', 'Авто добавлено');
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
