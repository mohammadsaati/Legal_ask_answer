<div class="col-12">
        @foreach ($user->offers as $offer)
        @if ($offer->question->answer()->count() == 0)
           <div class="box row">
               
                <div class="col-4">
                    <p class="text-right 
                        @if($offer->selected)
                            text-success
                        @else
                            text-danger
                        @endif        
                        " >
                        {{ $offer->price }}$
                    </p>
                </div>

                <div class="col-2">
                    @if ($offer->selected)
                        <b class="text-success"><i class="fas fa-check-circle"></i></b>
                    @endif
                </div>

                <div class="col-6">
                    <a class="text-right" href="{{ route('question.show' , ['question'=>$offer->question->id]) }}">
                        <p>{{ $offer->question->title }}</p>
                    </a>
                </div>

            </div>
         @endif
        @endforeach
    </div>