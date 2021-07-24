@extends('estore_layouts.layout')
@section('content')

<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item">Page Views</li>
    <li class="breadcrumb-item active">Invoice</li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-plus-circle"></i> Invoice
        <small>
            Printable Invoice Page
        </small>
    </h1>
    <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-end">
        <a class="btn btn-primary waves-effect waves-themed" type="button" title="Add Button" href="{{route('sales.index')}}">Back</a>
    </div>
</div>
<div class="container">
    <div data-size="A4">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center mb-5">
                    <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                        Pumky Store 
                        <small class="text-muted mb-0 fs-xs">
                            Thank You
                        </small>
                    </h2>
                </div>
                <h3 class="fw-300 display-4 fw-500 color-primary-600 keep-print-font pt-4 l-h-n m-0">
                    INVOICE
                </h3>
                <div class="text-dark fw-700 h1 mb-g keep-print-font">
                    # {{$sales->order_number}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 d-flex">
                <div class="table-responsive">
                    <table class="table table-clean table-sm align-self-end">
                        <tbody>
                            <tr>
                                <td>
                                    Issue Date:
                                </td>
                                <td>
                                    05/04/2019
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Net:
                                </td>
                                <td>
                                    {{$sales->total_amount}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Currency:
                                </td>
                                <td>
                                    RM
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tracking Number 
                                </td>
                                <td>
                                    {{$sales->tracking_number}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-4 ml-sm-auto">
                <div class="table-responsive">
                    <table class="table table-sm table-clean text-right">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Bill to:</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{$sales->customer_first_name}} {{$sales->customer_last_name}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$sales->street_no}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$sales->contact_number}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$sales->email}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Attn : {{Auth::user()->name}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th class="text-center border-top-0 table-scale-border-bottom fw-700"></th>
                                <th class="border-top-0 table-scale-border-bottom fw-700">Item</th>
                                <th class="text-right border-top-0 table-scale-border-bottom fw-700">Unit Cost</th>
                                <th class="text-center border-top-0 table-scale-border-bottom fw-700">Qty</th>
                                <th class="text-right border-top-0 table-scale-border-bottom fw-700">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales_details as $index => $sd)
                                <tr>
                                    <td class="text-center fw-700">{{$index+1}}</td>
                                    <td class="text-left strong">{{$sd->product_name}}</td>
                                    <td class="text-right">{{$sd->selling_price}}</td>
                                    <td class="text-center">{{$sd->quantity}}</td>
                                    <td class="text-right">{{number_format($sd->selling_price * $sd->quantity,2)    }}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 ml-sm-auto">
                <table class="table table-clean">
                    <tbody>
                        <tr>
                            <td class="text-left">
                                <strong>Subtotal</strong>
                            </td>
                            <td class="text-right">RM {{$sales->total_amount}}</td>
                        </tr>
                        <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                            <td class="text-left keep-print-font">
                                <h4 class="m-0 fw-700 h2 keep-print-font color-primary-700">Total</h4>
                            </td>
                            <td class="text-right keep-print-font">
                                <h4 class="m-0 fw-700 h2 keep-print-font">{{$sales->total_amount}}</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="py-5 text-primary">
                    Thank you very much. We really appreciate your support.
                    <br>
                    Item cannot refund.
                </h4>
                <p class="mt-2 text-muted mb-0">
                    Payment details: {{$sales->order_number}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush