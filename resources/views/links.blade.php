
@extends('_layout')


    @section('body')
    <a style="text-decoration: none;" href="{{route('bitlinks.create')}}">  <button  class="btn btn-warning">the Create short links Page</button></a>
    <a style="text-decoration: none;" href="{{route('bitfiles.create')}}">  <button  class="btn btn-warning">the Create file links Page</button></a>

    <div class="container" >
        <table class="table table-dark table-striped">
            <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Link/image</th>
                    <th scope="col">code</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($Links as $Link)
                    <tr>

                        <td>{{$Link->id}}</td>
                        @if (@isset($Link->file))

                        <td> <a href={{ route('bitfiles.show', $Link->code) }}><img src={{Storage::disk('public')->url($Link->file)}} height='60'>  </a> </td>
                        <td> <a href={{ route('bitfiles.show', $Link->code) }}>http://localhost:8000/bitfiles/{{$Link->code}}</a></td>
                        @else
                        <td><a href={{$Link->Link}}>{{$Link->Link}}</a></td>
                        <td> <a href={{$Link->Link}}>http://localhost:8000/bitlinks/{{$Link->code}}</a></td>

                        @endif
                      </tr>
                    @endforeach



                </tbody>
              </table>
            </div>
            @endsection


