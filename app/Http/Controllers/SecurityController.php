<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\SecurityRequest;

use App\Models\Currentdate;
use App\Models\Incident;
use App\Models\Fault;
use App\Models\IncomeVisitor;
use App\Models\IncomeCar;

class SecurityController extends Controller {
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('security')->with('page', 'new');
    }


    public function submit(SecurityRequest $req) {
        checkSec($req);
        return redirect()->route('security-current')->with('success', 'Смена добавлена');
    }

    public function current() {
        $currentDate = Currentdate::where('currentdate', date('Y-m-d'))->first();
        $securityGuys = $currentDate->dategroup->security;

        return view('security', compact('securityGuys'))->with('page', 'current');
     }

     public function report(Request $request) {
        if($request->has('reportDate')) {
            $reportDay = $request->reportDate;
        } else {
            $reportDay = date('Y-m-d');

            if(date("H:i") < '07:00') {
                $reportDay = date('Y-m-d', strtotime('-1 days'));
            }
        }
         

        $reportDayTomorrow = date("Y-m-d", strtotime($reportDay.'+ 1 days'));

        $currentDate = Currentdate::where('currentdate', $reportDay)->first();
        $currentDateTomorrow = Currentdate::where('currentdate', $reportDayTomorrow)->first();

        $securityGuys = $currentDate->dategroup->security;
        $faults = Fault::where('out_date', '=',  null)->get();

        // $incidents = Incident::where('currentdate_id', '=',  $currentDate->id)
        //     ->where('in_time', '>=', '07:00:00')
        //     ->orWhere('currentdate_id', '=',  $currentDateTomorrow->id)
        //     ->where('in_time', '<=', '07:00:00')
        //     ->get();
        $incidents = Incident::where('currentdate_id', '=',  $currentDate->id)
            ->where('in_time', '>=', '07:00:00')
            ->orWhere(function($query) use ($currentDateTomorrow) {
               if($currentDateTomorrow !== null) {
                $query->where('currentdate_id', '=',  $currentDateTomorrow->id)
                ->where('in_time', '<=', '07:00:00');
               } 
            })
            ->get();

        // $visitors = IncomeVisitor::where('currentdate_id', '=',  $currentDate->id)
        //     ->where('in_time', '>=', '07:00:00')
        //     ->orWhere('currentdate_id', '=',  $currentDateTomorrow->id)
        //     ->where('in_time', '<=', '07:00:00')
        //     ->get();
        $visitors = IncomeVisitor::where('currentdate_id', '=',  $currentDate->id)
            ->where('in_time', '>=', '07:00:00')
            ->orWhere(function($query) use ($currentDateTomorrow) {
                if($currentDateTomorrow !== null) {
                    $query->where('currentdate_id', '=',  $currentDateTomorrow->id)
                    ->where('in_time', '<=', '07:00:00');
                }
            })
            ->get();

        $countPeopleArr = [];
        $countPeopleArr['Всего'] = $visitors->count();
        
        foreach($visitors as $arr) {
            $key = $arr->visitor->category->name;
         
            if(isset($countPeopleArr[$key])) {
                $countPeopleArr[$arr->visitor->category->name]++;
            } else {
                $countPeopleArr[$arr->visitor->category->name] = 1;
            }
        }

        // $cars = IncomeCar::where('currentdate_id', '=',  $currentDate->id)
        //     ->where('in_time', '>=', '07:00:00')
        //     ->orWhere('currentdate_id', '=',  $currentDateTomorrow->id)
        //     ->where('in_time', '<=', '07:00:00')
        //     ->get();
        $cars = IncomeCar::where('currentdate_id', '=',  $currentDate->id)
        ->where('in_time', '>=', '07:00:00')
        ->orWhere(function($query) use ($currentDateTomorrow) {
            if($currentDateTomorrow !== null) {
                $query->where('currentdate_id', '=',  $currentDateTomorrow->id)
                ->where('in_time', '<=', '07:00:00');
            }
        })
        ->get();

        $countCarArr = [];
        $countCarArr['Всего'] = $cars->count();

        foreach($cars as $arr) {
            $key = $arr->visitor->category->name;
         
            if(isset($countCarArr[$key])) {
                $countCarArr[$arr->visitor->category->name]++;
            } else {
                $countCarArr[$arr->visitor->category->name] = 1;
            }
        }

        return view('/reports/mainReport', compact([
            'securityGuys',
            'faults',
            'incidents',
            'countPeopleArr',
            'countCarArr',
            'reportDay',
            'reportDayTomorrow',
            'request'
        ]));
     }
}