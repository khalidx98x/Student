@extends('admin.index')
@section('content')




    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">الطالب: {{auth()->user()->first_name}}</h3>

                        <p style="font-weight: bold" class="text-muted text-center">{{auth()->user()->student_id}}</p>
                        <hr>
                        <br>
                        <br>
                        <div class="col-md-6">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>الاسم الرباعي: </b>
                                    <p style="font-weight: bold ; color: darkgrey; display: inline;"> {{auth()->user()->first_name}} {{auth()->user()->second_name}} {{auth()->user()->third_name}} {{auth()->user()->fourth_name}}</p>
                                </li>

                                <li class="list-group-item">
                                    <b>المعدل: </b>
                                    <p style="font-weight: bold ; color: darkgrey; display: inline;">{{auth()->user()->high_school_gpa}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>البريد الالكتروني: </b>
                                    <p style="font-weight: bold ; color: darkgrey; display: inline;"> {{auth()->user()->email}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>الحالة: </b>
                                    {{--                                <a> {{auth()->user()->Stdstatuses->name}}</a>--}}
                                </li>

                            </ul>

                            <a type="button" href="{{route('student.dashboard.edit')}}" class="btn btn-primary" > تعديل المعلومات الشخصية</a>
                        </div>

                        <div class="col-md-6">
                            <img class=" img-thumbnail profile-user-img img-responsive img-bordered-sm center-block "
                                 src="{{asset('images/students_photos/'.auth()->user()->studentpersonal->image)}}"
                                 alt="User profile picture">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>



@endsection

