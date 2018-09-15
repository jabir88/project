<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
use \Validator;

class ContactController extends Controller
{
    public function insert(Request $req)
    {
        $this->validate($req, [
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required',
          'message' => 'required',
          ], [
         'name.required'=>'Please Enter Your Name',
         'email.required'=>'We need to know your e-mail address!',
         'email.email'=>'invalid e-mail address!',
         'message.required'=>'Please Write a message!',
        ]);

        $insertmess = Contact::insert([
          'name'=>$_POST['name'],
          'email'=>$_POST['email'],
          'subject'=>$_POST['subject'],
          'message'=>$_POST['message'],
          'created_at'=>Carbon::now(),
        ]);
        if ($insertmess) {
            return redirect('contact')->with('status', 'Message Sent Successfully');
        } else {
            return redirect('contact')->with('failed', 'Message Sent ');
        }
    }
    public function manage()
    {
        $all_con =    Contact::where('status', 1)->get();

        return view('admin.contact.manage', compact('all_con'));
        // echo "<pre>";
        // print_r($all_con);
        // echo "</pre>";
    }
    public function view($id)
    {
        $single_con = Contact::where('id', $id)->where('status', 1)->first();
        return view('admin.contact.signleview', compact('single_con'));
    }
    public function mark($id)
    {
        Contact::where('id', $id)->where('status', 1)->update([
        'status' => 2,
      ]);
        return back();
    }
    public function delete($id)
    {
        Contact::where('id', $id)->where('status', 1)->delete();
        return back();
    }
}
