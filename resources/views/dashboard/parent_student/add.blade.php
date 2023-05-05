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
                    <h4 class="card-title mb-1">اضافة طالب للمعلم</h4>
                    <p class="mb-2">اضافة طالب للمعلم فى أكاديمية القراءن</p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route("parent_student_relation") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="myusers">اختر الطالب</label>
                            <input type="text" id="myInput" class="form-control" placeholder="Search...">
                            <select name="student" class="form-control" id="myusers">
                                <option selected>اختر الطالب</option>
                                @forelse($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option disabled>لا يوجد طلاب بعد</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="myusers">اختر ولى الامر</label>
                            <input type="text" id="myTeacher" class="form-control" placeholder="Search...">
                            <select name="parent" class="form-control" id="my_teacher">
                                <option selected>اختر ولى الامر</option>
                                @forelse($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @empty
                                    <option disabled>لا يوجد أولياء أمور بعد</option>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Load Popper.js (if using Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Load Bootstrap JavaScript files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
document.getElementById("myInput").onkeyup=function (){
    val=document.getElementById("myInput").value
    $.ajax({
        url: "{{ route('student.ajax.search') }}",
        type: 'GET',
        data:{
            'value':val
        },
        success: function(data) {
            // Do something with the data
            select=document.getElementById("myusers");
            select.innerHTML=''
            if(data.length > 0){
                for (let i = 0; i < data.length; i++) {
                    select.innerHTML+=`<option value="${data[i].id}">${data[i].name}</option>`
                }
            }else if(data.length == 0){
                select.innerHTML+=`<option disabled>لا توجد خيارات تطابق هذا الاسم</option>`
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle any errors
            console.log('Error:', textStatus, errorThrown);
        }
    });
}

document.getElementById("myTeacher").onkeyup=function (){
    val=document.getElementById("myTeacher").value
    $.ajax({
        url: "{{ route('parent.ajax.search') }}",
        type: 'GET',
        data:{
            'value':val
        },
        success: function(data) {
            // Do something with the data
            select=document.getElementById("my_teacher");
            select.innerHTML=''
            if(data.length > 0){
                for (let i = 0; i < data.length; i++) {
                    select.innerHTML+=`<option value="${data[i].id}">${data[i].name}</option>`
                }
            }else if(data.length == 0){
                select.innerHTML+=`<option disabled>لا توجد خيارات تطابق هذا الاسم</option>`
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle any errors
            console.log('Error:', textStatus, errorThrown);
        }
    });
}
</script>
@endsection
