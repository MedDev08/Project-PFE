@if (session()->has('message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,2000)" 
    x-show="show"
    class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-success" 
    role="alert">
    {{session('message')}}
</div>
@endif