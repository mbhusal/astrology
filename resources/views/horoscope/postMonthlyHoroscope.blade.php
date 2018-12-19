@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
                @include('horoscope.sidebar')
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


    @if(config('app.locale')== 'np')
        <?php $rasi  = array('मेष','बृष','मिथुन','कर्कट','सिंह','कन्या','तुला','बृश्चिक','धनु','मकर','कुम्भ','मीन'); ?>    
    @else
        <?php $rasi  = array('Aries','Taurus','Gemini','Cancer','Leo','Virgo','Libra','Scorpio','Sagittarius','Capricorn','Aquarius','Pisces'); ?>
    @endif


            <div class="card">
                <div class="card-header">{{__("horo.Monthly Horoscope")}}</div>
                <div class="card-body">
                    <form method="post" action="{{route('rasiposted')}}" id="monthlyhoro">
                         @csrf


                          <div class="form-group">
                            <label for="rasi">{{__("horo.Select Date")}}</label>
                                <input type="month" name="date" class="form-control" id="date">
                          </div>


                          <div class="form-group">
                            <label for="rasi">{{__("horo.Rasi Name")}}</label>
                            <select type="text"  class="form-control" id="rasi" name="rasi" placeholder="Your Rasi.">
                                <option>--Select Rasi--</option>
                                @foreach($rasi as $r)
                                     <option value="{{$r}}">{{$r}}</option>
                                @endforeach
                            </select>
                          </div>

                           <label for="title">{{__("horo.Monthly Horoscope")}}</label>
                           <textarea id="mytextarea" name="horoscope" placeholder="Description goes here."></textarea>

                           <input type="hidden" name="slug" id="slug">


                          <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).on('submit', '#monthlyhoro', function(e){
        e.preventDefault();
        $rasi = $("#rasi").val();
        $date = $("#date").val();
        
        $slug = $date + $rasi;

        $("#slug").val($slug);

        document.getElementById("monthlyhoro").submit();


    });
</script>
@endsection
