@extends('estore_layouts.layout')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        <li class="breadcrumb-item">Add New Merchant</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span
                class="js-get-date">{{ today()->format('Y') }}</span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class="subheader-icon fal fa-credit-card-front"></i> Merchant<sup
                class="badge badge-primary fw-500">New</sup>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        ADD NEW Merchant
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
                        <form action="{{ route('merchant.update',$merchant->id) }}" name="merchant_form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Merchant Name</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Merchant Name" value="{{ $merchant->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="status" id="status"
                                                value="{{ old('status') }}">
                                                <option value="1" <?php if($merchant->status == '1') echo ' selected'; ?>>Active</option>
                                                <option value="0" <?php if($merchant->status == '0') echo ' selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="shipping_rate">Shipping Rate (RM)</label>
                                        <input type="text" id="shipping_rate" name="shipping_rate" class="form-control"
                                            placeholder="Shipping Rate" value="{{ $merchant->shipping_rate }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="type">type</label>
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="type" id="type"
                                                value="{{ old('type') }}">
                                                <option value="">Select type ..</option>
                                                <option value="0" <?php if($merchant->type == '0') echo ' selected'; ?> >零售</option>
                                                <option value="1" <?php if($merchant->type == '1') echo ' selected'; ?> >批发</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="add_on">
                                            Add On
                                        </label>
                                        <div class="input-group">
                                            <select class="custom-select form-control" name="add_on" id="add_on"
                                                value="{{ old('add_on') }}">
                                                <option value="">Select add on ..</option>
                                                <option value="0" <?php if($merchant->add_on == '0') echo ' selected'; ?>>Bubble wrap</option>
                                                <option value="1" <?php if($merchant->add_on == '1') echo ' selected'; ?>>Box</option>
                                                <option value="2" <?php if($merchant->add_on == '2') echo ' selected'; ?>>Both</option>
                                            </select>
                                        </div>
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
                                                <option value="{{ $state->state_code }}" <?php if($state->state_code == $merchant->state) echo 'selected'; ?>>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-url">Remark</label>
                                        <div class="input-group">
                                            <textarea class="form-control" aria-label="With textarea" name="remark">{{$merchant->remark}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="panel-tag">
                                        Social Media
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="website">Website Link</label>
                                        <input type="text" id="website" name="website" class="form-control"
                                            placeholder="Website Url" value="{{ $merchant->website_url }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="facebook">Facebook Link</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control"
                                            placeholder="Facebook Url" value="{{ $merchant->facebook }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="instagram">Instagram Link</label>
                                        <input type="text" id="instagram" name="instagram" class="form-control"
                                            placeholder="instagram Url" value="{{ $merchant->instagram }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="telegram">Telegram Link</label>
                                        <input type="text" id="telegram" name="telegram" class="form-control"
                                            placeholder="telegram Url" value="{{ $merchant->telegram }}">
                                    </div>
                                </div>
                                <div class="col-6" style='margin-top : 15px'>
                                    <button type="submit" class="btn btn-primary waves-effect waves-themed">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $(function() {
                $('.select2').select2();
            });
        });
    </script>
@endpush
