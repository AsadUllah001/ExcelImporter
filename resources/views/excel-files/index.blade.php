@extends('layouts.app')

@section('content')
<div class="row mt-5 p-5">
    <div class="col-md-12">
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="col-md-11">
                    <div class="custom-file mb-5">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file e.g (xls, xlsx, csv)</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Total Record In File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($files as $key => $file)
                <tr>
                    <td> {{ $key+1 }}</td>
                    <td>{{ $file->name }}</td>
                    <td>{{ count($file->rows) }}</td>
                    <td><a href="{{ route('files.show',$file->id)}}" class="btn btn-primary" )>View Records</a></td>
                </tr>
                @empty
                <div class="alert alert-warning">
                    No Record Exist
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush
