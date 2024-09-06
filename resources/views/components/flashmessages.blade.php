
@vite('resources/css/app.css')

@session('success')
<!--<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $value }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>!-->
<div class="border-b border-t border-blue-500 bg-blue-100 px-4 py-3 text-blue-700" role="alert">
  <p class="font-bold"> {{ $value }}</p>
  <p class="text-sm"> {{ $value }}</p>
</div>
@endsession
      
@session('error')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $value }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession
       
@session('warning')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ $value }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession
       
@session('info')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{ $value }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession
      
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please check the form below for errors</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
