@extends('_layout')

@section("body")

<div class="text-center">


    <h1 class="display-4">Shorten Link for links:</h1>
    <form action="{{route('bitlinks.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="link" class="form-label">Link to shorten:</label>
            <input type="url" class="form-control" id="link" name="Link" placeholder="https://example.com/" value={{$old??''}}>
            @error('Link')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>


    </form>

    <a style="text-decoration: none;" href="{{route('bitlinks.index')}}">  <button  class="btn btn-warning">Links</button></a>
    <a style="text-decoration: none;" href="{{route('bitfiles.create')}}">  <button  class="btn btn-warning">FilesPage</button></a>
</div>
<h1>

    @if (Session::has('success'))

    <div class="alert alert-success">

        <p>{{ Session::get('success') }}</p>
        <a href={{route('bitlinks.show',Session::get('code'))}}>{{ Session::get('link') }}</a>

    </div>
    @endif




</h1>
@endsection
