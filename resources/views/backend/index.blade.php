@extends('backend.layout.master')

@section('content')
  @php $page='dashboard'; $title="Dashboard";@endphp
     <!-- Main Content -->
     <div class="main-content">
       {{-- {{dd(config('services.paypal'))}} --}}
       <section class="section">
         <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Today</h4>
                    <div class="card-header-action">
                      <a href="#summary-chart" data-tab="summary-tab" class="btn ">Chart</a>
                      <a href="#summary-text" data-tab="summary-tab" class="btn active">Text</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="summary">
                      <div class="summary-info active" data-tab-group="summary-tab" id="summary-text">
                        @php
                        try {
                          $yesterday_revenue=App\Models\CustomerOrder::whereDate('created_at', \Carbon\Carbon::yesterday())->sum('total_price');

                          $revenue=App\Models\CustomerOrder::whereDate('created_at', DB::raw('CURDATE()'))->sum('total_price');
                        $orders=App\Models\CustomerOrder::whereDate('created_at', DB::raw('CURDATE()'))->count();
                        // dd($order);
                        // dd($revenue);

                        } catch (\Exception $e) {

                        }
                        // $yesterday_revenue??100
                        $percent_increase=$yesterday_revenue == 0?$revenue: ($revenue-$yesterday_revenue)/$yesterday_revenue * 100;

                        @endphp
                        <h4>${{number_format($revenue,2)}}</h4>
                        <div class="text-muted">Total Earning Today</div>
                        <div class="d-block mt-2">
                          <a href="{{route('backend.orders.index')}}">{{$orders}} Orders</a>
                        </div>
                        <div class="d-block mt-2">
                          @if ($percent_increase >= 0)
                            <p style="color:#2196f3;">{{$percent_increase}}%
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-circle col-blue"><circle cx="12" cy="12" r="10"></circle><polyline points="16 12 12 8 8 12"></polyline><line x1="12" y1="16" x2="12" y2="8"></line></svg>

                            </p>
                            @else
                              <p style="color:#ff9800;">{{$percent_increase}}%<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-circle col-orange"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
                              </p>
                          @endif


                        </div>

                      </div>
                      <div class="summary-chart" data-tab-group="summary-tab" id="summary-chart">
                        <canvas id="myChart" height="180"></canvas>
                      </div>
                      <div class="summary-item">
                        @php
                        try {
                          // $revenue=App\Models\CustomerOrder::sum('total_price');
                          $orders=App\Models\CustomerOrder::whereDate('created_at', DB::raw('CURDATE()'))->get();
                        $orders_count=App\Models\CustomerOrder::whereDate('created_at', DB::raw('CURDATE()'))->count();
                        // dd($order);
                        // dd($revenue);
                        } catch (\Exception $e) {

                        }

                        @endphp
                        <h6 class="mt-3">Recent Purchase <span class="text-muted">({{$orders_count}} Items)</span></h6>
                        <ul class="list-unstyled list-unstyled-border">

                          @foreach ($orders as $o)


                          <li class="media">

                            <div class="media-body">
                              <div class="media-right">${{$o->total_price}}</div>
                              <div class="media-title"><a href="{{route('backend.orders.show',['id'=>$o->id])}}">{{$o->name}}</a></div>
                              <div class="text-small text-muted">From <a href="javascript:void(0)">{{$o->country}}</a>
                                {{-- <div class="bullet"></div> Monday --}}
                              </div>
                            </div>
                          </li>
                          @endforeach
                                      </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

       </section>
      @include('backend.layout.settings_sidebar')
     </div>


@endsection
@section('bottom')
    <script src="{{asset('assets/backend/bundles/chartjs/chart.min.js')}}"></script>
    @php
    try {
      $monday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
     ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
     ->whereRaw('WEEKDAY(customer_orders.created_at)=0')->sum('total_price');
     $tuesday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
    ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
    ->whereRaw('WEEKDAY(customer_orders.created_at)=1')->sum('total_price');
    $wednesday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
   ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
   ->whereRaw('WEEKDAY(customer_orders.created_at)=2')->sum('total_price');
   $thursday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
  ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
  ->whereRaw('WEEKDAY(customer_orders.created_at)=3')->sum('total_price');
  $friday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
 ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
 ->whereRaw('WEEKDAY(customer_orders.created_at)=4')->sum('total_price');
 $saturday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
->whereRaw('WEEKDAY(customer_orders.created_at)=5')->sum('total_price');
$sunday=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
->whereRaw('WEEKDAY(customer_orders.created_at)=6')->sum('total_price');

    } catch (\Exception $e) {
      $monday=0;
      $tuesday=0;
      $wednesday=0;
      $thursday=0;
      $friday=0;
      $saturday=0;
      $sunday=0;

    }
    // dd($monday);
      @endphp
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  // type: 'line',
type: 'bar',
data: {
  labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
  datasets: [{
    label: 'Statistics',
    data: [{{$sunday}}, {{$monday}}, {{$tuesday}}, {{$wednesday}}, {{$thursday}}, {{$friday}}, {{$saturday}}],
    borderWidth: 2,
    backgroundColor: 'rgba(145,141,197,.8)',
    borderWidth: 0,
    borderColor: 'transparent',
    pointBorderWidth: 0,
    pointRadius: 3.5,
    pointBackgroundColor: 'transparent',
    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
  },
  //  {
  //   label: 'Statistics',
  //   data: [390, 600, 390, 280, 600, 430, 638],
  //   borderWidth: 2,
  //   backgroundColor: 'rgba(58,184,214,.7)',
  //   borderWidth: 0,
  //   borderColor: 'transparent',
  //   pointBorderWidth: 0,
  //   pointRadius: 3.5,
  //   pointBackgroundColor: 'transparent',
  //   pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
  // }
]
},
options: {
  legend: {
    display: false
  },
  scales: {
    yAxes: [{
      gridLines: {
        drawBorder: false,
        color: '#f2f2f2',
      },
      ticks: {
        beginAtZero: true,
        // stepSize: 200,
        fontColor: "#9aa0ac", // Font Color
        callback: function (value, index, values) {
          return value;
        }
      }
    }],
    xAxes: [{
      gridLines: {
        display: false,
        tickMarkLength: 15,
      },
      ticks: {
        fontColor: "#9aa0ac", // Font Color
      }
    }]
  },
}
});
</script>
@endsection
