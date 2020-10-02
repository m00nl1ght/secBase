<?php

namespace App\Http\Controllers;

use App\Models\Checkbox;
use Illuminate\Http\Request;

class CheckboxController extends Controller
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
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkbox  $checkbox
     * @return \Illuminate\Http\Response
     */
    public function show(Checkbox $checkbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkbox  $checkbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkbox $checkbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkbox  $checkbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkbox $checkbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkbox  $checkbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkbox $checkbox)
    {
        //
    }
}
