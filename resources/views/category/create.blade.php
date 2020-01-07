@extends('layouts.app')

@section('content')
    <div  class="container">
        <br/>
        <h3 class="text-center">New category</h3>
        <br/>
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
               <label for="name" >Title </label>
               <input type="text" name="name" id="name" class="form-control" /> 
            </div>

            <input type="submit" value="Create" class="btn btn-success" />
        </form>   
    </div>   

@endsection