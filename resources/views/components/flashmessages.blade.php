
@session('success')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800" role="alert">
  <span class="sr-only">Sucesso</span>
  <div>
    <span class="font-medium">Sucesso!</span> {{ $value }}
  </div>
</div>
@endsession
      
@session('error')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800" role="alert">
  <span class="sr-only">Não autorizado</span>
  <div>
    <span class="font-medium">Não autorizado!</span> {{ $value }}
  </div>
</div>
@endsession
       
@session('warning')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-yellow-300 bg-yellow-50 p-4 text-sm text-yellow-800" role="alert">
  <span class="sr-only">Sucesso</span>
  <div>
    <span class="font-medium">Sucesso!</span> {{ $value }}
  </div>
</div>
@endsession
       
@session('info')
<div id="alertDiv" class="mb-4 mt-4 flex items-center rounded-lg border border-blue-300 bg-blue-50 p-4 text-sm text-blue-800" role="alert">
  <span class="sr-only">Sucesso</span>
  <div>
    <span class="font-medium">Sucesso!</span> {{ $value }}
  </div>
</div>
@endsession
      
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please check the form below for errors</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
