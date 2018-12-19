            <div class="card">
                <div class="card-header">{{__("horo.Horoscope Management")}}
                </div>

                   <div class="card">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('post_horoscope')}}">{{__("horo.Post Horoscope")}}</a></li>

                        <li class="list-group-item"><a href="{{route('rasi','daily')}}">{{__("horo.Daily Horoscope")}}</a></li>
                        <li class="list-group-item"><a href="{{route('rasi','monthly')}}">{{__("horo.Monthly Horoscope")}}</a></li>
                        <li class="list-group-item"><a href="{{route('rasi','yearly')}}">{{__("horo.Yearly Horoscope")}}</a></li>

                        <li class="list-group-item"><a href="{{route('now','today')}}">{{__("horo.today")}}</a></li>
                        <li class="list-group-item"><a href="{{route('now','thismonth')}}">{{__("horo.thismonth")}}</a></li>
                        <li class="list-group-item"><a href="{{route('now','thisyear')}}">{{__("horo.thisyear")}}</a></li>
                        <li class="list-group-item">

                          @if(config('app.locale')== 'np')
                             <a href="{{route('lang',"en")}}">See in English</a>
                          @else
                              <a href="{{route('lang',"np")}}">नेपालीमा हेर्नुहोस्</a>
                          @endif
                        </li>
                      </ul>
                    </div>

                    
            </div>

