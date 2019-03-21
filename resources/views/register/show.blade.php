@extends('layouts.app')
@section('content')
<?php 
use App\Register; 
?>

<table class="table table-striped" style="margin-top:3em">
    <thead>
      <tr>
        <th scope="col">Red. br.</th>
        <th scope="col">Name</th>
        <th scope="col">Title</th>
        <th scope="col">Institution</th>
        <th scope="col">e-mail</th>
        <th scope="col">Name of all authors</th>
        <th scope="col">Abstract title</th>
        <th scope="col">Keywords</th>
        <th scope="col">Text</th>
        <th scope="col">Abstract file</th>
      </tr>
    </thead>
    <tbody>
            @foreach($register as $reg)

      <tr>
      <th scope="row">{{$reg->id}}</th>
        <td>{{$reg->name}}</td>
        <td>{{$reg->acad_title}}</td>
        <td>{{$reg->institution}}</td>
        <td>{{$reg->email}}</td>
        <td>{{$reg->name_of_all_authors}}</td>
        <td>{{$reg->abstract_title}}</td>
        <td>{{$reg->keywords}}</td>
        <td>{{$reg->enter_text}}</td>
        <td><a href="{{$reg->abstract}}">{{$reg->abstract}}</a></td>
      </tr>
      @endforeach

    </tbody>
</table>



@endsection