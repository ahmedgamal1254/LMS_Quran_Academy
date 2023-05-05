@extends('dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
          <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> أهلا ومرحبا بك {{ Auth::guard('admin')->user()->name }}</h2>
          <p class="mg-b-0">لوحة التحكم لاداراة أكاديمية القراءن (الكرام أكاديمى)</p>
        </div>
    </div>
    <div class="main-dashboard-header-right">
        <div>
            <label class="tx-13">تقييم الطلاب</label>
            <div class="main-star">
                <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i>
                <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>({{ $count_students }})</span>
            </div>
        </div>
        <div>
            <label class="tx-13">الحصص المتاحة</label>
            <h5>10</h5>
        </div>
        <div>
            <label class="tx-13">الحصص المنتهية</label>
            <h5>50</h5>
        </div>
    </div>
</div>
<!-- /breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">حصص اليوم</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">10</h4>
                        </div>
                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1">5,25,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <a href="{{route("teachers")}}">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">المدرسين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $count_teachers }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <span id="compositeline2" class="pt-1">3,25,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <a href="{{ route("students") }}">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الطلاب</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $count_students }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">المدفوعات</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">1 تم اضافتها اليوم</h4>
                        </div>
                    </div>
                </div>
            </div>
            <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>
</div>
<!-- row closed -->

<!-- row -->
<h3>حصص اليوم</h3>
<div class="row row-sm">
    <div class="col-12  col-lg-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">المدرس : ahmed</h5>
                <h6 class="card-subtitle mb-4 text-muted">الطالب : محمد الدوسرى</h6>
                <div class="card-text">
                    <span class="btn-success mt-3" style="padding:10px;">2023-04-30 03:00 PM</span>
                    <span style="margin: 30px 0px;padding: 0 10px;">المدة : <span class="btn-success" style="padding:10px;">00:30:00</span></span><br><br>
                    <span>حالة الحصة: لم تبدا</span>
                </div>
                <a href="#" class="card-link text-secondary">رابط الحصة</a>
            </div>
        </div>
    </div>
    <div class="col-12  col-lg-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">المدرس : ahmed</h5>
                <h6 class="card-subtitle mb-4 text-muted">الطالب : محمد الدوسرى</h6>
                <div class="card-text">
                    <span class="btn-success mt-3" style="padding:10px;">2023-04-30 03:00 PM</span>
                    <span style="margin: 30px 0px;padding: 0 10px;">المدة : <span class="btn-success" style="padding:10px;">00:30:00</span></span><br><br>
                    <span>حالة الحصة: لم تبدا</span>
                </div>
                <a href="#" class="card-link text-secondary">رابط الحصة</a>
            </div>
        </div>
    </div>

</div>
<!-- row closed -->

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-4 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header pb-1">
                <h3 class="card-title mb-2">أخر 10 طلاب مسجلين</h3>
            </div>
            <div class="card-body p-0 customers mt-1">
                <div class="list-group list-lg-group list-group-flush">
                    @forelse ($students as $student)
                    <div class="list-group-item list-group-item-action" href="#">
                        <div class="media mt-0">
                            <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Image description">
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route("students") }}">
                                        <div class="mt-0">
                                            <h5 class="mb-1 tx-15">{{ $student->name }}</h5>
                                            <p class="mb-0 tx-13 text-muted">الدولة : <span class="text-success ml-2">{{ $student->country }}</span></p>
                                        </div>
                                    </a>
                                    <span class="mr-auto wd-45p fs-16 mt-2">
                                       <a href="{{ route("offers") }}"> <div id="spark1" class="wd-100p">العرض: {{ $student->offer_name }}</div></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-1">
                <h3 class="card-title mb-2">ملخص</h3>
            </div>
            <div class="product-timeline card-body pt-2 mt-1">
                <ul class="timeline-1 mb-0">
                    <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">الطلاب</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
                        <p class="mb-0 text-muted tx-12">{{ $count_students }} الطلاب</p>
                    </li>
                    <li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">المدرسين</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
                        <p class="mb-0 text-muted tx-12">{{ $count_teachers }} المدرسين</p>
                    </li>
                    <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">الحصص</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
                        <p class="mb-0 text-muted tx-12">10 الحصص</p>
                    </li>
                    <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">المدفوعات</span> <a href="#" class="float-left tx-11 text-muted">1 hour ago</a>
                        <p class="mb-0 text-muted tx-12">25.000 SAR المدفوعات</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-0">
                <h3 class="card-title mb-2">Recent Orders</h3>
                <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
            </div>
            <div class="card-body sales-info ot-0 pt-0 pb-0">
                <div id="chart" class="ht-150"></div>
                <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                    <div class="col-md-6 col">
                        <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
                        <h3 class="mb-1">5238</h3>
                        <div class="d-flex">
                            <p class="text-muted ">Last 6 months</p>
                        </div>
                    </div>
                    <div class="col-md-6 col">
                        <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
                            <h3 class="mb-1">3467</h3>
                        <div class="d-flex">
                            <p class="text-muted">Last 6 months</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center pb-2">
                            <p class="mb-0">Total Sales</p>
                        </div>
                        <h4 class="font-weight-bold mb-2">$7,590</h4>
                        <div class="progress progress-style progress-sm">
                            <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="d-flex align-items-center pb-2">
                            <p class="mb-0">Active Users</p>
                        </div>
                        <h4 class="font-weight-bold mb-2">$5,460</h4>
                        <div class="progress progress-style progress-sm">
                            <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row close -->

<!-- row opened -->
<div class="row row-sm row-deck">
    <div class="col-md-12 col-lg-4 col-xl-4">
        <div class="card card-dashboard-eight pb-2">
            <h6 class="card-title">أكثر دول الطلاب لدينا</h6>
            <div class="list-group">
                @foreach ($countries as $country)
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-eg flag-icon-squared"></i>
                        <p>{{ $country->country }}</p><span>{{ $country->count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
</div>
<!-- Container closed -->
@endsection

@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
