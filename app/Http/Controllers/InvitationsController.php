<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Invitation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvitationRequest;

class InvitationsController extends Controller
{
    public function store(StoreInvitationRequest $request)
        {
            $invitation = new Invitation($request->all());
            $invitation->generateInvitationToken();
            $invitation->save();

            return redirect()->route('users.index')
                ->with('success', 'Invitation to register successfully requested. Please wait for registration link.');
        }

    public function update($email)
        {
      
            $invitation = Invitation::where('email',$email)->get()->first();
            $invitation->registered_at = Carbon::now();
            $invitation->save();

            return redirect('/');
        }

    public function destroy($id)
        {
                         
            $invitation = Invitation::find($id);
            $invitation->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User invitation deleted.');        
        }
}
