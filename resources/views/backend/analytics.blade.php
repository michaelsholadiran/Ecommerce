@extends('backend.layout.master')
@section('content')
  @php $page='analytics'; $title="Analytics";@endphp
     <!-- Main Content -->
     <div class="main-content">
       <section class="section col-12">
         <div class="row ">
           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="card">
               <div class="card-statistic-4">
                 <div class="align-items-center justify-content-between">
                   <div class="row ">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                       <div class="card-content">
                         <h5 class="font-15">Orders</h5>
                         @php
                         try {
                         $orders=App\Models\CustomerOrder::count();
                         // dd($order);
                         } catch (\Exception $e) {

                         }

                         @endphp
                         <h2 class="mb-3 font-18">{{$orders}}</h2>
                         {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                       </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                       <div class="banner-img">
                         <img src="{{asset('assets/backend/img/banner/1.png')}}" alt="">
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="card">
               <div class="card-statistic-4">
                 <div class="align-items-center justify-content-between">
                   <div class="row ">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                       <div class="card-content">
                         @php
                         try {
                             $product_count=App\Models\Product::count();
                         } catch (\Exception $e) {
                             $product_count="";
                         }
                         @endphp
                         <h5 class="font-15">Products</h5>
                         <h2 class="mb-3 font-18">{{$product_count}}</h2>
                         <p class="mb-0"></p>
                       </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                       <div class="banner-img">
                         <img src="{{asset('assets/backend/img/banner/2.png')}}" alt="">
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="card">
               <div class="card-statistic-4">
                 <div class="align-items-center justify-content-between">
                   <div class="row ">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                       <div class="card-content">
                         <h5 class="font-15">Revenue</h5>
                         @php
                         try {
                         $revenue=App\Models\CustomerOrder::sum('total_price');
                         // dd($order);
                         // dd($revenue);
                         } catch (\Exception $e) {

                         }

                         @endphp
                         <h2 class="mb-3 font-18">${{$revenue}}</h2>
                         {{-- <p class="mb-0"><span class="col-green">42%</span> Increase</p> --}}
                       </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                       <div class="banner-img">
                         <img src="{{asset('assets/backend/img/banner/4.png')}}" alt="">
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="row">





           <div class="col-12  col-lg-12">
             <div class="card ">
               <div class="card-header">
                 <h4>Revenue chart</h4>
                 <div class="card-header-action d-none">
                   <div class="dropdown">
                     <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                     <div class="dropdown-menu">
                       <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                       <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                         Delete</a>
                     </div>
                   </div>
                   <a href="#" class="btn btn-primary">View All</a>
                 </div>
               </div>
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-12">
                     <div id="chart1"></div>
                     <div class="row mb-0">
                       <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <div class="list-inline text-center">
                           <div class="list-inline-item p-r-30">
                             {{-- <i data-feather="arrow-up-circle"
                               class="col-green"></i> --}}
                               @php
                                 try {
                                   $week=App\Models\CustomerOrder::where('created_at', '>', \Carbon\Carbon::now()->startOfWeek())
                                  ->where('created_at', '<', \Carbon\Carbon::now()->endOfWeek())
                                  ->sum('total_price');
                                  $month=App\Models\CustomerOrder::whereMonth('created_at', date('m'))->sum('total_price');
                                  $year=App\Models\CustomerOrder::whereYear('created_at', date('Y'))->sum('total_price');
                                 } catch (\Exception $e) {

                                 }

                               @endphp
                             <h5 class="m-b-0">${{number_format($week,2)}}</h5>
                             <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                           </div>
                         </div>
                       </div>
                       <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <div class="list-inline text-center">
                           <div class="list-inline-item p-r-30">
                             {{-- <i data-feather="arrow-down-circle" --}}
                               {{-- class="col-orange"></i> --}}
                             <h5 class="m-b-0">${{number_format($month,2)}}</h5>
                             <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                           </div>
                         </div>
                       </div>
                       <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <div class="list-inline text-center">
                           <div class="list-inline-item p-r-30">
                             {{-- <i data-feather="arrow-up-circle" --}}
                               {{-- class="col-green"></i> --}}
                             <h5 class="mb-0 m-b-0">${{number_format($year,2)}}</h5>
                             <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   {{-- <div class="col-lg-3 d-none">
                     <div class="row mt-5">
                       <div class="col-7 col-xl-7 mb-3">Total customers</div>
                       <div class="col-5 col-xl-5 mb-3">
                         <span class="text-big">8,257</span>
                         <sup class="col-green">+09%</sup>
                       </div>
                       <div class="col-7 col-xl-7 mb-3">Total Income</div>
                       <div class="col-5 col-xl-5 mb-3">
                         <span class="text-big">$9,857</span>
                         <sup class="text-danger">-18%</sup>
                       </div>
                       <div class="col-7 col-xl-7 mb-3">Project completed</div>
                       <div class="col-5 col-xl-5 mb-3">
                         <span class="text-big">28</span>
                         <sup class="col-green">+16%</sup>
                       </div>
                       <div class="col-7 col-xl-7 mb-3">Total expense</div>
                       <div class="col-5 col-xl-5 mb-3">
                         <span class="text-big">$6,287</span>
                         <sup class="col-green">+09%</sup>
                       </div>
                       <div class="col-7 col-xl-7 mb-3">New Customers</div>
                       <div class="col-5 col-xl-5 mb-3">
                         <span class="text-big">684</span>
                         <sup class="col-green">+22%</sup>
                       </div>
                     </div>
                   </div> --}}
                 </div>
               </div>
             </div>
           </div>
         </div>

       </section>
      @include('backend.layout.settings_sidebar')
     </div>

       <script src="{{asset('assets/backend/bundles/apexcharts/apexcharts.min.js')}}"></script>
     <script type="text/javascript">
     @php
       try {

        $jan=App\Models\CustomerOrder::whereMonth('created_at',1)->sum('total_price');

$feb=App\Models\CustomerOrder::whereMonth('created_at',2)->sum('total_price');
$mar=App\Models\CustomerOrder::whereMonth('created_at',3)->sum('total_price');
$apr=App\Models\CustomerOrder::whereMonth('created_at',4)->sum('total_price');
$may=App\Models\CustomerOrder::whereMonth('created_at',5)->sum('total_price');
$jun=App\Models\CustomerOrder::whereMonth('created_at',6)->sum('total_price');
$jul=App\Models\CustomerOrder::whereMonth('created_at',7)->sum('total_price');
$aug=App\Models\CustomerOrder::whereMonth('created_at',8)->sum('total_price');
$sep=App\Models\CustomerOrder::whereMonth('created_at',9)->sum('total_price');
$oct=App\Models\CustomerOrder::whereMonth('created_at',10)->sum('total_price');
$nov=App\Models\CustomerOrder::whereMonth('created_at',11)->sum('total_price');
$dec=App\Models\CustomerOrder::whereMonth('created_at',12)->sum('total_price');
        // dd($jan);
       } catch (\Exception $e) {

       }

     @endphp
     function chart1() {
         var options = {
             chart: {
                 height: 230,
                 type: "bar",
                 shadow: {
                     enabled: true,
                     color: "#000",
                     top: 18,
                     left: 7,
                     blur: 10,
                     opacity: 1
                 },
                 toolbar: {
                     show: false
                 }
             },
             colors: ["#786BED", "#999b9c"],
             dataLabels: {
                 enabled: true
             },
             stroke: {
                 curve: "smooth"
             },
             series: [{
                 name: "High - {{date('Y')}}",
                 data: [{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$may}}, {{$jun}},{{$jul}}, {{$aug}}, {{$sep}}, {{$oct}}, {{$nov}}, {{$dec}}]
             },
             // {
             //     name: "Low - 2019",
             //     data: [7, 11, 30, 18, 25, 13]
             // }
             ],
             grid: {
                 borderColor: "#e7e7e7",
                 row: {
                     colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                     opacity: 0.0
                 }
             },
             markers: {
                 size: 6
             },
             xaxis: {
                 categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],

                 labels: {
                     style: {
                         colors: "#9aa0ac"
                     }
                 }
             },
             yaxis: {
                 title: {
                     text: "Income"
                 },
                 labels: {
                     style: {
                         color: "#9aa0ac"
                     }
                 },
                 // min: 5,
                 // max: 40
             },
             legend: {
                 position: "top",
                 horizontalAlign: "right",
                 floating: true,
                 offsetY: -25,
                 offsetX: -5
             }
         };

         var chart = new ApexCharts(document.querySelector("#chart1"), options);

         chart.render();
     }
     chart1();
     </script>


@endsection
