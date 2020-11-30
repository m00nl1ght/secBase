<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ReportSecurityMail;

use App\Models\Currentdate;
use App\Models\Dategroup;
use App\Models\Incident;
use App\Models\Fault;
use App\Models\Incomevisitor;
use App\Models\Incomecar;
use App\Models\Security;

class FeedbackController extends Controller {

    public function send() {
        $comment = [];

        $reportDay = date('Y-m-d');

        if(date("H:i") < '07:00') {
            $reportDay = date('Y-m-d', strtotime('-1 days'));
        }

        $reportDayTomorrow = date("Y-m-d", strtotime($reportDay.'+ 1 days'));

        $currentdate = Currentdate::where('currentdate', $reportDay)->first();
        $currentdateTomorrow = Currentdate::where('currentdate', $reportDayTomorrow)->first();

        $securityGuys = $currentdate->dategroup->security;

        $faults = Fault::where('out_date', '=',  null)->get();

        $incidents = Incident::where('currentdate_id', '=',  $currentdate->id)
            ->where('in_time', '>=', '07:00:00')
            ->orWhere(function($query) use ($currentdateTomorrow) {
               if($currentdateTomorrow !== null) {
                $query->where('currentdate_id', '=',  $currentdateTomorrow->id)
                ->where('in_time', '<=', '07:00:00');
               } 
            })
            ->get();

        $visitors = IncomeVisitor::where('currentdate_id', '=',  $currentdate->id)
            ->where('in_time', '>=', '07:00:00')
            ->orWhere(function($query) use ($currentdateTomorrow) {
                if($currentdateTomorrow !== null) {
                    $query->where('currentdate_id', '=',  $currentdateTomorrow->id)
                    ->where('in_time', '<=', '07:00:00');
                }
            })
            ->get();

        $countPeopleArr = [];
        $countPeopleArr['Всего'] = $visitors->count();
        
        foreach($visitors as $arr) {
            $key = $arr->visitor->category->description;
         
            if(isset($countPeopleArr[$key])) {
                $countPeopleArr[$arr->visitor->category->description]++;
            } else {
                $countPeopleArr[$arr->visitor->category->description] = 1;
            }
        }

        $cars = IncomeCar::where('currentdate_id', '=',  $currentdate->id)
        ->where('in_time', '>=', '07:00:00')
        ->orWhere(function($query) use ($currentdateTomorrow) {
            if($currentdateTomorrow !== null) {
                $query->where('currentdate_id', '=',  $currentdateTomorrow->id)
                ->where('in_time', '<=', '07:00:00');
            }
        })
        ->get();

        $countCarArr = [];
        $countCarArr['Всего'] = $cars->count();

        foreach($cars as $arr) {
            $key = $arr->visitor->category->description;
         
            if(isset($countCarArr[$key])) {
                $countCarArr[$arr->visitor->category->description]++;
            } else {
                $countCarArr[$arr->visitor->category->description] = 1;
            }
        }


        $comment['reportDay'] = $reportDay;
        $comment['reportDayTomorrow'] = $reportDayTomorrow;
        $comment['securityGuys'] = $securityGuys;
        $comment['faults'] = $faults;
        $comment['incidents'] = $incidents;
        $comment['countPeopleArr'] = $countPeopleArr;
        $comment['countCarArr'] = $countCarArr;

        $toEmail = explode(',', env('REPORT_RECIVERS'));
        Mail::to($toEmail)->send(new ReportSecurityMail($comment));

        return redirect()->route('security-edit')->with('success', 'Отчет отправлен');
    }
}
