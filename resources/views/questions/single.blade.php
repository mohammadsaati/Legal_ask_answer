@extends('layouts.app')
 <br/><br/>
@section('content')

    <div class="container">
       
        <h3 class="text-primary">{{ $question->title }}</h3>
        <hr class="specioal-hr col-12 mt-4">
        <div class="card col-12" style="padding:20px;">
            {{ $question->content }}
        </div>
        
        @auth

          @if ((Auth::user()->role == 'lawyer') && ($question->answer()->count() == 0))
            
            @if ($selected_offer->count() > 0)
                @foreach ($selected_offer as $selected_off)
                        <br/>
                        <div class="col-12 ml-4 mb-4 card bg-success" style="padding:10px;">
                            
                             @if($selected_off->user_id == Auth::user()->id) {{__('You\'r suggestion')}} @else {{$selected_off->user->fullName}} offer @endif &nbsp; was selected for the price {{$selected_off->price}}
                        </div>

                        @if(($selected_off->user_id == Auth::user()->id) && ($question->answer()->count() == 0))
                            <br/>
                            <h3>Pleas describe the answer</h3>
                            <hr/>
                            <form action="{{ route('answer.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" value={{ $question->id }} name="question_id" />
                                <textarea class="form-control" name="content" style="height:300px" ></textarea><br/>
                                <input type="submit" class="text-center btn btn-outline-danger float-right" value="Send answer" /><br/><br/><br/>
                            </form>   
                            <br/>
                        @endif
                @endforeach

                @elseif ($offers->count() > 0)
                    @foreach($offers as $offer)
                        <br/><br/><br/><br/><br/>
                        <div class="col-4 card bg-warning text-center" style="padding:10px;">
                            You'r offer {{$offer->price}} $
                        </div>   
                    @endforeach
                @else

                    <br/><br/><br/><br/><br/>
                    <form method="POST" action="{{ route('offer.store') }}" 
                            class="col-6">
                                    
                            @csrf
                            
                            <input type="hidden" value={{ $question->id }} name="question_id" />  
                            <div class="form-group">
                                <label for="price">Propesed price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="20" />
                            </div>
                            
                            <input type="submit" value="Send offer" class="btn btn-outline-success text-center" />
                    </form> 

                @endif
            
          @endif 


          @if ($question->user_id == Auth::user()->id)
          <br/><br/><br/><br/><br/>
          <h3>Offers</h3>
          <hr class="bg-primary" />
          <div class="card" style="padding:10px">
              <div class="row">
                @if ($selected_offer->count() > 0)
                    @foreach ($selected_offer as $selected_off)
                        <div class="col-2 ml-4 mb-4 card bg-primary text-center" style="padding:10px;">
                                {{$selected_off->price}}$
                                <br/>
                                with : {{$selected_off->user->fullName}}
                                <br/>
                                <i class="far fa-check-circle text-success"  style="font-size:45px"></i>
                        </div>  
                    @endforeach

                @else 
                    @foreach ($question->offers as $question_offer)
                    
                        <div class="col-2 ml-4 mb-4 card bg-info text-center" style="padding:10px;">
                                {{$question_offer->price}}$
                                <br/>
                                with : {{$question_offer->user->fullName}}
                                <br/>
                                <form action="{{ route('offer.update' , ['offer' => $question_offer->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                     <input type="hidden" name="question_id" value="{{ $question->id }}" />
                                    <input type="submit" class="btn btn-sm btn-warning" value="Select" />
                                </form>
                        </div>  
                                                
                    @endforeach   
                @endif
            </div>    
        </div>
          @endif
        
        @endauth

        @if ($question->answer()->count() > 0)
            <br/><br/><br/><br/>
             <h3>The answer</h3>
             <hr class="bg-danger"/>
             <div class="row">
                <small class= "col-4">
                            Adress : {{ $question->answer->user->address }}
                </small>    
                <small class= "col-4">
                    Phone number : {{ $question->answer->user->phoneNumber }}
                </small>
                <small class= "col-4">
                     Lawyer : {{ $question->answer->user->fullName }}
                </small>
             </div>
             <hr class="bg-danger" />
            <div class="row">
                <div class="col-12 card border-success" style="padding:20px;">
                    <p>{{ $question->answer->content }}</p>
                </div>
            </div>
            <br/><br/>   
            <br/><br/>   
        @endif


    </div>    

@endsection




