@extends('dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')
    <!-- row -->
    <h4 class="card-title mt-4">قائمة الطلاب  الخاصة بالمدرس {{ $teacher->name }}</h4>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                <thead>
                    <tr>
                        <th class="wd-lg-25p">#ID</th>
                        <th class="wd-lg-25p tx-right">الاسم</th>
                        <th class="wd-lg-25p tx-right">البريد الالكترونى</th>
                        <th class="wd-lg-25p tx-right">رقم الهاتف</th>
                        <th class="wd-lg-25p tx-right">الدولة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @forelse ($students as $student)
                        <tr>
                            <?php $i++; ?>
                            <td class="tx-right tx-medium tx-inverse">{{ $i }}</td>
                            <td class="tx-right tx-medium tx-inverse">{{ $student->name }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $student->email }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $student->phone }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $student->country }}</td>
                        </tr>
                    @empty
                        <div class="laert alert-warning">لا يوجد طلاب مع هذا المدرس بعد</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- row closed -->

</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
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