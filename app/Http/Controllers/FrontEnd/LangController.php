<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function index(Request $request,$locale)
    {
        if($locale){
            Session::put('locale',$locale);
        }
        return redirect()->back();
    }

}
