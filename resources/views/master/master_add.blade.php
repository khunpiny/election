@extends('template/header')
<style>
 body, html {
     height: 100%;
     margin: 0;
 }

 .bg {
     /* The image used */
     background-image: url({{ asset('image/bg_top.png') }});

     /* Full height */
     height: 30%;

     /* Center and scale the image nicely */
     background-position: center;
     background-repeat: no-repeat;
     background-size: cover;
 }
 </style>

<div class="bg"></div><br>
<div class="container">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{url('/score')}}">ข้อมูลสมาชิกทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#menu1">สรุปรายการคะแนนเสียงทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('/master/add')}}">เพิ่ม Header</a>
  </li>
</ul><br>
<div class="row">
  <div class="col-sm-8">col-sm-8</div>
  <div class="col-sm-4">เพิ่ม Header</div>
</div>
</div>




@extends('template/footer')
