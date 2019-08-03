@php
    $angle = \Session::get('lang') == "ar" ? "left" : "right"
@endphp


<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

    @include('admin.layout.menu')
    <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" >
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>



{{--@if(auth()->user()->stdstatus_id===1)--}}


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li>
                    <a href="#">
                        <i class="fa fa-home"></i> <span>الصفحة الرئيسية </span>

                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-user"></i> <span>تعديل المعلومات الشخصية</span>

                    </a>

                </li>
                {{--                @if($curr_sem->final_date > Carbon\Carbon::today())--}}
                {{--auth()->user()->created_at--}}
                @if(Carbon\Carbon::today()->diffInMonths(auth()->user()->created_at )>=6)
                    <li>
                        <a href="#">
                            <i class="fa fa-lock"></i> <span>تعديل كلمة المرور</span>
                        </a>

                    </li>
                @endif

                <li>
                    <a href="#"><i class="fa fa-sign-in"></i> <span>التسجيل الفصلي</span>

                    </a>

                </li>


                <li>
                    <a href="#">
                        <i class="fa fa-table"></i> <span>جدول الطالب</span>

                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-question-circle"></i> <span>طلبات الطلبة</span>

                    </a>

                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-table"></i> <span>جدول الامتحانات </span>

                    </a>

                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i> <span>علامات المساقات</span>

                    </a>

                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-dollar"></i> <span>الملف المالي</span>

                    </a>

                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

{{--@endif--}}