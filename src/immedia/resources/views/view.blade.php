@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach ($photos as $photo)
               <div class="col-md-3">
                     <div class="card">
                         <div class="card-header">{{ $photo->title  }}</div>
                            <img src=" {{  'http://farm' . $photo->farm . '.static.flickr.com/' . $photo->server . '/' . $photo->id . '_' . $photo->secret . '_m.jpg'   }}">
                     </div>
               </div>
        @endforeach



    </div>
    <div class="row justify-content-center">  {{ $photos->links() }} </div>
</div>
@endsection
