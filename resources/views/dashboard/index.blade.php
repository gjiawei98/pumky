@extends('estore_layouts.layout')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
    <li class="breadcrumb-item active">Marketing Dashboard</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">{{today()}}</span></li>
</ol>
<div class="subheader">
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-chart-area"></i> Marketing <span class="fw-300">Dashboard</span>
    </h1>
</div>

<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$products->count()}}
                    <small class="m-0 l-h-n">Total Product In Store</small>
                </h3>
            </div>
            <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$total}} 
                    <small class="m-0 l-h-n">Total Profit</small>
                </h3>
            </div>
            <i class="fal fa-gem position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$merchants->count()}}
                    <small class="m-0 l-h-n">Total Merchants</small>
                </h3>
            </div>
            <i class="fal fa-lightbulb position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    +40%
                    <small class="m-0 l-h-n">Product level increase</small>
                </h3>
            </div>
            <i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3">

    </div>
    <div class="col-xl-9">
        <div id="panel-13" class="panel">   
            <div class="panel-hdr">
                <h2>
                    Sales <span class="fw-300"><i>Chart</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        <code>努力就会有回报，用行动来证明</code>
                    </div>
                    <div id="flot-sales" class="w-100" style="height: 350px; padding: 0px; position: relative;"><canvas class="flot-base" width="790" height="437" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 632.533px; height: 350px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"></div></div><canvas class="flot-overlay" width="790" height="437" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 632.533px; height: 350px;"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Bar <span class="fw-300"><i>Chart</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Total Sales Following By Month
                    </div>
                    <canvas id="myChart" style="width:100%; max-height:400px"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>

    $(document).ready(function(){
        function gd(year, month, day) {
            return new Date(year, month, day).getTime();
        }

        var xValues = ["Jan", "Feb", "Mar", "Apl", "May","Jun","JLY","AUG","SPT","OCT","NOV","DEC"];
        var data = {!! json_encode($data)!!}
        var year = {!! json_encode(today()->year) !!};
        var yValues = [0,0,0,0,2,0,1,0,0,0,0,0];
        var barColors = [];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "Total Sales In " + year
                }
            }
        });

        var sales_data = {!! json_encode($sales_array) !!}

        /* sales chart */
        var plotSales = $.plot($('#flot-sales'), [
        {
            data: sales_data,
        }],
        {
            series:
            {
                lines:
                {
                    show: true,
                    lineWidth: 1,
                    fill: true,
                    fillColor:
                    {
                        colors: [
                        {
                            opacity: 0.1
                        },
                        {
                            opacity: 0.15
                        }]
                    }
                },
                points:
                {
                    show: true
                },
                shadowSize: 0
            },
            selection:
            {
                mode: "x"
            },
            grid:
            {
                hoverable: true,
                clickable: true,
                tickColor: '#f2f2f2',
                borderWidth: 1,
                borderColor: '#f2f2f2'
            },
            tooltip: true,
            tooltipOpts:
            {
                cssClass: 'tooltip-inner',
                content: "Your sales for <span class='text-warning fw-500'>%x</span> was <span class='text-success fw-500'>RM%y</span>",
                dateFormat: "%y-%0m-%0d",
                defaultTheme: false
            },
            colors: [color.primary._500],
            xaxis:
            {
                mode: "time",
                tickLength: 5
            }
        });
        /* sales chart -- end */
    });
</script>
@endpush