@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">sale</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="fas fa-list"></i> sale List
    </h1>
    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-end">
        <a class="btn btn-primary waves-effect waves-themed" type="button" title="Add Button" href="{{route('sales.create')}}">Add New
            sale   <i class="fas fa-plus m-l10"></i></a>
    </div>
</div>

<div class="card mb-g p-2">
    <div class="card-body">
        <div class="frame-wrap">
            <form action="{{url()->current()}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label class="form-label">Search</label>
                            <div class="input-group bg-white shadow-inset-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fal fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-left-0 bg-transparent pl-0" name="search" placeholder="Search..." value="{{$search}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="form-label">Sales Date Between</label>

                                <div class="input-daterange input-group" id="datepicker-5">
                                    <input type="text" class="form-control" name="start" value="{{$start}}">
                                    <div class="input-group-append input-group-prepend">
                                        <span class="input-group-text fs-xl"><i class="fal fa-ellipsis-h"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="end" value="{{$end}}">
                                </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <a href="{{url()->current()}}" class="btn btn-primary waves-effect waves-themed" type="submit">Clear</a>
                            <button class="btn btn-primary waves-effect waves-themed" type="submit">Filter</button>
                        </div>
                       
                    </div>
                </div>
            </form>
            <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-start"></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover m-0">
                        <thead class="thead-themed">
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Sales Date</th>
                                <th>Tracking Number</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $sale)
                            <tr>
                                <td><a href="{{route('sales.show',$sale->id)}}">{{$sale->order_number}}</a></td>
                                <td>{{$sale->customer_first_name}} {{$sale->customer_last_name}}</td>
                                <td>{{$sale->sales_date}}</td>
                                <td>{{$sale->tracking_number}}</td>
                                <td>{{$sale->created_at}}</td>
                                <td>{!! status($sale->status,2) !!}</td>
                                <td>
                                    <a href="{{route('sales.edit',$sale->id)}}" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a>
                                    <a href="javascript:void(0);" data-id="{{ $sale->id }}" data-last_name="{{$sale->last_name}}" data-first_name="{{$sale->first_name}}" data-email="{{$sale->email}}" class="btn btn-danger btn-sm del_sale"><i class="fal fa-trash"></i></a>
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
        <div class="pagination">{{ $sales->withQueryString()->links('pagination::bootstrap-4') }}</div>
        <div style="record">{{ $sales->total() }} Records</div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).on('click','.del_sale',function(){
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
                url: 'sale/'+id,
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

    $(document).ready(function()
    {
        // range picker
        $('#datepicker-5').datepicker(
        {
            todayHighlight: true,
            templates: controls
        });
    });

        
</script>
@endpush