@extends('admin.index')
@section('contact_massages')




    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ trans('admin.name') }}</th>
                            <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ trans('admin.email') }}</th>
                            <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{ trans('admin.subject') }}</th>


                            <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ trans('admin.action') }}</th>
                        </tr>
                        </thead>


                        <tbody>


                        <!-- loop  -->
                        <tr class="isread" role="row" class="odd">

                            <td>ffhdggjgjj</td>
                            <td>gfjgfjgfjjf</td>
                            <td>fgjgfjfgj</td>

                            <td><button class="btn btn-primary" type="button" id="btnms">{{ trans('admin.show-body') }}</button>
                                <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> </a></td>


                        </tr>

                        <tr>
                            <td colspan="4">

                                <div class="qwe">
                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">{{ trans('admin.Crate_massages') }}</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form">
                                                    <div class="box-body">
                                                        <!-- show body massage whit <p> -->
                                                        <h4>{{ trans('admin.body') }}</h4>
                                                        <p>gfgfgfgfgfgfgfgfgfgfgfgfgfgfgffgfgfg</p>

                                                        <div class="form-group">
                                                            <label for="replay">{{ trans('admin.replay') }} </label>
                                                            <input type="text" class="form-control" id="replay" placeholder=" replay">
                                                        </div>


                                                    </div>
                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </td>
                        </tr>





                        <tr  class="noread" role="row" class="odd">

                            <td>ffhdggjgjj</td>
                            <td>gfjgfjgfjjf</td>
                            <td>fgjgfjfgj</td>

                            <td><button class="btn btn-primary" type="button" id="btnms">{{ trans('admin.show-body') }}</button>
                                <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> </a>

                        </tr>








                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div></div>
            <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>
                <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                            <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
    </div>


<style>
    .isread{
           background-color:#D6EAF8;
       }
    .table-hover>tbody>tr.isread:hover{
        background-color:#D6EAF8;
    }


    .noread{
        background-color: #F4F6F7;
    }

    .table-hover>tbody>tr.noread:hover{
        background-color:#F4F6F7;
    }


    </style>


@endsection()













