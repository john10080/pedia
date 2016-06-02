@extends('layouts.masterLayout')


@section('title', 'Dashboard | Patient Files')
@section('content')

<section class="content-header">
            <h1>
              Overview
              <small>Patient Files</small>
            </h1>
            <ol class="breadcrumb">
             <a href="/register" style="color: white;font-weight: bold;" class="btn btn-success"> <span class="
glyphicon glyphicon-plus-sign"></span> Add Patient</a>
           
            </ol>
  </section>

<hr>


<!-- Modal -->
<div id="myModal" class="modal fade bs-example-modal-lg" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content -->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: white ;font-weight: bold;">Available Medicine</h4>
      </div>
      <div class="modal-body">
        
          <table data-toggle="table"
                       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
                    
                       data-search="true"
                       data-show-refresh="true"
                       data-show-toggle="true"
                       data-show-columns="true">
                  <thead>
                  <tr>
                      <th >Item ID</th>
                      <th >Item Name</th>
                      <th >Amount</th>
                       <th >Quantity</th>
                  </tr>
                  </thead>

                     <tbody>
                     
                          <tr role = "row">
                            <td> 1001 </td>
                            <td> ARM 101 </td>
                            <td> 100.00 </td>
                            <td>
                             <div class="progress">
                            
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                      20%
                                </div>
                              </div>
                            </td>                          
                          </tr>
                           <tr role = "row">
                            <td> 1002 </td>
                            <td> AAD 101 </td>
                            <td> 100.00 </td>
                            <td>
                             <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                  70%
                                </div>
                              </div>
                            </td>                          
                          </tr>
                           <tr role = "row">
                            <td> 1003 </td>
                            <td> DNB 101 </td>
                            <td> 100.00 </td>
                            <td>
                             <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                  50%
                                </div>
                              </div>
                            </td>                          
                          </tr>
                           <tr role = "row">
                            <td> 1004 </td>
                            <td> AMR 15 </td>
                            <td> 100.00 </td>
                            <td>
                             <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  60%
                                </div>
                              </div>
                            </td>                          
                          </tr>
                        
                    </tbody>  


        </table>
         


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>

         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Area Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>

         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Area Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>

         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Area Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- END MODAL -->


<div class="box box-default container-fluid">
   <div class="box-header with-border">
                    <h3 class="box-title"><b>Clinic Analytics</b></h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
           <div class="box-body chart-responsive">         

  <div class="row container-fluid">
          <p><b>Patient Overview</b></p>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$counts->totalPatients}}</h3>
                  <p >Registered Patients</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer "  data-toggle="modal" data-target="#myModal" >
                  More info <i class="fa fa-arrow-circle-right "></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$counts->avgPatientDaily}}</h3>
                  <p>Average Patient per Day </p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-contacts"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal2">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$counts->avgPatientAge}}</h3>
                  <p>Average Age of Patients </p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-contacts"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal3">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$counts->totalCancelledAppointment}}</h3>
                  <p>Cancelled Appointments</p>
                </div>
                <div class="icon">
                  <i class="ion ion-close-circled"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal4">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div>


          <!-- DONUT CHART -->
            <div class="row container-fluid">
              <div class="col-xs-6">
                <div class=" box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Services</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body chart-responsive">
                    <div class="chart" id="sales-chart2" style="height: 300px; position: relative;"></div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div> 

               <div class="col-xs-6">
                <div class=" box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Male to Female Patient Comparison</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body chart-responsive">
                    <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>  


            </div>  


            <div class="row container-fluid">
            <p><b>Accounts Overview</b></p>
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                    <small>Total Accounts:</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$counts->totalAccounts}}"
                      aria-valuemin="0" aria-valuemax="{{$counts->totalAccounts}}" style="width:100%">
                        {{$counts->totalAccounts}} &nbsp (100%)
                      </div>
                    </div>
                    <small>Practitioners:</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{$counts->totalPractitioner}}"
                      aria-valuemin="0" aria-valuemax="{{$counts->totalAccounts}}" style="width:{{number_format(($counts->totalPractitioner/$counts->totalAccounts) * 100, 0 )}}%">
                        {{$counts->totalPractitioner}}&nbsp({{round(($counts->totalPractitioner/$counts->totalAccounts)*100)}}%)
                      </div>
                    </div>
                    <small>Nurses:</small>
                    <div class="progress ">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{$counts->totalNurse}}"
                      aria-valuemin="0" aria-valuemax="{{$counts->totalAccounts}}" style="width:{{number_format(($counts->totalNurse/$counts->totalAccounts) * 100, 0 )}}%">
                        {{$counts->totalNurse}}&nbsp({{round(($counts->totalNurse/$counts->totalAccounts)*100)}}%)
                      </div>
                    </div>
                    <small>Radiology Techs:</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$counts->totalRadTech}}"
                      aria-valuemin="0" aria-valuemax="{{$counts->totalAccounts}}" style="width:{{number_format( ($counts->totalRadTech/$counts->totalAccounts) * 100, 0 )}}%">
                        {{$counts->totalRadTech}}&nbsp({{round(($counts->totalRadTech/$counts->totalAccounts)*100)}}%)
                      </div>
                    </div>
                    <small>Others:</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="{{($counts->totalAccounts)-(($counts->totalPractitioner)+($counts->totalNurse)+($counts->totalRadTech))}}"
                      aria-valuemin="0" aria-valuemax="{{$counts->totalAccounts}}" style="width:{{round(((($counts->totalAccounts)-(($counts->totalPractitioner)+($counts->totalNurse)+($counts->totalRadTech)))/($counts->totalAccounts))*100)}}%">
                        {{($counts->totalAccounts)-(($counts->totalPractitioner)+($counts->totalNurse)+($counts->totalRadTech))}}&nbsp({{round(((($counts->totalAccounts)-(($counts->totalPractitioner)+($counts->totalNurse)+($counts->totalRadTech)))/($counts->totalAccounts))*100)}}%)
                      </div>
                    </div>
                   </div>
                  </div>  
                </div>
            </div>

</div>
</div>



	<section class="content-header">
	          <h1>
	            What's Happening - {{date('F d, Y',strtotime($time))}}
	      
	          </h1>
	         
	</section>

<br>

 <div class="panel panel-default"  >
  <div class="panel-body" >

        <div class="row container-fluid" >
          
        <form class="form-inline" style="padding: 0px 10px;">
          <div class="form-group"  style="float: right;padding-top: 13px">
            
              

          </div>
        </form>    


                <div class="box-body table-responsive" >
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table data-toggle="table"
       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true" id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                     <h4 class="pull-left">Reminders</h4>
                     <thead>
                      <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Patient ID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Patient Name</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Time of Appointment</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th></tr>
                    </thead>
                    <tbody>
                      </tbody>
                  </table></div></div></div>
                </div><!-- /.box-body -->
            </div>
       </div>
</div>     


<hr>


<!-- SECOND Table -->

   <div class="panel panel-default" >
  <div class="panel-body" >
        <div class="row container-fluid" >
          
        <form class="form-inline" style="padding: 0px 10px;">
          <div class="form-group"  style="float: right;padding-top: 13px">
            
              

          </div>
        </form>    


                <div class="box-body table-responsive" >
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table data-toggle="table"
       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
       data-search="true"
       data-sort-name ="Checked In Date"
       data-sort-order ="desc"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true" id="table2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <h4 class="pull-left">Recent Visits by Each Patients</h4>
                    <thead >
                      
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Patient ID</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Patient Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Chief Complaints</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Consultation Start</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Consultation End</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th></tr>
                      
                    </thead>
                    <tbody>
                      @foreach($consults as $consult)
                          @if (! $consult->patient_appointments)

                          @else
                            @if (strcasecmp($consult->patient_appointments[0]->type, 'consultation') == 0)
                              <tr role="row">
                                <td>{{$consult->id}}</td>
                                <td>{{$consult->user->firstname .' '. $consult->user->lastname}}</td>
                                <td>{{$consult->patient_appointments[0]->chief_complaints}}</td>
                                <td>{{$consult->patient_appointments[0]->consultation_start}}</td>
                                <td>{{$consult->patient_appointments[0]->consultation_end}}</td>
                                <td>{{$consult->patient_appointments[0]->status}}</td>
                              </tr>
                            @endif 
                          @endif
                      @endforeach
                    </tbody>
                  </table></div></div>

                

                  </div>
                </div><!-- /.box-body -->
            </div>
       </div>
</div>     

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
 <script >
          var donut = new Morris.Donut({
          element: 'sales-chart2',
          resize: true,
          colors: ["#3c8dbc", "#f56954", "#05a65a", "#333"],
          data: [
            {label: "Consultations", value: {{$counts->totalConsultations}}},
            {label: "Laboratory", value: {{$counts->totalLaboratory}}},
            {label: "Imaging Processed", value: {{$counts->totalImaging}}}
          ],
          hideHover: 'auto'
        });
</script>

 <script >
          var male = {{$counts->totalMaleFemalePatient[0]->MALE}};
          var female = {{$counts->totalMaleFemalePatient[0]->FEMALE}};
          var total = male + female;
          var aveM =Math.round((male/total)*100);
          var aveF =Math.round((female/total)*100);
          var donut = new Morris.Donut({
          element: 'sales-chart',
          resize: true,
          colors: ["#00c0ef", "#ca87be", "#00a65a","#444"],
          data: [
            {label: "Male ("+aveM+"%)", value: {{$counts->totalMaleFemalePatient[0]->MALE}}},
            {label: "Female ("+aveF+"%)", value: {{$counts->totalMaleFemalePatient[0]->FEMALE}}},
          ],
          hideHover: 'auto'
        });
</script>


@stop