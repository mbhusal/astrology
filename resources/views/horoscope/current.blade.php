@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
                        <div class="card">
                <div class="card-header">{{__("horo.Horoscope Management")}}
                </div>

                   <div class="card">
                      <ul class="list-group list-group-flush">

                        <li class="list-group-item"><a href="{{route('myrasi','today')}}">{{__("horo.today")}}</a></li>
                        <li class="list-group-item"><a href="{{route('myrasi','thismonth')}}">{{__("horo.thismonth")}}</a></li>
                        <li class="list-group-item"><a href="{{route('myrasi','thisyear')}}">{{__("horo.thisyear")}}</a></li>
                        <li class="list-group-item">

                          @if(config('app.locale')== 'np')
                             <a href="{{route('lang','en')}}">See in English</a>
                          @else
                              <a href="{{route('lang','np')}}">नेपालीमा हेर्नुहोस्</a>
                          @endif
                        </li>
                      </ul>
                    </div>  
            </div>
        </div>
        <div class="col-md-9">
              @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                <li> {{ session('success') }}</li>
            </ul>
        </div>
    @endif

            <div class="card">
                <div class="card-header">{{__($info)}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($horo)

                    @foreach($horo as $thisme)

                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><b>{{$thisme->date}}</b> {{__($info)}} <b style="color: blue;"> {{$thisme->rasi}}</b></h5> 
                        <p class="card-text">{!!$thisme->horoscope!!}</p>

                      </div>

                    </div>

                    <br>

                    @endforeach
                    @endif



                </div>
        </div>
    </div>
</div>
@endsection
