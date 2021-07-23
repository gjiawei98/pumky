@extends('estore_layouts.layout')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        <li class="breadcrumb-item">Add Product</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span
                class="js-get-date">{{ today()->format('Y') }}</span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class="subheader-icon fal fa-credit-card-front"></i> Product<sup class="badge badge-primary fw-500">New</sup>
        </h1>
    </div>

    <form action="{{route('product.store')}}" enctype="multipart/form-data" name="payment_method_form" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            ADD NEW PRODUCT
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close"
                                data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product_name">Name</label>
                                        <input type="text" id="product_name" name="product_name" class="form-control" value="{{old('product_name')}}">
                                    </div>    
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="type_of_stock">Type Of Stock</label>
                                        <select class="js-bg-target custom-select" name="type_of_stock" required value="{{old('type_of_stock')}}">
                                            <option value="">Select ..</option>
                                            <option value="0">Out Of Stock</option>
                                            <option value="1">Pre-Order</option>
                                            <option value="2">Ready Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="weightage">Weightage</label>
                                        <input type="text" id="weightage" name="weightage" class="form-control" value="{{old('weightage')}}">
                                    </div>    
                                </div>
                                <div class="col-6">
                                    <div class="form-group" data-select2-id="35">
                                        <label class="form-label" for="merchant">
                                            Merchant
                                        </label>
                                        <select class="select2 form-control w-100 select2-hidden-accessible"
                                            id="merchant" data-select2-id="merchant" tabindex="-1" name="merchant"
                                            aria-hidden="true" value="{{ old('merchant') }}">
                                            <option value="">Select Merchant ....</option>
                                            @foreach ($merchants as $merchant)
                                                <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" data-select2-id="35">
                                        <label class="form-label" for="category">
                                            category
                                        </label>
                                        <select class="select2 form-control w-100 select2-hidden-accessible"
                                            id="category" data-select2-id="category" tabindex="-1" name="category"
                                            aria-hidden="true" value="{{ old('category') }}">
                                            <option value="">Select State ....</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="js-bg-target custom-select" name="status" required value="{{old('status')}}">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="remark">Remark</label>
                                        <textarea id="summernote" name="remark"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div id="panel-information" class="panel">
                            <div class="panel-hdr">
                                <h2>
                                    Agent Price
                                </h2>
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="agent_price">Agent Price</label>
                                            <input type="text" id="agent_price" name="agent_price" class="form-control" value="{{ old('agent_price')}}">
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="agent_quantity">Agent Quantity</label>
                                            <input type="text" id="quantity" name="agent_quantity" class="form-control" value="{{ old('agent_quantity')}}">
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="agent_quantity_type">Agent Quantity Type</label>
                                            <select class="js-bg-target custom-select" name="agent_quantity_type" required value="{{old('agent_quantity_type')}}">
                                                <option value="0">No</option>
                                                <option value="1">包</option>
                                                <option value="2">只</option>
                                                <option value="3">束</option>
                                                <option value="4">箱</option>
                                                <option value="5">袋</option>
                                                <option value="6">盒</option>
                                                <option value="7">杯</option>
                                                <option value="8">罐</option>
                                                <option value="9">片</option>
                                                <option value="10">粒</option>
                                            </select>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div id="panel-information" class="panel">
                            <div class="panel-hdr">
                                <h2>
                                    Selling Price
                                </h2>
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="selling_price">Selling Price</label>
                                            <input type="text" id="selling_price" name="selling_price" class="form-control" value="{{ old('selling_price')}}">
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="selling_quantity">Selling Quantity</label>
                                            <input type="text" id="quantity" name="selling_quantity" class="form-control" value="{{ old('selling_quantity')}}">
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="selling_quantity_type">Selling Product Type</label>
                                            <select class="js-bg-target custom-select" name="selling_quantity_type" required value="{{old('selling_quantity_type')}}">
                                                <option value="0">No</option>
                                                <option value="1">包</option>
                                                <option value="2">只</option>
                                                <option value="3">束</option>
                                                <option value="4">箱</option>
                                                <option value="5">袋</option>
                                                <option value="6">盒</option>
                                                <option value="7">杯</option>
                                                <option value="8">罐</option>
                                                <option value="9">片</option>
                                                <option value="10">粒</option>
                                            </select>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-themed">Save</button>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline','clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['link',['link']],
                    ['fullscreen',['undo','redo','fullscreen']],
                    ['picture',['picture']],
                ]
            });

            $(function() {
                $('.select2').select2();
            });
        });
    </script>
@endpush
