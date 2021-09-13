@extends('layouts.app')

@section('content')
<div class="row mt-5 p-5">
    <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    @if( count($records['columns']) > 0 )
                        @forelse ($records['columns'] as $column)
                         <th>{{ $column}}</th>
                        @empty
                         <th></th>
                        @endforelse
                    @endif
                </tr>
            </thead>
            <tbody>
                @if( count($records['rows']) > 0 )
                    @forelse ($records['rows'] as $row)
                    <tr>
                        @foreach($row as  $ele)
                        <td>{{ $ele }}</td>
                        @endforeach
                    </tr>
                    @empty
                    <div class="alert alert-warning">
                        No Record Exist
                    </div>
                    @endforelse
                @endif
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
