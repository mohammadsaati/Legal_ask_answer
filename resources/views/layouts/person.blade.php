<div class="col-12">
    @foreach ($user->questions as $question)
       <div class="box row">
           <div class="col-2">
             <form action="{{ route('question.destroy' , ['question' => $question->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                 <button type="submit" class="btn text-danger">
                     <i class="fas fa-trash"></i>
                 </button>
              </form>
           </div>
           <div class="col-2">
               @if ($question->answer()->count() == 0)
                <a href="{{ route('question.edit' , ['question' => $question->id]) }}" class="text-success">
                    <i class="fas fa-pen"></i>
                </a>
                @else
                <b class="text-success"><i class="fas fa-check-circle"></i></b>
               @endif
            </div>
           <div class="col-8 text-right">           
                <a href="{{ route('question.show' , ['question' => $question->id]) }}" ><h4>{{ $question->title}}</h4></a>
            </div>
       </div>
    @endforeach
</div>