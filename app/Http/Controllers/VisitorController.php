<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Currentdate;
use App\Models\Dategroup;
use App\Models\Emploee;
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

        return view('visitor', compact('visitorArr'))->with('page', 'index');
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

        //emploee
        $addEmploee = Emploee::where('name', '=', $request->visitor_emploee)->first();

        if($addEmploee === null) {
            $addEmploee = new Emploee;
            $addEmploee->name = $request->visitor_emploee;
            $addEmploee->save();
        }
        $addEmploee->incomevisitor()->save($addIncVisitor);

        //security
        $securityWriter = Currentdate::where('currentdate', date('Y-m-d'))->first()->dategroup->security->where('category', '=', 'writer')->first();
        $securityWriter->incomevisitor()->save($addIncVisitor);

        return redirect()->route('visitor-index')->with('success', 'Посетитель добавлен');
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
