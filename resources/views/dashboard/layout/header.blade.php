 <div
   class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


   <h1 class="h2">{{ $title }}</h1>
   <div class="btn-toolbar mb-2 mb-md-0">

   </div>
 </div>

 @if (session()->has('success'))
   <div class="alert alert-info alert-dismissible fade show" role="alert">
     {{ session('success') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert"
       aria-label="Close"></button>
   </div>
 @endif
 @if (session()->has('deleted'))
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{ session('deleted') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert"
       aria-label="Close"></button>
   </div>
 @endif
 @if (session()->has('create'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('create') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert"
       aria-label="Close"></button>
   </div>
 @endif
