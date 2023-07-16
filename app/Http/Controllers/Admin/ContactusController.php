<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function contactmessages(){
        $messages = Contact::latest()->paginate(50);
        return view('admin.contact_us', compact('messages'));
    }

    public function contactUsSeen(Request $request, Contact $contact){
        if($request->type === 'unseen'){
            $contact->update(['status'=>'unseen']);
        }elseif($request->type === 'seen'){
            $contact->update(['status'=>'seen']);
        }else{
            return back()->with('error','Message Status can not updated ');
        }
        
        return back()->with('success','Message Seen Successfully');
    }
}
