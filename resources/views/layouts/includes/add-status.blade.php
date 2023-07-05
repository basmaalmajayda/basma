@if(session()->has('status'))
  @if(session('status'))
    <div><h4 style="color:#0d6927; margin-top:30px; margin-left:30px; "> Added Successfully </h4></div>
  @else
  <div><h4 style="color:#D90B0B; margin-top:30px; margin-left:30px; "> Add Failed! </h4></div>
  @endif
@endif