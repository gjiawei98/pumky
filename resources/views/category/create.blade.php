@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item">Category</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()->format('Y')}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-book"></i> Add Category
    </h1>
</div>
<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('category.store')}}" name="category_form" enctype="multipart/form-data" class="">
            @csrf
            @method('POST')
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
                <div class="col-xl-12">
                    <div id="panel-information" class="panel">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Category Name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="status">Status</label>
                                            <div class="input-group">
                                                <select class="custom-select form-control" name="status" id="status" value="{{old('status')}}">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="col-6" style='margin-top : 15px' >
                                    <button type="submit" class="btn btn-primary waves-effect waves-themed">Save</button>
                                   </div>
                                </div>
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
        $("form[name='category_form']").validate({
            rules: {
                    name : 'required',
                    status : 'required',
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
    </script>
@endpush