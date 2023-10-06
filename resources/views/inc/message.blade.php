
@if(session()->has('success'))
    @component('components.alert', ['type'=> 'success', 'message' => session('success')])
    @endcomponent
@elseif(session()->has('danger'))
    @component('components.alert', ['type'=> 'danger', 'message' => session('error')])
    @endcomponent
@endif

