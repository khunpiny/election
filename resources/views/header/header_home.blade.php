@extends('layouts.app_header')
@section('content')
<div class="container">
  <ol class="breadcrumb">
        <h7>Header</h7>
  </ol>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{url('/header')}}">ข้อมูลสมาชิกทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/header/total')}}">รายการคะแนนเสียงทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('header/selectarea')}}">กรอกข้อมูลเขตการดูแล</a>
  </li>
</ul><br>
<div class="row">
  <div class="col-sm-9">
    <div class="col-md-12 ">
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">ตารางรายชื่อสมาชิก</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href = "{{url('header/register')}}" class="btn btn-sm btn-primary btn-create">เพิ่มสมาชิก</a>
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
                            <th>ชื่อสมาชิก</th>
                            <th>ตำบล</th>
                            <th>อำเภอ</th>
                            <th>จังหวัด</th>
                            <th>คะแนนเสียง</th>
                            <th width="27%"><center><i class="fa fa-cog"></i></center></th>
                          </tr>
                        </thead>
                        @foreach($admins as $index => $admin)
                        <tbody>
                          <tr>
                            <td width="7%"><img class="img-rounded img-responsive center-block" src="{{url('uploads')}}/{{$admin->image}}" width="100%"></td>
                            <td class="hidden-xs">{{$NUM_PAGE*($page-1) + $index+1}}</td>
                            <td>
                              @if($admin->status == "1")
                               <font color="green"> &#9679; </font>{{$admin->admin_name}}
                              @else
                               <font color="red"> &#9679; </font>{{$admin->admin_name}}
                              @endif
                            </td>
                            <td>{{$header->district}}</td>
                            <td>{{$header->amphoe}}</td>
                            <td>{{$header->province}}</td>
                            <?php $sum = 0;
                              foreach ($admin->score_admin as $key => $value) {
                                $sum = $sum + $value->score;
                              }
                            ?>

                            <td>{{ $sum }}</td>
                            <td>
                              <a href="{{url('header/show/')}}/{{$admin->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
                              <a href="header/edit/{{$admin->id}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> แก้ไข</a>
                              @if($admin->status == "1")
                              <a href="{{url('/header/block')}}/{{$admin->id}}" class="btn btn-success btn-sm" onclick="return confirm('ท่านต้องการบล็อกสมาชิกใช่หรือไม่ ?')"><i class="fa fa-trash"></i>บล็อก</a>
                              @else
                              <a href="{{url('/header/block')}}/{{$admin->id}}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการปลดบล็อกสมาชิกใช่หรือไม่ ?')"><i class="fa fa-trash"></i>ปลดบล็อก</a>
                              @endif
                              {{csrf_field()}}
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
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
    <form action="{{url('/header')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
    <h6 class="card-header">ค้นหาสมาชิก</h6>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">ชื่อ</label>
          <div class="col-sm-8">
              <input class="form-control" name="key" type="text" autocomplete="off">
          </div>
      </div>
      <div class="form-group row mb-0">
      <div class="col-sm-12">
					<input type="submit" class="btn btn-block btn-primary" value="ค้นหา" >
				</div>
      </div>
      </div>
    </form>
  </div>
  </div>
</div>


@endsection

@extends('template/footer')
