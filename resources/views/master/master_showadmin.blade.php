@extends('layouts.app')
@include('template/bg_top')
@section('content')
<div class="container">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{url('/home')}}">ข้อมูลสมาชิกทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#menu1">สรุปรายการคะแนนเสียงทั้งหมด</a>
  </li>
</ul><br>
<div class="row">
      <div class="col-md-9">
          <div class="col-md-12 ">
              <div class="panel panel-info">
                  <div class="panel-heading">
                  <div class="row">
                    <div class="col col-xs-6">
                      <h3 class="panel-title">ตารางรายชื่อผู้ดูแลเขต</h3>
                    </div>
                  </div>
                  </div><!--/.panel-heading-->
                  <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-list">
                          <thead>
                            <tr>
                              <th></th>
                              <th class="hidden-xs">#</th>
                              <th>ชื่อผู้ดูแลเขต</th>
                              <th>ตำบล</th>
                              <th>อำเภอ</th>
                              <th>จังหวัด</th>
                              <th>คะแนนเสียง</th>
                              <th width="10%"><center><i class="fa fa-cog"></i></center></th>
                            </tr>
                          </thead>
                          @if(isset($admins))
                          @foreach($admins as $index => $admin)
                          <tbody>
                            <tr>
                              <td></td>
                              <td class="hidden-xs">{{$NUM_PAGE*($page-1) + $index+1}}</td>
                              <td><p>{{$admin->admin_name}}</p></td>
                              <td>{{$header->district}}</td>
                              <td>{{$header->amphoe}}</td>
                              <td>{{$header->province}}</td>
                              <td>10</td>
                              <td>
                              <center>
                                <a href="{{url('master/showarea')}}/{{$admin->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดงข้อมูลเขต</a>

                                {{csrf_field()}}
                              </center>
                              </td>
                            </tr>
                          </tbody>
                          @endforeach
                          @endif
                        </table><!--/.table-->
                      </div><!--/.table-responsive-->
                  </div><!--/.panel-body-->
                  <div class="panel-footer">
                  <div class="row">
                    <div class="col col-xs-4"></div>
                    <div class="col col-xs-8">
                      <ul class="pull-right">
                        {{ $admins->links() }}
                      </ul>
                    </div>
                  </div>
                </div>
              </div><!--/.panel-->
          </div>
    </div>
  <div class="col-sm-3">
  <div class="card">
    <h6 class="card-header">ค้นหาสมาชิก</h6>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">ชื่อ</label>
          <div class="col-sm-8">
            <select name="l" class="form-control">
              <option value="">ทั้งหมด</option>
              @if(isset($headers))
              @foreach($headers as $index => $header)
              <option value="{{$header->header_name}}">{{$header->header_name}}</option>
              @endforeach
              @else
              <option value="ทั้งหมด">ทั้งหมด</option>
              @endif
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
