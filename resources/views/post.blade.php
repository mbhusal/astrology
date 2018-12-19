@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                <div class="card-header">Post your Ideas.</div>
                <div class="card-body">
                    <form method="post" action="{{route('ideaposted')}}">
                         @csrf
                          <div class="form-group">
                            <label for="title">Your ideas title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Your ideas title.">
                          </div>

                           <textarea id="mytextarea" name="description" placeholder="Description goes here." rows="15"></textarea>

                          <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
