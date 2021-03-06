@extends('layouts.masterLayout')




@section('title', 'Add User Account | Pedix')

<style type="text/css">

  div#patientListing:hover
  {
     background-color: #E3E3E3;
  }

</style>
@section('content')
<section class="content-header">
  <h1> Add User Account</h1>
</section>

  <div class="panel panel-default" style="margin-top:20px">
      <div class="panel-body" >
                <form action="/add_account" method="POST" role="form" class="form-horizontal">
                          {!! csrf_field() !!}
                          <div class="row form-group">
                            <div class="col-lg-4">
                                  <label for="text">Firstname:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('firstname'))
                          <span class="error" style="color: red">{{ $errors->first('firstname') }}</span>
                      @endif
                                  <input value="{{old('firstname')}}" type="text" name="firstname" class="form-control" placeholder="Firstname">
                            </div>

                            <div class="col-lg-4">
                                  <label for="text">Middlename:</label>
                      @if($errors->has('middlename'))
                          <span class="error" style="color: red">{{ $errors->first('middlename') }}</span>
                      @endif
                                  <input value="{{old('middlename')}}" type="text" name="middlename" class="form-control" placeholder="Middlename">
                            </div>
                            <div class="col-lg-4">
                                  <label for="text">Lastname:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('lastname'))
                          <span class="error" style="color: red">{{ $errors->first('lastname') }}</span>
                      @endif
                                  <input value="{{old('lastname')}}" type="text" name="lastname" class="form-control" placeholder="Lastname">
                            </div>
                          </div>   

                          <div class="row form-group">  
                              <div class="col-lg-6"> 
                                  <label for="text">Gender:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('gender'))
                          <span class="error" style="color: red">{{ $errors->first('gender') }}</span>
                      @endif
                                  <select type="text" class="form-control" name="gender">
                                    <option value selected disabled>Select Gender ...</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                  </select>
                              </div>
                            <div class="col-lg-6">
                                  <label for="text">Birthdate:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('birthdate'))
                          <span class="error" style="color: red">{{ $errors->first('birthdate') }}</span>
                      @endif
                                  <div class="input-group">
                                    <input value="{{old('birthdate')}}" type="text" name="birthdate" readonly class="form-control" id="idTourDateDetails" placeholder="Click here to pick a birthdate">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="number">License Number:</label>
                      @if($errors->has('license_number'))
                          <span class="error" style="color: red">{{ $errors->first('license_number') }}</span>
                      @endif
                                <input value="{{old('licence_number')}}" type="number" name="license_number" class="form-control" placeholder="License Number">
                            </div>
                            <div class="col-lg-4">
                                <label for="number">PTR:</label>
                      @if($errors->has('ptr_number'))
                          <span class="error" style="color: red">{{ $errors->first('ptr_number') }}</span>
                      @endif
                                <input value="{{old('ptr_number')}}" type="number" name="ptr_number" class="form-control" placeholder="PTR License">
                            </div>
                            <div class="col-lg-4">
                                <label for="number">S2 License Number:</label>
                      @if($errors->has('s2_license'))
                          <span class="error" style="color: red">{{ $errors->first('s2_license') }}</span>
                      @endif
                                <input value="{{old('s2_license')}}" type="number" name="s2_license" class="form-control" placeholder="S2 License Number">
                            </div>
                          </div>

                          <div class="row form-group">
                              <div class="col-lg-6">
                                  <label for="text">Specialty:&nbsp</label>
                      @if($errors->has('specialties_name'))
                          <span class="error" style="color: red">{{ $errors->first('specialties_name') }}</span>
                      @endif
                                  <input value="{{old('specialties_name')}}" type="text" name="specialties_name" class="form-control" placeholder="Specialty">
                              </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="text">Mobile Number:&nbsp</label>
                      @if($errors->has('mobile_number'))
                          <span class="error" style="color: red">{{ $errors->first('mobile_number') }}</span>
                      @endif
                                <input value="{{old('mobile_number')}}" type="text" name="mobile_number"  placeholder="Mobile Number" class="form-control input-medium bfh-phone" data-format="dddd ddd-dddd" aria-describedby="basic-addon1" value="">
                            </div>
                            <div class="col-lg-4">
                                <label for="text">Email Address:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('email'))
                          <span class="error" style="color: red">{{ $errors->first('email') }}</span>
                      @endif
                                <input value="{{old('email')}}" type="text" name="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="col-lg-4">
                                <label for="password">Password:&nbsp<span style="color:red">*</span></label>
                      @if($errors->has('password'))
                          <span class="error" style="color: red">{{ $errors->first('password') }}</span>
                      @endif
                                <input value="{{old('password')}}" type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <br>
                          <div class="form-group row">
                            <div class="col-lg-6 pull-right">
                              <div class="col-lg-4 pull-right">
                                  <input type="submit" name="edit" class="form-control btn btn-primary" value="Add User">
                              </div>
                              <div class="col-lg-4 pull-right">
                                  <a href="/pediatrician" type="submit" name="cancel" class="form-control btn btn-default">Cancel</a>
                              </div>
                            </div>
                          </div>
              </form>
    </div>
</div>


@stop