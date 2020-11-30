<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Security;
use App\Models\Currentdate;
use App\Models\Card;
use App\Models\Cardcategory;
use App\Models\Employee;
use App\Models\Incomecard;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cards = Card::with('cardcategory')->get();

        return view('card', compact('cards'))->with('page', 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $card_category = Cardcategory::get();

        return view('card', compact('card_category'))->with('page', 'create');
    }

    public function createEmployee() {
        $cards = Cardcategory::where('name', 'employee')->first()->card->where('status', false);

        return view('card', compact('cards'))->with('page', 'create-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $checkCard = Card::where('number', $request->card_number)->first();

        if ($checkCard) {
            return redirect()->route('card-create')->with('warning_message', 'Карта под номером ' . $request->card_number . ' уже существует');
        }

        $newCard = new Card;
        $newCard->number = $request->card_number;
        $newCard->status = false;
        $newCard->cardcategory_id = $request->card_category;
        $newCard->save();

        return redirect()->route('card-create')->with('success', 'Карта добавлена');
    }

    public function storeEmployee(Request $request) {
        $addIncCard = new Incomecard;
        $addIncCard->in_time = date("H:i:s");
        $currentdate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $currentdate->incomecard()->save($addIncCard);

        //employee
        $addEmployee = Employee::where('surname', '=', $request->employee_surname)->first();

        if($addEmployee === null) {
            $addEmployee = new Employee;
            $addEmployee->name = $request->employee_name;
            $addEmployee->surname = $request->employee_surname;
            $addEmployee->patronymic = $request->employee_patronymic;
            $addEmployee->position = $request->employee_position;
            $addEmployee->save();
        }

        $addEmployee->incomecard()->save($addIncCard);

        //employee_boss
        $addEmployeeBoss = Employee::where('name', '=', $request->employee_boss_surname)->first();

        if($addEmployeeBoss === null) {
            $addEmployeeBoss = new Employee;
            $addEmployeeBoss->name = $request->employee_boss_name;
            $addEmployeeBoss->surname = $request->employee_boss_surname;
            $addEmployeeBoss->patronymic = $request->employee_boss_patronymic;
            $addEmployeeBoss->save();
        }
        $addEmployeeBoss->incomecard()->save($addIncCard);

        //card
        $addCard = Card::where('id', $request->card_number)->first();
        $addCard->status = true;
        $addCard->save();
        $addCard->incomecard()->save($addIncCard);

        return redirect()->route('income-index')->with('success', 'Пропуск выдан');
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
    public function destroy($id) {
        Card::where('id', $id)->delete();
        
        return redirect()->route('card-index')->with('success', 'Пропуск удален');
    }

}
