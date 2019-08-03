@extends('admin.index')
@section('content')


    {{--<row>--}}
        {{--<row>--}}
            <form id="msform" method="post" action="{{route('student.join.update')}}"
                  enctype="multipart/form-data">


                @csrf
                @include('student.join.joinForm')

            </form>

        {{--</row>--}}
    {{--</row>--}}
@endsection


