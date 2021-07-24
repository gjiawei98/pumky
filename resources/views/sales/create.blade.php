@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()->format('Y')}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-book"></i> Add Sales
    </h1>
</div>
<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('sales.store')}}" name="sales_form" enctype="multipart/form-data" class="">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-information" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                ADD NEW SALES
                            </h2>
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
                                    <div class="col-12">
                                        <div class="panel-tag">
                                            Customer Shipping Information
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="customer_name">Customer Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-success">
                                                        <i class="ni ni-user fs-xl"></i>
                                                    </span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control" placeholder="First name" name="first_name" id="first_name" value="{{old('first_name')}}">
                                                <input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="last_name" id="last_name" value="{{old('last_name')}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="contact_number">Contact Number</label>
                                            <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{old('contact_number')}}">
                                        </div> 
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="sales_date">Sales Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fs-xl"><i class="fal fa-calendar"></i></span>
                                                </div>
                                                <input type="text" id="sales_date" name="sales_date" class="form-control" placeholder="Select a date" value="{{today()->format('d-m-Y')}}" aria-label="date" aria-describedby="shipping_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="tracking_number">Tracking Number</label>
                                            <input type="text" id="tracking_number" name="tracking_number" class="form-control" value="{{old('tracking_number')}}">
                                        </div> 
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group" data-select2-id="courier">
                                            <label class="form-label" for="courier">
                                                Courier
                                            </label>
                                            <select class="select2 form-control w-100 select2-hidden-accessible"
                                                id="courier" data-select2-id="courier" tabindex="-1" name="courier"
                                                aria-hidden="true" value="{{ old('courier') }}">
                                                <option value="">Select Courier ....</option>
                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="street_no">Street No</label>
                                            <div class="input-group">
                                                <textarea class="form-control" aria-label="With textarea" name="street_no"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="city">City</label>
                                            <input type="text" id="city" name="city" class="form-control" value="{{old('city')}}">
                                        </div>    
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" data-select2-id="35">
                                            <label class="form-label" for="state">
                                                State
                                            </label>
                                            <select class="select2 form-control w-100 select2-hidden-accessible"
                                                id="state" data-select2-id="state" tabindex="-1" name="state"
                                                aria-hidden="true" value="{{ old('state') }}">
                                                <option value="">Select State ....</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div id="panel-information" class="panel">
                        <div class="col-12">
                            <div class="panel-tag">
                                ADD SALES PRODUCT
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content" id="add_product">
                                <div class="row product_row" id="product_detail1">
                                    <div class="col-3">
                                        <div class="form-group" data-select2-id="1">
                                            <label class="form-label" for="1">
                                                Product
                                            </label>
                                            <select class="select2 form-control w-100 select2-hidden-accessible product_list"
                                                id="product_id" data-select2-id="1" tabindex="-1" name="product_id[1]" data-index = "1" required
                                                aria-hidden="true" value="{{ old('product_id') }}">
                                                <option value="">Select Product ....</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" data-id = "{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="agent_price">AgentPrice</label>
                                            <input type="text" id="agent_price_1" name="agent_price[1]" class="form-control" required value="{{old('agent_price')}}">
                                        </div>    
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="selling_price">Selling Price</label>
                                            <input type="text" id="selling_price_1" name="selling_price[1]" class="form-control" required value="{{old('selling_price')}}">
                                        </div>    
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="quantity">Quantity</label>
                                            <input type="text" id="quantity" name="quantity[1]" class="form-control" required value="{{old('quantity')}}">
                                        </div>    
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary waves-effect waves-themed add_product" style="justify-content: end">ADD PRODUCT</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-themed">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script>
    $(function() {
        $("form[name='sales_form']").validate({
            rules: {
                first_name : 'required',
                last_name : 'required',
                contact_number : {
                    required :true,
                    mobile_number :true,
                },
            },
            messages: {
            },
            submitHandler: function(form) {
                $('.btn').attr('disabled', true);
                form.submit();
            }
        });
    });

    $(document).ready(function(){
        $(function() {
            $('.select2').select2();
            $('#shipping_date').datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });
        });
    });

    $(document).on('change','.product_list',function(){

        var product_id = $(this).find(':selected').data('id');
        var index = $(this).data('index');
        console.log(product_id);
        if(product_id != null) {
            $.ajax({
                method: "GET",
                url: '/get_product/'+product_id,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    if(data['status'] == 'success'){
                        toastr.success('Good!');
                        $("#agent_price_"+index).val(data['agent_price']);
                        $("#selling_price_"+index).val(data['selling_price']);
                        
                    }else{
                        toastr.error(data['msg']);
                    }
                }
            })
        } else {
            $("#agent_price_"+index).val('');
            $("#selling_price_"+index).val('');
        }

    });

    $(document).on('click','.add_product',function(){
        var count = $('.product_row').length;
        // count = count + 1;  
        do {
            count = count + 1;
        } while ($('#product_detail'+count).length != 0);

        var no = count;
        var div = document.getElementById('add_product');
        var insert =    "<div class='row product_row' id='product_detail"+no+"'>"+
                            "<div class='col-3'>"+
                                "<div class='form-group' data-select2-id='"+no+"'>"+
                                    "<label class='form-label' for='product'>"+
                                        " <i class='fa fa-trash delete_product' style='color:red;'data-id='"+no+"'></i> Product"+ 
                                    "</label>"+
                                    "<select class='select2 form-control w-100 select2-hidden-accessible product_list' id='product_id' data-select2-id='"+no+"' tabindex='-1' name='product_id["+no+"]' data-index = '"+no+"' required aria-hidden='true' value='{{ old('product_id') }}'>"+
                                        "<option value=''>Select Product ....</option>"+
                                        "@foreach ($products as $product)"+
                                            "<option value='{{ $product->id }}' data-id = '{{ $product->id }}'>{{ $product->product_name }}</option>"+
                                        "@endforeach"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-3'>"+
                                "<div class='form-group'>"+
                                    "<label class='form-label' for='agent_price'>AgentPrice</label>"+
                                    "<input type='text' id='agent_price_"+no+"' name='agent_price["+no+"]' required class='form-control' value='{{old('agent_price')}}'>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-3'>"+
                                "<div class='form-group'>"+
                                    "<label class='form-label' for='selling_price'>Selling Price</label>"+
                                    "<input type='text' id='selling_price_"+no+"' name='selling_price["+no+"]' required class='form-control' value='{{old('selling_price')}}'>"+
                                    "</div>"+    
                                "</div>"+
                            "<div class='col-3'>"+
                                "<div class='form-group'>"+
                                    "<label class='form-label' for='quantity'>Quantity</label>"+
                                    "<input type='text' id='quantity_"+no+"' name='quantity["+no+"]' required class='form-control' value='{{old('quantity')}}'>"+
                                "</div>"+    
                            "</div>"+   
                        "</div>";
            
        div.insertAdjacentHTML("beforeend", insert);
        $('.select2').select2();    

    });
    
    $(document).on('click','.delete_product',function(){
        var id = $(this).data('id');
        $("#product_detail"+id).remove();
    });
    </script>
@endpush