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

            <div class="card">
                <div class="card-header">Edit  Horoscope</div>
                <div class="card-body">
                    <form method="post" action="{{route('updaterasiposted')}}" id="todayhoro">
                         @csrf

                         <input type="hidden" name="id" value="{{$rasi->id}}">
                         <input type="hidden" name="date" value="{{$rasi->date}}">
                         <input type="hidden" name="rasi" value="{{$rasi->rasi}}">

                          <div class="form-group">
                            <label for="rasi">Select Date</label>
                                <input type="date" class="form-control" id="date" value="{{$rasi->date}}" disabled >
                          </div>


                          <div class="form-group">
                            <label for="rasi">Rasi Name</label>
                            <select type="text"  class="form-control" id="rasi" placeholder="Your Rasi." disabled>
                                <option value="{{$rasi->rasi}}"> {{$rasi->rasi}}</option>
                                <option value="Aries">Aries</option>
                                <option value="Taurus">Taurus</option>
                                <option value="Gemini">Gemini</option>
                                <option value="Cancer">Cancer</option>
                                <option value="Leo">Leo</option>
                                <option value="Virgo">Virgo</option>
                                <option value="Libra">Libra</option>
                                <option value="Scorpio">Scorpio</option>
                                <option value="Sagittarius">Sagittarius</option>
                                <option value="Capricorn">Capricorn</option>
                                <option value="Aquarius">Aquarius</option>
                                <option value="Pisces">Pisces</option>
                            </select>
                          </div>

                           <label for="title">Todays Horoscope</label>
                           <textarea id="mytextarea" name="horoscope" placeholder="Description goes here.">{{$rasi->horoscope}}</textarea>

                           <input type="hidden" name="slug" id="slug">

                          <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).on('submit', '#todayhoro', function(e){
        e.preventDefault();
        $rasi = $("#rasi").val();
        $date = $("#date").val();
        
        $slug = $date + $rasi;

        $("#slug").val($slug);

        document.getElementById("todayhoro").submit();


    });
</script>
@endsection
