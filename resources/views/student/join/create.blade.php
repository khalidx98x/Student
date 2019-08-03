@extends('admin.index')
@section('content')



            <form id="msform" method="post" action="{{route('student.join.store')}}" enctype="multipart/form-data">


                @csrf


                @include('student.join.joinForm')

            </form>

@endsection

{{--@push('css')--}}
{{--<style>--}}
    {{--#msform {--}}
    {{--/*padding: 200px;*/--}}
    {{--width: 1200px;--}}
    {{--/*margin: 50px auto;*/--}}
    {{--margin-top: 10px;--}}
    {{--/*margin-right: 200px;*/--}}

    {{--text-align: center;--}}
    {{--position: relative;--}}
    {{--}--}}


    {{--#msform fieldset {--}}
    {{--background: white;--}}
    {{--border: 0 none;--}}
    {{--border-radius: 3px;--}}
    {{--box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);--}}
    {{--padding: 20px 30px;--}}
    {{--box-sizing: border-box;--}}
    {{--width: 80%;--}}
    {{--margin: 0 10%;--}}

    {{--/*stacking fieldsets above each other*/--}}
    {{--position: relative;--}}
    {{--}--}}

    {{--/*Hide all except first fieldset*/--}}
    {{--#msform fieldset:not(:first-of-type) {--}}
    {{--display: none;--}}
    {{--}--}}

    {{--/*inputs  */--}}
    {{--#msform input, textarea {--}}
    {{--padding: 15px;--}}
    {{--border: 1px solid #ccc;--}}
    {{--border-radius: 3px;--}}
    {{--. margin-bottom: 10 px;--}}
    {{--width: 100%;--}}
    {{--box-sizing: border-box;--}}
    {{--font-family: montserrat;--}}
    {{--color: #2C3E50;--}}
    {{--font-size: 13px;--}}
    {{--}--}}

    {{--#msform label {--}}
    {{--float: right;--}}
    {{--font-family: montserrat;--}}
    {{--color: darkgrey;--}}
    {{--font-size: 13px;--}}
    {{--}--}}

    {{--/*spans  */--}}
    {{--#number span .number {--}}
    {{--display: inline-block;--}}

    {{--/*margin-right: 4px;*/--}}
    {{--float: right;--}}
    {{--color: revert;--}}
    {{--/*width: 20%;*/--}}
    {{--font-family: montserrat;--}}
    {{--font-size: 13px;--}}
    {{--font-weight: bold;--}}
    {{--}--}}

    {{--/*buttons*/--}}
    {{--#msform .action-button {--}}
    {{--width: 100px;--}}
    {{--background: #27AE60;--}}
    {{--font-weight: bold;--}}
    {{--color: white;--}}
    {{--border: 0 none;--}}
    {{--border-radius: 1px;--}}
    {{--cursor: pointer;--}}
    {{--padding: 10px 5px;--}}
    {{--margin: 10px 5px;--}}
    {{--}--}}

    {{--#msform .action-button:hover, #msform .action-button:focus {--}}
    {{--box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;--}}
    {{--}--}}

    {{--/*headings*/--}}
    {{--.fs-title {--}}
    {{--font-size: 20px;--}}
    {{--text-transform: uppercase;--}}
    {{--color: #2C3E50;--}}
    {{--margin-bottom: 10px;--}}
    {{--}--}}

    {{--.fs-subtitle {--}}
    {{--font-weight: normal;--}}
    {{--font-size: 13px;--}}
    {{--color: #666;--}}
    {{--margin-bottom: 20px;--}}
    {{--}--}}


    {{--/*progressbar*/--}}

    {{--#progressbar {--}}
    {{--counter-reset: step;--}}
    {{--}--}}

    {{--#progressbar li {--}}
    {{--list-style-type: none;--}}
    {{--width: 25%;--}}
    {{--padding: 40px;--}}
    {{--float: right;--}}
    {{--font-size: 16px;--}}
    {{--font-style: revert;--}}
    {{--position: relative;--}}
    {{--text-align: center;--}}
    {{--text-transform: uppercase;--}}
    {{--color: #7d7d7d;--}}
    {{--}--}}

    {{--#progressbar li:before {--}}
    {{--width: 30px;--}}
    {{--height: 30px;--}}
    {{--content: counter(step);--}}
    {{--counter-increment: step;--}}
    {{--line-height: 30px;--}}
    {{--border: 2px solid #7d7d7d;--}}
    {{--display: block;--}}
    {{--text-align: center;--}}
    {{--margin: 0 auto 10px auto;--}}
    {{--border-radius: 50%;--}}
    {{--background-color: white;--}}


    {{--}--}}


    {{--#progressbar li:first-child:after {--}}
    {{--content: none;--}}
    {{--}--}}

    {{--#progressbar li.active {--}}
    {{--color: green;--}}
    {{--}--}}

    {{--#progressbar li.active:before {--}}
    {{--border-color: #55b776;--}}
    {{--}--}}

    {{--#progressbar li.active + li:after {--}}
    {{--background-color: #55b776;--}}
    {{--}--}}
    {{--</style>--}}
{{--@endpush--}}
{{--End section--}}



