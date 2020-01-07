@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

             @foreach($questions as $question)
            <div class="col-xs-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-primary">
                    
                    <div class="card-header">
                        <a href='{{ route('question.show' , ['question' => $question->id]) }}' class=" card-title">{{ $question->title }}</a>
                    </div>
                    
                    <div class="card-body">
                        {{ Str::words($question->content , 20) }}
                     </div> 

                     <div class="card-footer" style="color:#5b5858cc">
                        <small class="float-right">Category : {{ $question->cat->name }}</small>
                        <small class="float-right mr-4">Offers : {{ $question->offers()->count() }}</small>
                        <small class="float-right mr-4 
                        @if($question->answer()->count() == 0)
                            text-danger
                        @else
                            text-success
                        @endif
                        "> 
                            @if($question->answer()->count() == 0)
                                {{ __('no Answer') }}
                            @else
                                {{ __('Answered') }}    

                            @endif    
                        </small>
                       
                     </div>

                 </div>               
            </div>   
             @endforeach

        </div>
    </div>    
@endsection