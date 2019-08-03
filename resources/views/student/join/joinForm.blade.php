<h2>الطالب : طالب جديد طالب مستجد, أكمل تعبئة البيانات لاتمام التحاقك بالكلية</h2>

<!-- progressbar -->

<!-- fieldsets -->

<fieldset>


    <ul id="progressbar">
        <li class="active">البيانات الشخصية</li>
        <li>البيانات الشخصية</li>
        <li>بيانات الثانوية العامة</li>
        <li>بيانات التجسير</li>
    </ul>

    <h2 class="fs-title">البيانات الشخصية</h2>
    <h3 class="fs-subtitle">طلب التحاق خطوة 1 من 4 </h3>

    <hr style="  border: 1px solid gray; ">

    {{--Form Begin--}}
    <div class="col-md-4">
    {{--<div class="box box-primary">--}}
    <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>رقم هويتك</label>
                {{--{{dd(old('ssn'))}}--}}
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->ssn :old('ssn') }}"
                       required name="ssn" type="text"
                       class="form-control" minlength="9" maxlength="9"
                       placeholder="أدخل رقم هويتك ( 9 أرقام )">
            </div>

            <div class="form-group">
                <label>الديانة</label>
                <select name="religion_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    @foreach($religions  as $religion )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->religion_id==$religion->id )
                                value="{{auth()->user()->studentpersonal->religion_id }}" selected
                                @elseif(old('religion_id')==$religion->id)
                                value="{{$religion->id }}" selected
                                @else
                                value="{{$religion->id }}"
                                @endif
                        >{{$religion->name}}</option>
                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label>اسمك الأول بال E </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->first_name_en : old('first_name_en')}} "
                       required name="first_name_en"
                       type="text"
                       class="form-control" placeholder="اسمك الأول">
            </div>

            <div class="form-group">
                <label>اسم العائلة بال E </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->fourth_name_en : old('fourth_name_en')}} "
                       required name="fourth_name_en"
                       type="text"
                       class="form-control"
                       placeholder="اسم العائلة ">
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="col-md-4">
    {{--<div class="box box-primary">--}}
    <!-- /.box-header -->
        <div class="box-body">

            <div class="form-group">
                <label>أدخل رقم الجوال </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->mobile : old('mobile')}}"
                       required
                       name="mobile" class="form-control"
                       type="text" minlength="10" maxlength="10"
                       placeholder="أدخل رقم الجوال (10 أرقام)">
            </div>

            <div class="form-group">
                <label>الجنسية</label>
                <select name="nationality" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected--}}
                    {{--                            value="{{isset(auth()->user()->studentpersonal->nationality)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->countries->nationality : old('nationality')}}</option>--}}
                    @foreach($countries  as $country )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->country_id==$country->id )
                                value="{{auth()->user()->studentpersonal->country_id}}" selected
                                @elseif(old('nationality')==$country->id)
                                value="{{$country->id }}" selected
                                @else
                                value="{{$country->id }}"
                                @endif
                        >{{$country->nationality}}</option>
                    @endforeach


                </select>
            </div>

            <div class="form-group">
                <label>أول حرف من اسم الأب بال E</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->second_name_en : old('second_name_en')}} "
                       required name="second_name_en"
                       type="text" maxlength="1"
                       class="form-control"

                       placeholder="أول حرف من اسم الأب">
            </div>

            <div class="form-group">
                <label>الحالة الاجتماعية</label>
                <select name="socialstatus_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--                            value="{{isset(auth()->user()->studentpersonal->socialstatus_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->socialstatus->name : old('socialstatus_id')}}</option>--}}
                    @foreach($socialStatus  as $socialState )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->socialstatus_id==$socialState->id )
                                value="{{auth()->user()->studentpersonal->socialstatus_id}}" selected
                                @elseif(old('socialstatus_id')==$socialState->id)
                                value="{{$socialState->id }}" selected
                                @else
                                value="{{$socialState->id }}"
                                @endif
                        >{{$socialState->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <!-- /.box-body -->

    </div>

    <div class="col-md-4">

        <!-- /.box-header -->
        <div class="box-body">

            <div class="form-group">
                <label>أدخل رقم جوال ثاني(اختياري)</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->mobile_2 : old('mobile_2')}}"
                       required
                       name="mobile_2" class="form-control"
                       type="text" minlength="10" maxlength="10"
                       placeholder="أدخل رقم الجوال (10 أرقام)">
            </div>

            <div class="form-group">
                <label>أدخل بريدك الالكتروني </label>
                <input value="{{isset(auth()->user()->email)?auth()->user()->email : old('email')}} " required
                       name="email" type="email"
                       class="form-control"
                       placeholder=" أدخل بريدك الالكتروني">
            </div>

            <div class="form-group">
                <label>أول حرف من اسم الجد بال
                    <E></E>
                </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->third_name_en : old('third_name_en')}} "
                       required name="third_name_en"
                       type="text" maxlength="1"
                       class="form-control"

                       placeholder="أول حرف من اسم الجد">
            </div>


            <div class="form-group">
                <input name="image" type='file' onchange="readURL(this);"/>
                <img id="blah"
                     src="{{isset(auth()->user()->studentpersonal)?asset('images/students_photos/'.auth()->user()->studentpersonal->image): old('image')}}"
                     alt="your image" style="margin-left:50px"/>
            </div>

            <!-- /.box-body -->
        </div>


    </div>


    <input type="button" name="next" class="next action-button" value="التالي"/>

</fieldset>

{{--end first step --}}


<fieldset>

    <ul id="progressbar">
        <li class="active">البيانات الشخصية</li>
        <li class="active">البيانات الشخصية</li>
        <li>بيانات الثانوية العامة</li>
        <li>بيانات التجسير</li>
    </ul>
    <h2 class="fs-title">البيانات الشخصية</h2>
    <h3 class="fs-subtitle">طلب التحاق خطوة 2 من 4 </h3>

    <hr style="  border: 1px solid gray; ">


    <div class="col-md-4">
    {{--<div class="box box-primary">--}}
    <!-- /.box-header -->
        <div class="box-body">

            <div class="form-group">
                <label>مكان االمبلاد</label>
                <select name="country_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--                            value="{{isset(auth()->user()->studentpersonal->country_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->country->name_ar : old('country_id')}}</option>--}}

                    @foreach($countries  as $country )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->country_id==$country->id )
                                value="{{auth()->user()->studentpersonal->country_id}}" selected
                                @elseif(old('country_id')==$country->id)
                                value="{{$country->id }}" selected
                                @else
                                value="{{$country->id }}"
                                @endif
                        >{{$country->name_ar}}</option>
                    @endforeach


                </select>
            </div>

            <div class="form-group">
                <label>اسم ولي الأمر</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian : old('guardian')}} "
                       required
                       name="guardian" type="text"
                       class="form-control"
                       placeholder="اسم ولي الأمر">
            </div>

            <div class="form-group">
                <label>المدينة</label>
                <select id="City" name="city_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    <option selected disabled>اختر المدينة</option>

                    <option selected="selected"
                            value="{{isset(auth()->user()->studentpersonal->city_id )}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->city->name_ar: old('city_id')}} </option>

                    @foreach($cities  as $city)
                        <option value="{{$city->id}}"> {{$city->name_ar}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>الجنس</label>
                <select name="gender" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--                    <option value="{{isset(auth()->user()->studentpersonal->gender)}})">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->gender : old('gender')}}</option>--}}
                    <option selected value="1">ذكر</option>
                    <option value="2">انثى</option>

                </select>
            </div>
        </div>
    </div>


    <div class="col-md-4">

        <div class="box-body">

            <div class="form-group">
                <label>مثال 05-09-1997</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->dob : old('dob')}} "
                       required
                       name="dob" type="date"
                       class="form-control"
                       placeholder="مثال 05-09-1997">
            </div>


            <div class="form-group">
                <label>صلة القرابة: أب, أم, أخ, عم ..</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian_type : old('guardian_type')}} "
                       required name="guardian_type"
                       type="text"
                       class="form-control"
                       placeholder="صلة القرابة: أب, أم, أخ, عم ..">
            </div>

            <div class="form-group">
                <label>المنطقة</label>
                <select id="regions" name="region_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    <option selected="selected"
                            value="{{isset(auth()->user()->studentpersonal->region_id )}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->region->name_ar: old('region_id')}} </option>

                    {{--@foreach($regions  as $region )--}}
                    {{--<option value="{{$region->id}}"> {{$region->name}}</option>--}}
                    {{--@endforeach--}}

                </select>
            </div>


            <div class="form-group">
                <label>الحالة الصحية </label>
                <select name="healthstatus_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--value="{{isset(auth()->user()->studentpersonal->healthstatus_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->healthstatus->name : old('healthstatus_id')}}</option>--}}

                    @foreach($healthstatus  as $healthstate )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->healthstatus_id==$healthstate->id )
                                value="{{auth()->user()->studentpersonal->healthstatus_id}}" selected
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
        <!-- /.box-body -->
    </div>


    <div class="col-md-4">
    {{--<div class="box box-primary">--}}
    <!-- /.box-header -->
        <div class="box-body">


            <div class="form-group">
                <label>أدخل رقم هاتفك </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->home_phone : old('home_phone')}} "
                       required maxlength="7" minlength="7"
                       name="home_phone" type="text"
                       class="form-control"
                       placeholder="أدخل رقم هاتفك (7 أرقام )">
            </div>


            <div class="form-group">
                <label>رقم جوال ولي الأمر </label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->guardian_mobile : old('guardian_mobile')}} "
                       required name="guardian_mobile"
                       type="text" maxlength="10" minlength="10"
                       class="form-control"
                       placeholder="رقم الجوال (10 أرقام)">
            </div>

            <div class="form-group">
                <label>الشارع</label>
                <input value="{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->street : old('street')}} "
                       required
                       name="street" type="text"
                       class="form-control"
                       placeholder="الشارع">
            </div>

            <div class="form-group">
                <label>احتياج خاص</label>
                <select name="specialneed_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--                            value="{{isset(auth()->user()->studentpersonal->specialneed_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->specialneed->name : old('specialneed_id')}}</option>--}}

                    @foreach($specialneeds  as $specialneed )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->specialneed_id==$specialneed->id )
                                value="{{auth()->user()->studentpersonal->healthstatus_id}}" selected
                                @elseif(old('specialneed_id')==$specialneed->id)
                                value="{{$specialneed->id }}" selected
                                @else
                                value="{{$specialneed->id }}"
                                @endif
                        >{{$specialneed->name}}</option>
                    @endforeach


                </select>
            </div>


        </div>
        <!-- /.box-body -->
    </div>


    <input required type="button" name="previous" class="previous action-button" value="السابق"/>
    <input type="button" name="next" class="next action-button" value="التالي"/>

</fieldset>


{{--end second --}}


<fieldset>

    <ul id="progressbar">
        <li class="active">البيانات الشخصية</li>
        <li class="active">البيانات الشخصية</li>
        <li class="active">بيانات الثانوية العامة</li>
        <li>بيانات التجسير</li>
    </ul>

    <h2 class="fs-title">بيانات الثانوية العامة</h2>
    <h3 class="fs-subtitle">طلب التحاق خطوة 3 من 4 </h3>

    <hr style="  border: 1px solid gray; ">

    <div class="row">
        <div class="col-md-3">
        {{--<div class="box box-primary">--}}
        <!-- /.box-header -->
            <div class="box-body">

                <div class="form-group">
                    <label>المديرية</label>
                    <select name="Directorate" id="Directorate"
                            class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true">
                        <option selected disabled>اختر المديرية</option>
                        <option value="0">شمال غزة</option>
                        <option value="1">شرق غزة</option>
                        <option value="2">غرب غزة</option>
                        <option value="3">الوسطى</option>
                        <option value="4">خانيونس</option>
                        <option value="5">شرق خانيونس</option>
                        <option value="6">رفح</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="col-md-3">
        {{--<div class="box box-primary">--}}
        <!-- /.box-header -->
            <div class="box-body">

                <div class="form-group">
                    <label>مدرسة الثانوية العامة</label>
                    <select id="schools" name="high_school_name"
                            class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true">
                        <option value="{{isset(auth()->user()->studenthighschool)?auth()->user()->studenthighschool->high_school_name : old('high_school_name')}}">
                            {{isset(auth()->user()->studenthighschool)?auth()->user()->studenthighschool->high_school_name : old('high_school_name')}}</option>

                    </select>
                </div>

            </div>
        </div>

        <div class="col-md-3">
        {{--<div class="box box-primary">--}}
        <!-- /.box-header -->
            <div class="box-body">

                <div class="form-group">
                    <label>رقم الجلوس في الثانوية العامة</label>
                    <input value="{{isset(auth()->user()->studenthighschool)?auth()->user()->studenthighschool->high_school_number : old('high_school_number')}} "
                           required
                           name="high_school_number"
                           type="text" class="form-control"
                           placeholder="رقم الجلوس في الثانوية العامة">
                </div>

            </div>
        </div>

        <div class="col-md-3">
        {{--<div class="box box-primary">--}}
        <!-- /.box-header -->
            <div class="box-body">

                <div class="form-group">
                    <label>سنة الثانوية العامة</label>
                    <input value="{{isset(auth()->user()->studenthighschool)?auth()->user()->studenthighschool->high_school_year : old('high_school_year') }} "
                           required
                           name="high_school_year"
                           type="text" class="form-control"
                           placeholder="سنة الثانوية العامة">
                </div>

            </div>
        </div>


        <div class="col-md-3">
            <div class="box-body">

                <div class="form-group">
                    <label>نوع الثانوية العامة </label>
                    <select name="highschoolbranch_id"
                            class="form-control select2 select2-hidden-accessible"
                            tabindex="-1" aria-hidden="true">

                        @foreach($highschoolbranches  as $highschoolbranch )
                            <option
                                    @if(isset(auth()->user()->studenthighschool)&& auth()->user()->studenthighschool->highschoolbranch_id==$highschoolbranch->id )
                                    value="{{auth()->user()->studenthighschool->highschoolbranch_id}}" selected
                                    @elseif(old('highschoolbranch_id')==$highschoolbranch->id)
                                    value="{{$highschoolbranch->id }}" selected
                                    @else
                                    value="{{$highschoolbranch->id }}"
                                    @endif
                            >{{$highschoolbranch->name}}</option>
                        @endforeach


                    </select>
                </div>
            </div>

        </div>
    </div>


    <div class="row">

        <hr>

        <div class="col-md-4">
            <div class="form-group">
                <label>القسم الذي ترغب بالاتحاق
                    به؟</label>
                <select name="department_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--value="{{isset(auth()->user()->studentacademic->department_id)}}">{{isset(auth()->user()->studentacademic)?auth()->user()->studentacademic->department->department_name : old('department_id') }}</option>--}}
                    @foreach($departments  as $department )
                        <option
                                @if(isset(auth()->user()->studentacademic)&& auth()->user()->studentacademic->department_id==$department->id )
                                value="{{auth()->user()->studentacademic->department_id}}" selected
                                @elseif(old('department_id')==$department->id)
                                value="{{$department->id }}" selected
                                @else
                                value="{{$department->id }}"
                                @endif
                        >{{$department->department_name}}</option>
                    @endforeach


                </select>
            </div>

        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>كيف عرفت عنا؟ </label>
                <select name="knowabout_id" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;"
                        tabindex="-1" aria-hidden="true">
                    {{--<option selected="selected"--}}
                    {{--value="{{isset(auth()->user()->studentpersonal->knowabout_id)}}">{{isset(auth()->user()->studentpersonal)?auth()->user()->studentpersonal->knowabout->name : old('knowabout_id')}}</option>--}}

                    @foreach($Knowabouts  as $Knowabout )
                        <option
                                @if(isset(auth()->user()->studentpersonal)&& auth()->user()->studentpersonal->knowabout_id==$Knowabout->id )
                                value="{{auth()->user()->studentpersonal->knowabout_id}}" selected
                                @elseif(old('knowabout_id')==$Knowabout->id)
                                value="{{$Knowabout->id }}" selected
                                @else
                                value="{{$Knowabout->id }}"
                                @endif
                        >{{$Knowabout->name}}</option>
                    @endforeach

                </select>
                {{--<span class="select2 select2-container select2-container--default select2-container--above select2-container--focus" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9027-container"><span class="select2-selection__rendered" id="select2-9027-container" title="Delaware">Delaware</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
            </div>

        </div>
    </div>
    <hr>

    <input type="button" name="previous" class="previous action-button" value="السابق"/>
    <input type="button" name="next" class="next action-button" value="التالي"/>
</fieldset>


{{--end thired step--}}

<fieldset>

    <ul id="progressbar">
        <li class="active">البيانات الشخصية</li>
        <li class="active">البيانات الشخصية</li>
        <li class="active">بيانات الثانوية العامة</li>
        <li class="active">بيانات التجسير</li>
    </ul>

    <h2 class="fs-title">بيانات التجسير</h2>
    <h3 class="fs-subtitle">طلب التحاق خطوة 4 من 4 </h3>

    <hr style="border: 1px solid gray; ">
    <div class="row">
        <div class="box-body">


            <div class="col-md-3">
                هل انت طالب تجسير ؟
            </div>

        </div>
    </div>

    <div class="row">
        <div class="box-body">

            {{--<div class="col-md-1">--}}
            {{--<label>--}}
            {{--نعم--}}
            {{--</label>--}}
            {{--</div>--}}


            <div class="col-md-1">

                <div class="box-body">
                    <div class="checkbox" style="float:right;">
                        <label>
                            نعم <input type="checkbox" name="isBridging" value="checkBridging">

                        </label>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="control-group" id="content" hidden>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="box-body">

                    <div class="form-group">
                        <label>اسم الجامعة السابقة</label>
                        <input value="{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->university_name : old('university_name') }} "
                               name="university_name"
                               type="text" class="form-control"
                               placeholder="اسم الجامعة السابقة">
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="box-body">

                    <div class="form-group">
                        <label>الكلية السابقة</label>
                        <input value="{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->college : old('college')}} "
                               name="college" type="text"
                               class="form-control"
                               placeholder="الكلية السابقة">
                    </div>

                </div>
            </div>

            <div class="col-md-4">
            {{--<div class="box box-primary">--}}
            <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <label>القسم السابق</label>
                        <input value="{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->department : old('department')}} "
                               name="department"
                               type="text"
                               class="form-control"
                               placeholder="القسم السابق">
                    </div>

                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-4">
            {{--<div class="box box-primary">--}}
            <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <label>عام التخرج</label>
                        <input value="{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->graduate_year : old('graduate_year')}} "
                               name="graduate_year"
                               type="text" class="form-control"
                               placeholder="عام التخرج">
                    </div>

                </div>
            </div>

            <div class="col-md-4">
            {{--<div class="box box-primary">--}}
            <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <label>معدل التخرج</label>
                        <input value="{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->gpa : old('gpa')}} "
                               name="gpa" type="text"
                               class="form-control" maxlength="2" minlength="2"
                               placeholder="معدل التخرج">
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="box-body">

                    <div class="form-group">
                        <label>تقدير الشامل </label>
                        <select name="com_exam" class="form-control select2 select2-hidden-accessible"
                                style="width: 100%;"
                                tabindex="-1" aria-hidden="true">
                            {{--                            <option selected>{{isset(auth()->user()->studentbridging)?auth()->user()->studentbridging->com_exam : old('com_exam')}}</option>--}}
                            @foreach($comExams  as $comExam )
                                <option
                                        @if(isset(auth()->user()->studentbridging)&& auth()->user()->studentbridging->com_exam==$comExam->id )
                                        value="{{auth()->user()->studentbridging->com_exam}}" selected
                                        @elseif(old('com_exam')==$comExam->id)
                                        value="{{$comExam->id }}" selected
                                        @else
                                        value="{{$comExam->id }}"
                                        @endif
                                >{{$comExam->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group form-md-line-input has-info">
                <div class="md-checkbox">
                    <input name="conf" type="checkbox" id="checkbox33" class="md-check" required>
                    <span></span>
                    <p for="checkbox33">
                        أتعهد بصحة البيانات المُدخـلة
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span></p>

                </div>
            </div>
        </div>
    </div>

    <input type="button" name="previous" class="previous action-button" value="السابق"/>
    <input type="submit" name="submit" class="submit action-button" value="حفظ"/>

</fieldset>


{{--end forth step--}}


{{--new copy END--}}
