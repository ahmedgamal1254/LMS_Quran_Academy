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
    <h4 class="card-title mt-4">قائمة الاسعار والعروض</h4>
    <div class="row">
        @forelse ($offers as $offer)
            <div class="col-sm-6 col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center pricing">
                        <div class="card-category">{{ $offer->name }}</div>
                        <div class="display-4 my-4">{{ $offer->genre }}</div>
                        <div class="display-5 my-4">
                            {!! $offer->description !!}
                        </div>
                        <div class="text-center mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route("offers.edit",$offer->id) }}" class="btn btn-primary btn-block">تعديل</a>
                                </div>
                                <div class="col-md-6">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete">
                                        حذف
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">هل ترغب فى حذف الباقة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-footer">
                                            <a href="{{ route("offers") }}" class="btn btn-secondary" data-dismiss="modal">الغاء</a>
                                            <form action="{{ route("offers.delete") }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $offer->id }}">
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        @empty
            <div class="alert alert-warning">
                لا توجد بيانات لعرضها
            </div>
        @endforelse
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
