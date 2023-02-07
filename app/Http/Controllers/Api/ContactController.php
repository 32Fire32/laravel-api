<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function email(Request $request){
        Mail::to('info@boolfolio.it')->send(new NewContact($request->all()));
    }
}
