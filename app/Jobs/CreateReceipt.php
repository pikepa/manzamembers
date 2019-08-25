<?php

namespace App\Jobs;

use App\Receipt;
use App\Category;
use App\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateReceipt implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


        protected $receipt;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Receipt $receipt)
    {
        $this->receipt = $receipt;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        //Write the receipt
        $this->receipt->save();

        //Determine the Membership Term from the Receipt & Update Membership
        $membership=Membership::findorFail($this->receipt->membership_id);

        if($membership->mship_type_id == 3)
        {
                $term = "Life";
        }else{
                $term=Category::find($this->receipt->mship_term_id)->category;
        }

          //call the Membership updateStatus() function & update Membership Status
          $membership->mship_term = $term;
          $membership->status = $membership->updateStatus();

          $membership->update();

    }
}
