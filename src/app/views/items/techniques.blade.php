@section('title')
Flags - Cataclysm: Dark Days Ahead
@endsection
<div class="row">
  <div class="col-md-3">
<ul class="nav nav-pills nav-stacked tsort">
@foreach($techniques as $key=>$technique)
<li class="@if ($technique==$id) active @endif@"><a href="{{ route(Route::currentRouteName(), $technique) }}">{{{$technique}}}</a></li>
@endforeach
</ul>
  </div>
  <div class="col-md-9">
@if (!$id)
Please select an entry from the menu on the left.
@else
<ul class="list-unstyled">
@foreach($items as $item)
  <li>{{ $item->symbol }} <a href="{{route('item.view', $item->id)}}">{{ $item->name }}</a></li>
@endforeach
</ul>
@endif
</div>
</div>
<script>
$(function() {
  $(".tsort>li").tsort();
});
</script>
