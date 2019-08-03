@extends('admin.index')
@section('content')




    <section class="content">
        <div class="row">
            <div class="col-md-11">

                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">الطالب: {{auth()->user()->first_name}}</h3>

                        <p style="font-weight: bold" class="text-muted text-center">{{auth()->user()->student_id}}</p>

                        <h2 class="profile-username text-center">تعديل المعلومات الشخصية</h2>

                        <hr>
                        <br>
                        <br>
                        <form class="form-horizontal" method="post" action="{{route('student.dashboard.update')}}">

                            @csrf

                            <div class="box box-info">
                                <div class="box-header with-border col-md-12 " style="background-color:whitesmoke">
                                    <h3 class="box-title ">الباينات الأساسية</h3>
                                </div>
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="box-body">


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">رقم الهوية </label>

                                                <div class="col-sm-5">
                                                    <input name="ssn" type="text" class="form-control"
                                                           value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->ssn :old('ssn')}}"
                                                           placeholder="رقم الهوية">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">تاريخ الميلاد </label>

                                                <div class="col-sm-5">
                                                    <input name="dob" type="text" class="form-control"
                                                           value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->dob :old('dob')}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">مكان الميلاد </label>

                                                <div class="col-sm-5">
                                                    <select name="country_id"
                                                            class="form-control select2 select2-hidden-accessible"

                                                            tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"
                                                                value="{{isset(auth()->user()->studentpersonal->country_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->country->name_ar : old('country_id')}}</option>

                                                        @foreach($countries  as $country )
                                                            <option
                                                                    @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->country_id==$country->id )
                                                                    value="{{auth()->user()->studentpersonal->country_id}}"
                                                                    selected
                                                                    @elseif(old('country_id')==$country->id)
                                                                    value="{{$country->id }}" selected
                                                                    @else
                                                                    value="{{$country->id }}"
                                                                    @endif
                                                            >{{$country->name_ar}}</option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">المدينة </label>

                                                <div class="col-sm-5">
                                                    <select id="City" name="city_id"
                                                            class="form-control select2 select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                        <option selected disabled>اختر المدينة</option>
                                                        <option selected="selected"
                                                                value="{{isset(auth()->user()->studentpersonal->city_id )}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->city->name_ar: old('city_id')}} </option>

                                                    @foreach($cities  as $city)
                                                            <option value="{{$city->id}}"> {{$city->name_ar}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">المنطقة </label>

                                                <div class="col-sm-5">
                                                    <select id="regions" name="region_id"
                                                            class="form-control select2 select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"
                                                                value="{{isset(auth()->user()->studentpersonal->region_id )}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->region->name_ar: old('region_id')}} </option>

                                                        @foreach($regions  as $region )
                                                            <option value="{{$region->id}}"> {{$region->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">الشارع </label>

                                                <div class="col-sm-5">
                                                    <input name="street" type="text" class="form-control"
                                                           value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->street : old('street')}} ">
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>


                            </div>
                            <div class="box-header with-border col-md-12" style="background-color:whitesmoke ">
                                <h3 class="box-title ">الباينات التفصيلية</h3>
                            </div>
                            <br>
                            <br>

                            {{--second box--}}
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="box box-default">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">الاسم باللغة الانجليزية</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool"
                                                        data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                                    <i
                                                            class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body" style="">
                                            <div class="row">


                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">الاسم الأول </label>

                                                        <div class="col-sm-8">
                                                            <input name="first_name_en" type="text" class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->first_name_en : old('first_name_en')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">الاسم الأب </label>

                                                        <div class="col-sm-8">
                                                            <input name="second_name_en" type="text"
                                                                   class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->second_name_en : old('second_name_en')}} ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">الاسم الجد </label>

                                                        <div class="col-sm-8">
                                                            <input name="third_name_en" type="text" class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->third_name_en : old('third_name_en')}} ">
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>


                                {{--second select box --}}
                                <div class="col-md-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">بيانات التواصل</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool"
                                                        data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                                    <i
                                                            class="fa fa-remove"></i></button>
                                            </div>
                                        </div>

                                        <!-- /.box-header -->

                                        <div class="box-body" style="">
                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">رقم الجوال</label>

                                                        <div class="col-sm-8">
                                                            <input name="mobile" type="text" class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->mobile : old('mobile')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">رقم الجوال الثاني
                                                            (اختياري)</label>

                                                        <div class="col-sm-8">
                                                            <input name="mobile_2" type="text" class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->mobile_2 : old('mobile_2')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">رقم الهاتف</label>

                                                        <div class="col-sm-8">
                                                            <input name="home_phone" type="text"
                                                                   class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->home_phone : old('home_phone')}} ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">البريد الالكنروني </label>

                                                        <div class="col-sm-8">
                                                            <input name="email" type="text"
                                                                   class="form-control"
                                                                   value="{{isset(auth()->user()->email)?auth()->user()->email : old('email')}} ">
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>


                            {{--third row --}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">بيانات ولي الأمر</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool"
                                                        data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                                    <i
                                                            class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body" style="">
                                            <div class="row">


                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">اسم ولي الأمر </label>

                                                        <div class="col-sm-8">
                                                            <input name="guardian" type="text" class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian : old('guardian')}} ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">صلة القرابة </label>

                                                        <div class="col-sm-8">
                                                            <input name="guardian_type" type="text"
                                                                   class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian_type : old('guardian_type')}} ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"> جوال ولي الامر </label>

                                                        <div class="col-sm-8">
                                                            <input name="guardian_mobile" type="text"
                                                                   class="form-control"
                                                                   value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian_mobile : old('guardian_mobile')}} ">
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">بيانات أخرى</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool"
                                                        data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                                    <i
                                                            class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body" style="">
                                            <div class="row">


                                                <div class="col-md-10">

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">الجنسية </label>

                                                        <div class="col-sm-7">
                                                            <select name="nationality"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    {{--                                                                    {{dd(auth()->user()->studentpersonal->nationality)}}--}}

                                                                    tabindex="-1" aria-hidden="true">
                                                                @foreach($countries  as $country )
                                                                    <option
                                                                            @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->country_id==$country->id )
                                                                            value="{{auth()->user()->studentpersonal->country_id}}"
                                                                            selected
                                                                            @elseif(old('nationality')==$country->id)
                                                                            value="{{$country->id }}" selected
                                                                            @else
                                                                            value="{{$country->id }}"
                                                                            @endif
                                                                    >{{$country->nationality}}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">الديانة </label>

                                                        <div class="col-sm-7">
                                                            <select name="religion_id"
                                                                    class="form-control select2 select2-hidden-accessible"

                                                                    tabindex="-1" aria-hidden="true">
                                                                @foreach($religions  as $religion )
                                                                    <option
                                                                            @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->religion_id==$religion->id )
                                                                            value="{{auth()->user()->studentpersonal->religion_id }}"
                                                                            selected
                                                                            @elseif(old('religion_id')==$religion->id)
                                                                            value="{{$religion->id }}" selected
                                                                            @else
                                                                            value="{{$religion->id }}"
                                                                            @endif
                                                                    >{{$religion->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">الحالة الصحية </label>

                                                        <div class="col-sm-7">
                                                            <select name="healthstatus_id"
                                                                    class="form-control select2 select2-hidden-accessible"

                                                                    tabindex="-1" aria-hidden="true">
                                                                @foreach($healthstatus  as $healthstate )
                                                                    <option
                                                                            @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->healthstatus_id==$healthstate->id )
                                                                            value="{{auth()->user()->studentpersonal->healthstatus_id}}"
                                                                            selected
                                                                            @elseif(old('healthstatus_id')==$healthstate->id)
                                                                            value="{{$healthstate->id }}" selected
                                                                            @else
                                                                            value="{{$healthstate->id }}"
                                                                            @endif
                                                                    >{{$healthstate->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info center-block ">حفظ البيانات</button>
                            </div>

                        </form>

                        <!-- /.box-body -->
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

