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
    <h4 class="card-title mt-4">اضافة طالب جديد</h4>
     
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">اضافة طالب جديد</h4>
                    <p class="mb-2">اضافة طالب ل أكاديمية القراءن</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route("students.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="inputEmail3" placeholder="أدخل اسم الطالب">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail3" placeholder="أدخل بريد الكترونى للطالب">
                        </div>

                        <div class="form-group">
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="inputEmail3" placeholder="أدخل رقم هاتف الطالب">
                        </div>

                        <div class="form-group">
                            <input type="text" name="country" value="{{old('country')}}" class="form-control" id="inputEmail3" placeholder="أدخل دولة الطالب">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" id="inputEmail3" placeholder="أدخل الرقم السرى الطالب">
                        </div>

                        <div class="form-group">
                            <select class="form-select" name="offer" aria-label="Default select example">
                                <option selected>اختر الباقة</option>
                                @forelse ($offers as $offer)
                                    <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                                @empty
                                    <option value="0">لا يوجد باقات بعد</option>
                                @endforelse   
                            </select>
                        </div>
                        
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">اضافة</button>
                                <a href="{{ route("students") }}" class="btn btn-secondary">الغاء</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
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
<script src="{{URL::asset('assets/plugins/r


aphael/raphael.min.js')}}"></script>
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