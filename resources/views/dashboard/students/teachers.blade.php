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
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">?</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- row -->
    <h4 class="card-title mt-4">المدرس الخاص ب {{ $student->name }}</h4>
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
                        <th class="wd-lg-25p tx-right">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @forelse ($teachers as $user)
                        <tr>
                            <?php $i++; ?>
                            <td class="tx-right tx-medium tx-inverse">{{ $i }}</td>
                            <td class="tx-right tx-medium tx-inverse">{{ $user->name }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $user->email }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $user->phone }}</td>
                            <td class="tx-right tx-medium tx-danger">{{ $user->country }}</td>
                            <td class="tx-right tx-medium tx-danger">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route("students.edit",$user->id) }}" class="btn btn-primary btn-block">تعديل</a>
                                    </div>
                                    <div class="col-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete">
                                            حذف
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">هل ترغب فى حذف الطالب</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                <form action="{{ route("students.delete") }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="laert alert-warning">لا يوجد طلاب بالاكايمية بعد</div>
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
