@extends('layouts.app')
@include('template/bg_top')
@section('content')
<div class="container">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{url('/score')}}">ข้อมูลสมาชิกทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#menu1">สรุปรายการคะแนนเสียงทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/master/add')}}">เพิ่ม Header</a>
  </li>
</ul><br>
<div class="row">
  <div class="col-sm-9">ข้อมูลสมาชิกทั้งหมด</div>
  <div class="col-sm-3">
  <div class="card">
    <h6 class="card-header">ค้นหาสมาชิก</h6>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">ชื่อ</label>
          <div class="col-sm-8">
            <select name="l" class="form-control">
              <option value="">ทั้งหมด</option>
              <option value="70">กระบี่</option>
				      <option value="1">กรุงเทพมหานคร</option>
            </select>
          </div>

      </div>
      <div class="form-group row mb-0">
      <div class="col-sm-12">
					<input type="submit" class="btn btn-block btn-primary" value="ค้นหา">
				</div>
      </div>
      </div>
  </div>
  </div>
</div>
@endsection



@extends('template/footer')
