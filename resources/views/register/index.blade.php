@extends('layouts.app')
@section('content')
<br/>
<link rel="stylesheet" href="{{ URL::asset('css/mycss.css') }}" >


@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      <br />
@endif


<br>
<div class="container" style="width:90%">

<div class="jumbotron center" style="background-color:#F5F5F5 ">
        <title>Abstract submission</title>
  
        <h1 style="text-align:center">Abstract submission</h1><br/>


        {{Form::open(['action' =>'RegisterController@store','method'=>'POST','enctype'=>'multipart/form-data'])}}

        {{ csrf_field() }}   
        @csrf 
        <br>

        <h3>Corresponding Author</h3>
        <hr>
        <div class="form-group">
          <div class="rTableRow" >
            <div class="rTableCell" style="border: 0px">
            {{Form::label('name','Name:')}}
            {{Form::text('name','',['class'=>'form-control','style'=>'width:30em'])}}

          </div>
          <div class="rTableCell" style="border: 0px">

            {{Form::label('acad_title','Academic title:')}}
            {{Form::text('acad_title','',['class'=>'form-control','style'=>'width:30em;'])}}  
          </div> 
        </div>

        <div class="rTableRow" >
          <div class="rTableCell" style="border: 0px">
            {{Form::label('institution','Institution/Affiliation:')}}
            {{Form::text('institution','',['class'=>'form-control','style'=>'width:30em'])}}
          </div>

          <div class="rTableCell" style="border: 0px">
            {{Form::label('email','E-mail address:')}}
            {{Form::text('email','',['class'=>'form-control','style'=>'width:30em'])}}  
          </div> 
        </div>
        
        <hr>

        <h3>Authors</h3>
        <hr>
                {{Form::label('name_of_all_authors','Name, Academic title, Institution/Affiliation (name all authors):')}}
                {{Form::text('name_of_all_authors','',['class'=>'form-control','style'=>'width:30em'])}} 
        </div>

        <h3>Abstract</h3>
        <hr>
        <div class="form-group">

          <div class="rTableRow" >
            <div class="rTableCell" style="border: 0px">
                {{Form::label('abstract_title','Abstract title')}}
                {{Form::text('abstract_title','',['class'=>'form-control','style'=>'width:30em'])}}
            </div>

            <div class="rTableCell" style="border: 0px">
                {{Form::label('keywords','Keywords:')}}
                {{Form::text('keywords','',['class'=>'form-control','style'=>'width:30em'])}}  
            </div>
          </div>

                {{Form::label('enter_text','Enter your text')}}
                {{Form::textarea('enter_text','',['class'=>'form-control','rows' => '5', 'cols' => '54','maxlength' => 400 ])}}  
        </div>


                {{Form::label('abstract','Upload your file:')}}<br>
                {{Form::file('abstract',array('name' => 'file'))}}  

       </div>


        {{Form::submit('Submit',['class'=>'btn btn-primary','name'=>'submit','style'=>'width:10em',])}} 
        {!! Form::close() !!}     
    </div>
<br><br>

@endsection