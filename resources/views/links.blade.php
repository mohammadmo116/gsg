
@extends('_layout')


    @section('body')
    <a style="text-decoration: none;" href="{{route('bitlinks.create')}}">  <button  class="btn btn-warning">the Create short links Page</button></a>
    <a style="text-decoration: none;" href="{{route('bitfiles.create')}}">  <button  class="btn btn-warning">the Create file links Page</button></a>

    <div class="container" >
        <table class="table table-dark table-striped">
            <thead>
                  <tr>
                    <th scope="col">#</th>
                    @if (isset($Links))
                    <th scope="col">Link</th>
                    @endif
                    <th scope="col">code</th>
                  </tr>
                </thead>
                <tbody>




                        @if (@isset($Files))
                        @foreach ($Files as $file)
                        <tr>
                        <td>{{$file->id}}</td>
                        <td> <a href={{ route('bitfiles.show', $file->code) }}>http://localhost:8000/bitfiles/{{$file->code}}</a></td>
                        </tr>
                        @endforeach
                        @else
                        @foreach ($Links as $Link)
                        <tr>
                        <td>{{$Link->id}}</td>
                        <td><a href={{$Link->Link}}>{{$Link->Link}}</a></td>
                        <td> <a href={{$Link->Link}}>http://localhost:8000/bitlinks/{{$Link->code}}</a></td>
                        </tr>
                        @endforeach
                        @endif






                </tbody>
              </table>
            </div>
            @endsection


