@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">Merchant</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="fas fa-list"></i> Merchant List
    </h1>
    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-end">
        <a class="btn btn-primary waves-effect waves-themed" type="button" title="Add Button" href="{{route('merchant.create')}}">Add New
            merchant   <i class="fas fa-plus m-l10"></i></a>
    </div>
</div>

<div class="card mb-g p-2">
    <div class="card-body">
        <div class="frame-wrap">
            <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-start"></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover m-0">
                        <thead class="thead-themed">
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($merchants as $merchant)
                            <tr>
                                <td>{{$merchant->name}}</td>
                                <td>{{$merchant->created_at}}</td>
                                <td>{!! status($merchant->status,2) !!}</td>
                                <td>
                                    <a href="{{route('merchant.edit',$merchant->id)}}" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a>
                                    <a href="javascript:void(0);" data-id="{{ $merchant->id }}" data-last_name="{{$merchant->last_name}}" data-first_name="{{$merchant->first_name}}" data-email="{{$merchant->email}}" class="btn btn-danger btn-sm del_merchant"><i class="fal fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pagination">{{ $merchants->withQueryString()->links('pagination::bootstrap-4') }}</div>
        <div style="record">{{ $merchants->total() }} Records</div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).on('click','.del_merchant',function(){
        var id = $(this).data('id');
        var first_name = $(this).data('first_name');
        var last_name = $(this).data('last_name');
        var email = $(this).data('email');
        
        Swal.fire({
        title: "Are you sure to delete?",
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "DELETE",
                url: 'merchant/'+id,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    if(data == 1){
                        toastr.success('ok');
                        location.reload();
                    }else{
                        toastr.error('Failed to delete, Please try again');
                    }
                }
            })
        }
        })

    });
    $(document).ready(function(){
      
    });
</script>
@endpush