@extends('layouts.app_admin')
@section('content')
<div class="container">
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">หน้าแรก</a></li>
          <li class="breadcrumb-item active">เพิ่มผู้ดูแลเขต</li>
  </ol>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{url('admin')}}">ข้อมูลเขตที่รับผิดชอบทั้งหมด</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{url('admin/showscore')}}">รายการคะแนนเสียงทั้งหมด</a>
  </li>
</ul><br>
@if(isset($scores))
  <br>
    <form action="{{url('admin/action')}}" method="POST" role="form">
        <div class="col-md-12 ">
          <div align="right">
            <!-- admin -->
            <?php $index = 1 ;?>
            <button type="submit" name="update" value="update" id="update" class="btn btn-info btn-md" disabled="disabled"><span class="glyphicon glyphicon-edit"></span> อัพเดทคะแนน</button>
      			<button type="submit" name="delete" value="delete" id="delete" class="btn btn-danger btn-md" disabled="disabled" onclick="return confirm('ท่านต้องการลบคะแนนเขตนี้ใช่หรือไม่')">
            ลบคะแนน</button>
            {{csrf_field()}}
          </div>
          <br>
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-list">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="all" class="parent" data-group=".group"></th>
                            <th class="hidden-xs">#</th>
                            <th>ชื่อเขต</th>
                            <th>ตำบล</th>
                            <th>อำเภอ</th>
                            <th>จังหวัด</th>
                            <th width="15%">คะแนนเสียง</th>
                            <th>วันเลือกตั้ง</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($scores as $index => $score)
                          <tr>
                            <td>
                              <input type="hidden" name="{{$score->score_id}}">
                              <input type="checkbox" class="group" id="{{$score->score_id}}" name="checkbox[]" value="{{$score->score_id}}">
                            </td>
                            <td class="hidden-xs">{{$NUM_PAGE*($page-1) + $index+1}}</td>
                            <td>{{$score->area_name}}</td>
                            <td>{{$score->district}}</td>
                            <td>{{$score->amphoe}}</td>
                            <td>{{$score->province}}</td>
                            <td><input class="form-control" name="score[]" id="score{{$score->score_id}}" type="number" value="{{$score->score}}" disabled="disabled"></td>

                            <td>{{$score->date}}</td>

                          </tr>
                          @endforeach
                        </tbody>

                      </table><!--/.table-->
                    </div><!--/.table-responsive-->
                </div><!--/.panel-body-->
                <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4"></div>
                  <div class="col col-xs-8">
                    <ul class="pull-right">
                    </ul>
                  </div>
                </div>
              </div>
            </div><!--/.panel-->
        </div>

      </form>
@endif
    {{ $scores->links() }}



</div>

<script type="text/javascript">
  	$(".parent").click(function(index){
  	var group = $(this).data("group");
  	var parent = $(this);
  	parent = parent.change();
  	parent.change(function(){  //"select all" change
  		 $(group).prop('checked', parent.prop("click"));
  	});
  });

  $('input').on("click", function(e){
    var numbercheckbox = $('input[type=checkbox]').filter(':checked').length;
  	var idcheck = e.target.id;
    var group = $(this).data("group");
  		if(this.checked){
  			$('#score'+idcheck).removeAttr("disabled");
        $('#update').removeAttr("disabled");
        $('#delete').removeAttr("disabled");

  		}
  		else{
  			$('#score'+idcheck).attr("disabled", true);
        if(numbercheckbox == 0){
          $('#update').attr("disabled", true);
          $('#delete').attr("disabled", true);
        }

  		}
  });

</script>
@endsection

@extends('template/footer')
