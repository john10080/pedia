@extends('layouts.masterLayout')


@section('title', 'Patient Profile | Patient Files')
@section('content')

        <section class="content-header">
          <h1>
           Patient Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>




        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="/img/prof_pic.png" alt="User profile picture">
                  <h3 class="profile-username text-center">{{$prof->user->firstname." ".$prof->user->lastname}} </h3>
                  <p class="text-muted text-center">{{$prof->user->nickname}}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Patient ID</b> <a class="pull-right badge bg-blue">{{$prof->id}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Nickname</b> <a class="pull-right badge bg-blue">{{$prof->user->nickname}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Birth Date</b> <a class="pull-right badge bg-blue">{{ $prof->user->birthdate }}</a>
                    </li>
                    <li class="list-group-item">
                      <strong>Address:</strong><a class="pull-right badge bg-blue">{{$address}}</a>
                    </li>
                    <br>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Patient Latest Vitals</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <h5> <strong>Date Recorded:</strong> <p class="pull-right">{{date('F d, Y', strtotime($recentVitals->created_at))}}</p> </h5>
                 <h5> Height (cm): <p class="pull-right">{{$recentVitals->height}}</p> </h5>
                 <h5> Weight (kg): <p class="pull-right">{{$recentVitals->weight}}</p> </h5>
                 <h5> BMI : <p class="pull-right">{{$bmi}}</p> </h5>
                 <h5> Pulse Rate : <p class="pull-right">{{$recentVitals->pulserate}}</p> </h5>
                 <h5> Respiratory Rate : <p class="pull-right">{{$recentVitals->respiratoryrate}}</p> </h5>
                 <h5> Body Temperature (c): <p class="pull-right">{{$recentVitals->bodytemperature}}</p> </h5>
                 <h5> Blood Pressure : <p class="pull-right">{{$recentVitals->bloodpressure_sys.'/'.$recentVitals->bloodpressure_dia}}</p> </h5>

                 <hr>

                 <strong><i class="fa fa-file-text-o margin-r-5"></i> Doctor's Notes</strong>
                 <p>{{$recentVitals->notes}}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->






            <div class="col-md-9">  <!-- COLUMN FOR TABLES (TABS) -->
            
              <div >                  
                           @if(session('success'))
                            <small style=" padding-top: 5px;color: white;background-color: red;font-style: italic;" class="box-title alert alert-{{session ('success.type')}} form-control" >
                                    {{session('success.text')}}
                                  </small>
                               
                              @endif
              </div>


              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#visits" data-toggle="tab">Visit History</a></li>
                  <li><a href="#vitals" data-toggle="tab">Vitals Records</a></li>
                </ul>
                   

            <div class=" tab-content">   <!-- START TAB CONTENT -->
               
                     <div class="active tab-pane" id="visits">  <!--  START OF VISITS TAB -->
          
                      <div class="panel panel-default" >
                          <div class="panel-body" >
                            <div class="row container-fluid" > 
                                
           
                      <div style="height: 566px;" id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table style="height: 566px;" data-toggle="table"
                       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
                    
                       data-search="true"
                       data-show-refresh="true"
                       data-show-toggle="true"
                       data-show-columns="true" id="table2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                      <h3 class="box-title pull-left" >Visit History</h3> 
                      <thead>
                      <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Consultation Date</th>
                      <th class="sorting_asc" tabindex="0" aria-controlsne: activate to sort column descending style="width: 177px;" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engi">Reason</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Subjective</th>
                      
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 152px;">Objective</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Assessment</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Plan</th>
                      
                    </thead>
                    <tbody>
                      @foreach ($consult as $appoint)
                          @if (! is_object($appoint->consultation))

                          @else
                          <tr role = "row">
                            <td><b>{{date('F d, Y', strtotime($appoint->appointment_date))}}</b></td>
                            <td>{{$appoint->chief_complaints}}</td>
                            <td>{{$appoint->consultation->subjective}}</td>
                            <td>{{$appoint->consultation->objective}}</td>
                            <td>{{$appoint->consultation->assessment}}</td>
                            <td>{{$appoint->consultation->plan}}</td>
                          
                          </tr>
                          @endif
                      @endforeach
                    </tbody>    

                

                  </table></div></div></div>
              
                                
                            </div>
                          </div>          
                      </div>    
                    
                </div><!-- END VISITS TAB -->
                <!-- START VITALS TAB -->
                     <div class="tab-pane" id="vitals">
          
                      <div class="panel panel-default" >
                          <div class="panel-body" >
                            <div class="row container-fluid" >
                      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table data-toggle="table"
                       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
                       data-card-view="true"
                       data-search="true"
                       data-show-refresh="true"
                       data-show-toggle="true"
                       data-show-columns="true" id="table2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                      <h3 class="box-title pull-left" >Vitals Record</h3> 
                      <thead>
                      <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controlsne: activate to sort column descending style="width: 177px;" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engi">Date Recorded</th>
                      <th class="sorting_asc" tabindex="0" aria-controlsne: activate to sort column descending style="width: 177px;" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engi">Height</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Weight</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 152px;">Pulserate</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Respiratory</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Body Temperature</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Blood Presure</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Doctor Notes</th>
                      
                    </thead>
                    <tbody>
                      @foreach ($vitals as $vital)
                        <tr>
                          <td> <b>{{date('F d, Y', strtotime($vital->general->created_at))}} </b></td>
                           <td> {{$vital->general->height.' cm.'}} </td>
                           <td> {{$vital->general->weight.' kg.'}} </td>
                           <td> {{$vital->general->pulserate}} </td>
                           <td> {{$vital->general->respiratoryrate}} </td>
                           <td> {{$vital->general->bodytemperature}}&nbsp&deg c</td>
                           <td> {{$vital->general->bloodpressure_sys.'/'.$vital->general->bloodpressure_dia}} </td>
                           <td> {{$vital->general->notes}} </td>
                        </tr> 
                      @endforeach
                    </tbody>
                    

                  </table></div></div></div>
              
                                
                            </div>
                          </div>          
                      </div>    
                    
                </div><!-- END VITALS TAB -->
              </div><!-- END TAB CONTENT -->
            </div><!-- End NAV TABS -->
          </div><!-- /.row  col-lg-9  -->
            </div> <!-- END MAIN ROW -->
        </section><!-- /.content -->


@stop
