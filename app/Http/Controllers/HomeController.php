<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoroscopeRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\IdeaRequest;
use Illuminate\Http\Request;
use App\Idea;
use App\Horoscope;
use Auth;
use DB;
use App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $archives = DB::table('ideas')
            ->selectRaw('year(created_at) as year,month(created_at) as month, monthname(created_at) as monthname, COUNT(*) post_count')
            ->groupBy('year')
            ->groupBy('monthname')
            ->groupBy('month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->where('status',1)
            ->get();

        $items = Idea::where('status', 1)->get();
        return view('home', compact('items', 'archives'));
    }


    public function postitems()
    {
        return view('post');
    }


    public function ideaposted(Request $request)
    {
        $items = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $idea = new Idea;

        $slug = str_replace(" ","_",$request->title);

        $idea->user_id= Auth::user()->id;
        $idea->title =  $request->title;
        $idea->slug =  $slug;
        $idea->description =  $request->description;
        $idea->status =  1;

        $idea->save();

        return redirect()->route('home')->with('success', 'Your idea has been published.');
    }

    public function myprofile()
    {
        $profile = Auth::user()->id;

        $items = Idea::where('user_id', $profile)->get();

        return view('profile', compact('items'));
    }

    public function publishme($id)
    {
        $items = Idea::findOrFail($id);
        $items->status =  1;
        $items->save();
        return redirect()->back();
    }

    public function unpublishme($id)
    {
        $items = Idea::findOrFail($id);
        $items->status =  0;
        $items->save();
        return redirect()->back();
    }

    public function managerasi()
    {
        return view('horoscope.rasimgmt');
    }

    public function post_today_horoscope()
    {
        return view('horoscope.postTodayHoroscope');
    }

    public function post_yearly_horoscope()
    {
        return view('horoscope.postYearlyHoroscope');
    }

    public function post_monthly_horoscope()
    {
        return view('horoscope.postMonthlyHoroscope');
    }

    public function rasiposted(HoroscopeRequest $request)
    {
        $rassi = new Horoscope();

        $rassi->date =  $request->date;
        $rassi->rasi =  $request->rasi;
        $rassi->horoscope =  $request->horoscope;
        $rassi->slug =  $request->slug;
        $rassi->status =  1;
        $rassi->lang =  config('app.locale');

        $rassi->save();

        return redirect()->back();
        
    }

    public function post_horoscope()
    {
        return view('horoscope.postHoroscope');
    }

    public function getrasi($slug)
    {
        $var = config('app.locale');

        $horo = Horoscope::where('lang',$var)->orderBy('date', 'desc')->get();

        $daily = [];
        $monthly = [];
        $yearly = [];
        
        foreach($horo as $key =>$date)
        {
            $checkme = explode('-',$date->date);

            switch(count($checkme))
            {
                case 3:
                    $daily[] = $date;
                    break;

                case 2:
                    $monthly[] = $date;
                    break;

                case 1:
                    $yearly[] = $date;
                    break;

                default:
                    break;
            }
        }

        if($slug == 'daily'){
            return view('horoscope.daily', compact('daily'));
        }elseif($slug == 'monthly'){
            return view('horoscope.monthly', compact('monthly'));
        }elseif($slug == 'yearly'){
            return view('horoscope.yearly', compact('yearly'));
        }else{
            return 'data not found.';
        }

    }

    public function editrasi($id)
    {
        $rasi = Horoscope::findOrFail($id);
        $date = $rasi->date;
        $checkme = count(explode('-',$date));
        if ($checkme == 3) {
            return view('horoscope.editDailyHoroscope', compact('rasi'));
        }
        if ($checkme == 2) {
            return view('horoscope.editMonthlyHoroscope', compact('rasi'));
        }
        if ($checkme == 1) {
            return view('horoscope.editYearlyHoroscope', compact('rasi'));
        }

    }

    public function updaterasiposted(Request $request)
    {
        $rasi = $request->validate([
            'horoscope' => 'required',
            'rasi' => 'required',
            'date' => 'required',
        ]);

        $horoscope = Horoscope::findOrFail($request->id);
        $horoscope->horoscope = $request->horoscope;

        $horoscope->save();
        return redirect()->back();
    }

    public function deleterasi($id)
    {
        $rasi = Horoscope::findOrFail($id);
        $rasi->delete();
        
        return redirect()->route('post_horoscope');   
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
        return view('horoscope.this', compact('horo', 'info'));
    }

    public function selecteddate(Request $request)
    {        
        $rasi = $request->validate([
            'selectdate' => 'required',
        ]);
        $date = $request->selectdate;
        $checkme = count(explode('-',$date));
        if ($checkme == 3) {
            $daily = Horoscope::where(['date' => $request->selectdate , 'lang'=>config('app.locale')])->get();
            return view('horoscope.daily', compact('daily'));
        }
        if ($checkme == 2) {
            $monthly = Horoscope::where(['date' => $request->selectdate , 'lang'=>config('app.locale')])->get();
            return view('horoscope.monthly', compact('monthly'));
        }
        if ($checkme == 1) {
            $yearly = Horoscope::where(['date' => $request->selectdate , 'lang'=>config('app.locale')])->get();
            return view('horoscope.yearly', compact('yearly'));
        }
    }
}
