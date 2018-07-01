@if(Auth::guard('web')->check())
 <p>
   master
 </p>
@else
 <p>
  no master
 </p>
@endif

@if(Auth::guard('admin')->check())
 <p>
   admin
 </p>
@else
<div class="links">
    <a href="{{ route('login') }}" class="btn default">Master</a>
    <a href="{{ url('header/login') }}" class="btn default">Header</a>
    <a href="{{ url('admin/login') }}" class="btn default">Admin</a>
</div>
@endif
