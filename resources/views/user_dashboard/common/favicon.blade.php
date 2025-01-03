@php
$favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
@endphp

<link rel="icon" type="image/x-icon" href="{{url('public/logos/'.$favicon->image)}}">
<link rel="icon" type="image/x-icon" href="{{url('public/logos/'.$favicon->image)}}">
