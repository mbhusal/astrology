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
                          <form method="get" action="{{route('lang')}}">
                            @csrf()
                            <input type="hidden" name="locale" value="en">
                             <button  type="submit">See in English</button>
                          </form>
                          @else
                          <form method="get" action="{{route('lang')}}">
                            @csrf()
                            <input type="hidden" name="locale" value="np">
                              <button type="submit">नेपालीमा हेर्नुहोस्</button>
                          </form>
                          @endif
                        </li>
                      </ul>
                    </div>

                    
            </div>

