@extends('layouts.app')

@section('content')
<br/>
    <div  class="container">
       <div class="row">
           <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                <div class="card">
                    
                    <div class="card-header">
                        <h3 class="text-center">Create new question</h3>
                    </div>   
                    
                    <div class="card-body">
                            <br/>
                            <form method="POST" action="{{ route('question.store') }}">
                                @csrf
                                <div class="form-group">
                                <label for="title" >Title</label>
                                <input type="text" name="title" id="title" class="form-control" /> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="content">you'r question</label>
                                    <textarea class="form-control" style="height:200px" name="content" id="content"></textarea>
                                </div>   
                    
                                <div class="form-group">
                                    <label for="cat_id" >Categories</label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        @foreach($allCats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                    
                                <input type="submit" value="Creat" class="btn btn-success" />
                            </form>
                    </div>
                    
                    
                </div>   

           </div>

           <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="alert alert-primary">
                    <h3>Notice!</h3>
                    <br/>
                    <p>passage of question should be short and understadable</p><br/>
                    <p>You should describe what your mean is exactly</p><br/>
                    <p>Make sure you chose one of the categories</p><br/>
                    <p>If you'r question can not understadabel by lawyers it may be deleted by andmin</p><br/>
                    <h4 class="text-danger text-center">Good Luck</h4>
                </div>   
           </div>


       </div> 
    </div>   
@endsection