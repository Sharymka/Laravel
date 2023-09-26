
@if(session()->has('success'))
    <x-alert type ="success" :message = "session()->get('success')"/>
@elseif(session()->has('error'))
    <x-alert type ="error" :message = "session()->get('error')"/>
@endif

{{--<h1>DDDDDDDDDDDD</h1>--}}
{{--<x-alert type ="success" message = 'Gggggggggggg'></x-alert>--}}
