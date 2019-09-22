<?php

namespace App\Jobs\Memberships;

use App\Receipt;
use Carbon\Carbon;
use App\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateMemberStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $memberships=Membership::all();

        foreach($memberships as $membership)
        {
            if($membership->mship_type_id == 3)
              {
                  $newstatus =  "Life";
              }

              $today = Carbon::now(); 
              $receipt=Receipt::with('term')->where('membership_id', $membership->id)->get()->last();
                       
              if($receipt !== null ){
                $termid = $receipt->mship_term_id;
                
                if($termid == 11)  // Annual Membership
                    {
                      if (($today->gte($receipt->receipt_date->startOfYear()->subMonth(4))
                            &&
                          $today->lte($receipt->receipt_date->endOfYear()))
                        &&
                         ($receipt->receipt_date->gte($receipt->receipt_date->startOfYear()->subMonth(4))
                            &&
                          $receipt->receipt_date->lte($receipt->receipt_date->endOfYear())))
                        {
                          $newstatus = "Current" ;
                        } else {
                          $newstatus = "Expired" ;
                        }
                    }
                if($termid == 12)   //1st Half
                    {
                      if (($today->gte($receipt->receipt_date->startOfYear()->subMonth(1))
                            &&     
                          $today->lte($receipt->receipt_date->endOfYear()->subMonth(6)->subDay(1)))
                        &&
                         ($receipt->receipt_date->gte($receipt->receipt_date->startOfYear()->subMonth(1))
                            &&     
                          $receipt->receipt_date->lte($receipt->receipt_date->endOfYear()->subMonth(6)->subDay(1))))
 
                        { 
                          $newstatus = "acurrent" ;
                        } else {
                          $newstatus = "Expired" ;
                        }
                    }
                if($termid == 13)   // 2nd Half
                    {
                      if (($today->gte($receipt->receipt_date->startOfYear()->addMonth(5))
                            &&     
                          $today->lte($receipt->receipt_date->endOfYear()))
                        &&
                         ($receipt->receipt_date->gte($receipt->receipt_date->startOfYear()->addMonth(5))
                            &&     
                          $receipt->receipt_date->lte($receipt->receipt_date->endOfYear())))
                        { 
                          $newstatus = "Current" ;
                        } else {
                          $newstatus = "Expired" ;
                        }
                    }
                      //  $newstatus= 'PENDING';
                    }

                if($receipt !== null )
                {
                    $membership->status = $newstatus;
                    $membership->mship_term_id = $receipt->mship_term_id;
                    $membership->mship_term = $receipt->term->category;
                    $membership->update();
                }else{
                    if($membership->mship_type_id == 3){
                        $membership->status = "Current";
                        $membership->mship_term ="Life";
                        $membership->update();                       
                    }else{
                        $membership->status = "Pending";
                        $membership->mship_term ="Pending";
                        $membership->update();
                        }
                    }

        } //end foreach                 
    }
}
