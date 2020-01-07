@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-12 col-12">
            <div class="panel-box m-4 bg-light">

                <div class="row ml-4" >

                    <button class="btn text-success" style="font-size:20px" type="button"
                    data-toggle="modal" data-target="#update-user">
                        <i class="fas fa-user-cog"></i>
                    </button>
                    {{-- update user Modal --}}
                    <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="update-userTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-right" id="update-userTitle">Update Profile</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="fullName">Full name</label>
                                            <input type="text" name="fullName" id="fullName" class="form-control" value="{{ $user->fullName }}" />
                                        </div>
                                        <div class="col-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="address">Address(home or work)</label>
                                        <textarea class="form-control" name="address" id="address">{{ $user->address }}</textarea>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-success text-center" value="Update"/>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                    {{-- update user Modal --}}

                    

                    <button  class="btn text-danger" style="font-size:20px"
                     data-toggle="modal" data-target="#delete-user" type="button">
                        <i class="fas fa-user-times"></i>
                    </button>

                    <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                               
                                <div class="modal-body">
                                  <h4 class="text-right">Are you sure that you want to delete your account?</h4>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">No</button>
                                  <form method="POST" action="{{ route('user.delete' , ['user' => Auth::user()->id]) }}">
                                      @csrf
                                      @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-right">Delete</button>
                                  </form>  
                                </div>
                              </div>
                            </div>
                    </div>

                    <a href="{{ route('logout') }}" style="margin-top: 3vh" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i>
                  </a>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>

                <h4><i class="fas fa-user-tie"></i>&nbsp;{{ $user->fullName }}</h4>
                
                <div class="row">
                    <small class="col-12 text-secondary">
                      <i class="fas fa-phone"></i>&nbsp; Phone number : {{$user->phoneNumber}}<br/>
                       <i class="fas fa-user-check"></i> &nbsp;{{$user->userName}} : User name</h4><br/>
                     <i class="fas fa-paper-plane"></i>&nbsp; {{$user->email}}<br/>
                   <i class="fas fa-address-card"></i>&nbsp; {{$user->address}}<br/>
                    </small>
                </div> 
                
                <hr/> 
                
               
                    @if ($user->role=='person')
                        @include('layouts.personInfo.personInfo')
                    @elseif($user->role=='lawyer')
                        @include('layouts.lawyer.lawyerInfo')
                    @endif
               

            </div>

        </div>
        
        <div class="col-lg-8 col-xl-8 col-md-6 col-sm-12 col-12">
               <div class="m-4">
                    @if ($user->role=='person')
                        @include('layouts.person')
                    @elseif($user->role=='lawyer')
                        @include('layouts.lawyer')    
                    @endif
                </div>
        </div>


    </div>   
</div>
@endsection
