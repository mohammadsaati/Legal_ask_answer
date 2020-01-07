<div class="row float-right" style="margin:10px;">
    <div class="col-12">

             <a href="{{ route("question.index") }}" class="btn btn-success">All questions</a>
        
            <button  class="btn btn-outline-primary"
            data-toggle="modal" data-target="#promoate-info" type="button">
           Complit profile
           </button>

           <div class="modal fade" id="promoate-info" tabindex="-1" 
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                      
                       <div class="modal-body">
                         <h4 >Complite you'r personal information</h4>
                       </div>
                       <hr class="specioal-hr" />
                       <div class="modal-body " style="padding:10%">
                        @if ($user->lawyer()->count() == 0)

                        @else
                            <img src="{{ asset($user->lawyer->avatar) }}" class="rounded-circle img-fluid" style="height:39%; width:65%; margin-bottom:10px;"/>
                        @endif
                        <form enctype="multipart/form-data"
                            action="
                                @if($user->lawyer()->count() == 0)
                                    {{route('lawyer.store')}}
                                @else
                                    {{route('lawyer.update' , ['lawyer' => $user->lawyer->id])}}    
                                @endif
                            "
                             method="POST">
                                @csrf

                                @if ($user->lawyer()->count() > 0)
                                    @method('PUT')
                                @endif

                                <div class="form-group row">
                                    {{-- <div class="col-xl-6 col-12 ">
                                        <label for="lawyerCode">کد وکالت</label>
                                        <input type="text" name="lawyerCode" id="lawyerCode" class="form-control "
                                         @if ($user->lawyer()->count() > 0)
                                          value="{{$user->lawyer->lawyerCode}}"
                                         @endif/>
                                    </div> --}}

                                    <div class="col-xl-12 col-12 ">
                                        <label for="educated">Last education</label>
                                        <input type="text" name="educated" id="educated" class="form-control " 
                                        @if ($user->lawyer()->count() > 0) 
                                         value="{{$user->lawyer->educated}}"
                                        @endif />
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-xl-6 col-12 ">
                                        <label for="lawPlace">Lawyer's place</label>
                                        <input type="text" name="lawPlace" id="lawPlace" class="form-control "
                                        @if ($user->lawyer()->count() > 0)
                                            value="{{$user->lawyer->lawPlace}}"
                                        @endif   
                                        />
                                    </div>
    
                                    <div class="col-xl-6 col-12 ">
                                        <label for="skill">You'r expert</label>
                                        <input type="text" name="skill" id="skill" class="form-control "
                                        @if ($user->lawyer()->count() > 0)
                                            value="{{$user->lawyer->skill}}"
                                        @endif 
                                        />
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="avatar">Profile imgage</label>
                                    <input type="file" name="avatar" id="avatar" class="btn btn-outline-danger"/>
                                </div>
                                
                                <input type="submit" class="btn btn-outline-success" value="Complite" />

                        </form>
                       </div>

                     </div>
                   </div>
           </div>
    </div>  
</div>