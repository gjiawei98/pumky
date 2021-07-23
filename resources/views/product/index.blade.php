@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">Product</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="fas fa-list"></i> Product List
    </h1>
    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-end">
        <a class="btn btn-primary waves-effect waves-themed" type="button" title="Add Button" href="{{route('product.create')}}">Add New
            product   <i class="fas fa-plus m-l10"></i></a>
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
                            @forelse ($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>{!! status($product->status,2) !!}</td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a>
                                    <a href="javascript:void(0);" data-id="{{ $product->id }}" data-last_name="{{$product->last_name}}" data-first_name="{{$product->first_name}}" data-email="{{$product->email}}" class="btn btn-danger btn-sm del_product"><i class="fal fa-trash"></i></a>
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
        <div class="pagination">{{ $products->withQueryString()->links('pagination::bootstrap-4') }}</div>
        <div style="record">{{ $products->total() }} Records</div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).on('click','.del_product',function(){
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
                url: 'product/'+id,
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