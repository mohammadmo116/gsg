@extends('_layout')

@section("body")

<div class="text-center">


    <h1 class="display-4">Shorten Link for files :</h1>
    <form action="{{route('bitfiles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
       <label for="inputGroupFile04" class="form-label">Files to shorten:</label>
        <div class="input-group">
       <input name="File" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
       <button  class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">upload</button>

       </div>


    </form>
    @error('File')
    {{$message}}
    @enderror

<div class="container-fluid lg">

<div class="row" style="margin-top:20px">

<div class="col-4">
</div>

<div class="col-4">
    <a style="text-decoration: none;" href="{{route('bitfiles.index')}}">  <button  class="btn btn-warning">Links</button></a>
    <a style="text-decoration: none;" href="{{route('bitlinks.create')}}">  <button  class="btn btn-warning">LinksPage</button></a>

</div>

</div>

</div>




<h1>

    @if (Session::has('success'))

    <div class="alert alert-success">

        <p>{{ Session::get('success') }}</p>
        <a href={{route('bitfiles.show',Session::get('code'))}}>{{ Session::get('link') }}</a>
    </div>
    @endif




</h1>
@endsection
