@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end align-items-center main-content">
   <div class="row">
       <div class="col-md-12">
        <h1 style="font-size: 70px;">Welcome To Dynamic Excel Importer</h1>
       </div>
       <div class="col-md-12">
           <a class="btn btn-primary" href="{{ route('files.index') }}">Impoer Excel</a>
           <a class="btn btn-success ml-4" href="{{ route('files.index') }}">View All Files</a>
       </div>
   </div>
</div>
@endsection
