@extends('layouts.masterLayout')
@section('title', 'Patient List | Patient Files')
<style type="text/css">
div#patientListing:hover
  {
     background-color: #E3E3E3;
  }

</style>
@section('content')

  <section class="content-header" style="margin-bottom:10px">
      <h1>Patient List</h1>
  </section>
	 
    @if(session('message'))
        <p style="padding-top: 5px;color: white;background-color: red;font-style: italic;" class="alert alert-{{session ('message.type')}} form-control" >
                {{session('message.text')}}
        </p>
    @endif

	<div class="panel panel-default" style="margin-top:20px;">
  <div class="panel-body" >
       <div class="input-group pull-right" style="width: 50%" >              
             <input id="search-criteria"  type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
            <input type="button" id="search" class="form-control" value="search"/>
            </span>
      </div>
      <br>
      <br>
      <hr>
<!-- MODAL -->
<!-- CARD TABLE -->
             @foreach($patients as $patient)  
           <div   class="row container-fluid contact-name"    id="patientListing" >
             <ul style="padding:0;" class="patient-list-style">      <!-- START UL -->           
                <li style="list-style: none;"  > <!-- START LI -->   
                    <div class="row"> <!-- START ROW -->   
                      <div class="col-md-3 " > <!-- START IMG -->
                          <img   class="img-circle" src="/img/generic.png" style="width: 160px" >
                      </div> <!-- END IMG -->        
                      <div class="col-md-9" > <!--Start 9 COLUMNS -->
                         <div class="row"> 
                              <div class="col-md-6" > <!-- START 8 COLUMNS -->
                                  <h3 ><strong >{{ $patient->user->firstname." ".$patient->user->lastname}}</strong>
                                  </h3>
                                  <div style="color:#848688;" ><small ><b >Patient ID: &nbsp</b><span >{{ $patient->id }}</span></small>
                                  </div>
                                   @if ($patient->user->gender == 0)  
                                  <div style="color:#848688;" ><small > <b >Gender: &nbsp</b>{{ "Female" }}</small>
                                  </div>
                                   @endif
                                    @if ($patient->user->gender == 1)  
                                  <div style="color:#848688;" ><small >  <b >Gender: &nbsp</b>{{ "Male" }}</small>
                                  </div>
                                   @endif
                                  <div style="color:#848688;"><small >  <b >Birth Date:&nbsp</b>{{date('F d, Y',strtotime($patient->user->birthdate))}}</small>
                                  </div>
                                  <div style="color:#848688;" ><small >
                                  <b >Date Registered:</b><span > </span><span >{{date('F d, Y',strtotime($patient->user->created_at))}}</span><span > </span></small><span>&nbsp;</span><small ><b >Last Visit:</b><span > </span><span >{{$patient->user->created_at}}</span><span > </span></small>
                                  </div>
                              </div> <!-- END 8 COLUMNS -->
                                    @if (!$patient->patient_appointments)
                                    <div class="col-lg-6 container-fluid"  style="padding-top: 40px"> <!-- START cl4 -->
                                          <div class="btn-group" role="group">  
                                            <a class="btn btn-default" href="patientProfile/{{$patient->id}}" >View Patient</a>
                                            <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#newVisit-{{$patient->id}}">New Visit</a>
                                            <a class="btn btn-default" href="patient/edit_patient/{{$patient->id}}" >Edit Patient</a>
                                          </div>        
                                     </div>
                                    @else
                                     <div class="col-lg-6 container-fluid"  style="padding-top: 40px"> <!-- START cl4 -->
                                          <div class="btn-group" role="group">      
                                            <a class="btn btn-default" href="patientProfile/{{$patient->id}}" >View Patient</a>
                                            <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#patientVisit-{{$patient->id}}">Patient Visit</a>
                                            <a class="btn btn-default" href="patient/edit_patient/{{$patient->id}}" >Edit Patient</a>
                                          </div>        
                                     </div>
                                     @endif  <!-- END cl 4 -->
                          </div>                            
                      </div> <!--END 9 Columns -->
                    </div> <!-- END ROW -->
                 </li>  <!-- END LI -->
               </ul> <!-- END UL -->   
           </div>  <!-- END WHOLE ROW -->   
<div id="newVisit-{{$patient->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form action="/new_appointment" method="POST">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white">Patient Visit</h4>
        </div>
        <div class="modal-body">
            <strong>Chief Complaints<span style="color: red">*</span></strong>
            @if($errors->has('chief_complaints'))
                    <span class="error" style="color: red">{{ $errors->first('chief_complaints') }}</span>
                @endif
                {!! csrf_field() !!}
            <input type="text" name="chief_complaints" class="form-control" placeholder="Chief Complaint" aria-describedby="basic-addon1" required>
            <input type="hidden" name="patient_id" class="form-control" placeholder="Chief Complaint" aria-describedby="basic-addon1" value="{{ $patient->id }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Start Visit" />
        </div>
      </div>
    </form>
  </div>
</div>
<div id="patientVisit-{{$patient->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form action="/old_appointment" method="POST" role="form">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: white">Patient Visit</h4>
      </div>
      <div class="modal-body">
              <strong>Purpose<span style="color: red">*</span></strong>
              @if($errors->has('purpose_id'))
                      <span class="error" style="color: red">{{ $errors->first('purpose_id') }}</span>
                  @endif
                {!! csrf_field() !!}
              <select class="form-control" name="purpose_id" style="height: 34px; width:100%" required>
                    <option value disabled selected>Select...</option>
                    <option value="2">Old Patient Visit</option>
                    <option value="3">Follow-up Visit</option>
             </select>
      </div>
      <div class="modal-body">
                  <strong>Chief Complaints<span style="color: red">*</span></strong>
                  @if($errors->has('chief_complaints'))
                          <span class="error" style="color: red">{{ $errors->first('chief_complaints') }}</span>
                      @endif
                    <input type="text" name="chief_complaints" class="form-control" placeholder="Chief Complaint" aria-describedby="basic-addon1" required>                  
                    <input type="hidden" name="patient_id" class="form-control" placeholder="Chief Complaint" aria-describedby="basic-addon1" value="{{ $patient->id }}">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Start Visit" />
      </div>
    </div>
</form>
  </div>
</div>
       @endforeach   
          <!-- END CARD TABLE -->    
       </div>
</div>     
@stop