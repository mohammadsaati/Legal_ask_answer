@extends('layouts.app')

@section('content')
    <div  class="container">
       <div class="row">
           <div class="col-12">

                <div class="card">
                    
                    <div class="card-header">
                        <h3 class="text-center">Edite question</h3>
                    </div>   
                    
                    <div class="card-body">
                            <br/>
                            <form method="POST" action="{{ route('question.update' , ['question' => $question->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label for="title" >Title</label>
                                <input type="text" name="title" id="title" value="{{ $question->title }}" class="form-control" /> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="content">Passage</label>
                                    <textarea class="form-control" style="height:200px" name="content" id="content">{{ $question->content }}</textarea>
                                </div>   
                    
                                <div class="form-group">
                                    <label for="cat_id" >Categories</label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        @foreach($allCats as $cat)
                                            <option value="{{ $cat->id }}"
                                                @if ($question->cat_id == $cat->id)
                                                    selected
                                                @endif
                                                >
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>   
                                </div>
                    
                                <input type="submit" value="Edit question" class="btn btn-outline-success" />
                            </form>
                    </div>
                    
                    
                </div>   

           </div>

          

       </div> 
    </div>   
@endsection