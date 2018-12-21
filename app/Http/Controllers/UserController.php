<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use Carbon\Carbon;
use DB;
use App;
use Session;
use Illuminate\Support\Facades\Redirect;
use Config;


class UserController extends Controller
{

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
        return view('home', compact('items' , 'archives'));
    }


    public function details($slug)
    {
        $items = Idea::where('slug', $slug)->first();
        return view('details', compact('items'));
    }



    public function lang(Request $request)
    {
        $this->validate($request, ['locale' => 'required']);
getLanguage();

        Session::put('locale', $request->locale);


        dump(Session::get('locale'));

        return redirect()->back();

    }

    public function archives(Request $request)
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


       $month = $request->month;
       $year = $request->year;
       
       $data['archive_name'] = 'Archives from '.$month.', '.$year;
       
       $articles = Idea::latest();
       $articles->whereMonth('created_at', Carbon::parse($month)->month);
       $articles->whereYear('created_at', $year);
       
       $data['articles'] = $articles->paginate(10);       
       return view('mychoice', compact('data' , 'archives'));

    }
}
