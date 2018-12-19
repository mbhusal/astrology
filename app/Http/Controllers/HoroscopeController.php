<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horoscope;

class HoroscopeController extends Controller
{
    public function index()
    {
    	return view('horoscope.chooseme');
    }


    public function now($slug)
    {
        if($slug == 'today'){
            $mytime = now()->format('Y-m-d');
            $info = "horo.Daily Horoscope" ;
        }elseif($slug == 'thismonth'){
            $mytime = now()->format('Y-m');
            $info = "horo.Monthly Horoscope";
        }elseif($slug == 'thisyear'){
            $mytime = now()->format('Y');
            $info = "horo.Yearly Horoscope";
        }else{
            return 'data not found.';
        }
        $horo = Horoscope::where(['date' => $mytime, 'lang'=> config('app.locale')])->get();
       
        return view('horoscope.current', compact('horo', 'info'));
    }
}
