@extends('layouts.masterLayout')
@section('title', 'Analytics | Pedix')
@section('content')


<section class="content-header">
            <h1>
              Overview
            </h1>
            <ol class="breadcrumb">
             <a href="/register" style="color: white;font-weight: bold;" class="btn btn-success"> <span class="
glyphicon glyphicon-plus-sign"></span> Add Patient</a>        
            </ol>
  </section>

<hr>
  @if(session('visit'))
          <small style=" padding-top: 5px;color: white;background-color: red;font-style: italic;" class="box-title alert alert-{{session ('visit.type')}} form-control" >
                                    {{session('visit.text')}}
          </small>
             
      @endif
        @if(session('message'))
            <p style="padding-top: 5px;color: white;background-color: red;font-style: italic;" class="alert alert-{{session ('message.type')}} form-control" >
                    {{session('message.text')}}
            </p>
        @endif

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
          <p style="margin: 0 15px 10px;"><b>Patient Overview</b></p>
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
                  <i class="ion ion-android-contact"></i>
                </div>
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
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$counts->totalPractitioner}}</h3>
                  <p>Total Practitioners</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-md"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div>
          <!-- DONUT CHART -->
            <div class="row container-fluid">
              <div class="col-xs-6">
                <div class=" box box-default">
                  <div class="box-header with-border">
                    <p><b>Services</b></p>
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
                    <p><b>Male to Female Patient Comparison</b></p>
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
            
</div>
</div>


@stop