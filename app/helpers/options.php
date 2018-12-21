<?php

function getLanguage()
{
	$en = [
			"Today's Horoscope" => "Today's Horoscope",
			"Select Date" => "Select Date",
			"Rasi Name" => "Rasi Name",
			
			"Horoscope Management"=>"Horoscope Management",
			"Post Horoscope"=>"Post Horoscope",
			"Daily Horoscope"=>"Daily Horoscope",
			"Monthly Horoscope"=>"Monthly Horoscope",
			"Yearly Horoscope"=>"Yearly Horoscope",

			"today" => "Todays Horoscope",
			"thismonth" => "This Month Horoscope", 
			"thisyear" =>"This Year Horoscope",

			"View Horoscope" => "View Horoscope",	
		];

	$np = [
		"Today's Horoscope" => "आजको कुंडली",
		"Select Date" => "मिति चयन गर्नुहोस्",
		"Rasi Name" => "कुंडली नाम",
		
		"Horoscope Management"=>"कुंडली व्यवस्थापन",
		"Post Horoscope"=>"पोस्ट कुंडली",
		"Daily Horoscope"=>"दैनिक कुंडली",
		"Monthly Horoscope"=>"मासिक कुंडली",
		"Yearly Horoscope"=>"वार्षिक कुंडली",
		

		"today" => "आजको कुंडली",
		"thismonth" => "यो महिना कुंडली", 
		"thisyear" =>"यो वर्ष कुंडली",

		"View Horoscope" => "कुंडली हेर्नुहोस्",
	];

			if(Session::has('locale') && Session::get('locale') == "np"){
				return $np;
			}else{
				return $en;
			}
	

}