@extends('layouts.app_header')
<style>
body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    width: 400px;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
@section('content')
<div class="container">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('header')}}">หน้าแรก</a></li>
          <li class="breadcrumb-item active">รายการคะแนนเสียงทั้งหมด</li>
  </ol>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{url('/header')}}">ข้อมูลสมาชิกทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('/header/total')}}">รายการคะแนนเสียงทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('header/selectarea')}}">กรอกข้อมูลเขตการดูแล</a>
  </li>
</ul><br>
@foreach($admins as $index => $admin)
<?php
  foreach ($admin->score_admin as $key => $value) {
    $sum[] = $value->score;
  }
?>
@endforeach
<?php
$total = 0;
  for($i=0;$i<count($sum);$i++){
    $total += $sum[$i];
  }
?>
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h3 class="m-b-20">คะแนนเสียงเลือกตั้งรวม</h3>
                <h6 class="m-b-20"><strong>จังหวัด</strong> {{$header->district}}</h6>
                <h6 class="m-b-20"><strong>อำเภอ</strong> {{$header->amphoe}}</h6>
                <h6 class="m-b-20"><strong>ตำบล</strong>  {{$header->province}}</h6>
                <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{$total}} คะแนน</span></h2>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
