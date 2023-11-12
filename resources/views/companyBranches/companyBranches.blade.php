@extends('layouts.master')
@section('title')
الفروع
@stop
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">تهيئة النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ شاشة ادخال فروع الشركة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
            <!-- row opened -->
                <!--div-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="main-content-label mg-b-5">
                                   الفروع
                                </div>
                                <p class="mg-b-20">هنا يجب عليك ادخال جميع الفروع للشركة .</p>
                                <hr>

                                <div class="d-flex">
                                    <a class="btn ripple btn-primary" data-target="#add_modal" data-toggle="modal" href="">إضافة فرع جديدة</a>
                                    &nbsp;&nbsp;
                                    {{-- <a class="btn ripple btn-primary" data-target="#add_modal_1" data-toggle="modal" href="">العملات</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1" data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th class="wd-5p border-bottom-0">ر.ت</th>
                                                <th class="wd-10p border-bottom-0">اسم الفرع بالعربي</th>
                                                <th class="wd-10p border-bottom-0">اسم الفرع بالانجليزي</th>
                                                <th class="wd-5p border-bottom-0">عنوان الشركة</th>
                                                <th class="wd-5p border-bottom-0">رقم الهاتف 1</th>
                                                <th class="wd-5p border-bottom-0">رقم الهاتف 2</th>
                                                <th class="wd-5p border-bottom-0">رقم الهاتف 3</th>
                                                <th class="wd-5p border-bottom-0">الباريد الاكتروني</th>
                                                <th class="wd-5p border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i =0?>
                                                @foreach($companyBranches as $x)
                                                    <?php $i++?>
                                                <tr>
                                                    <td class="wd-5p border-bottom-0">{{$i}}</td>
                                                    <td>{{$x->branch_aname}}</td>
                                                    <td>{{$x->branch_ename	}}</td>
                                                    <td>{{$x->address}}</td>
                                                    <td>{{$x->phone_1}}</td>
                                                    <td>{{$x->phone_2}}</td>
                                                    <td>{{$x->phone_3}}</td>
                                                    <td>{{$x->email}}</td>
                                                    <td class="wd-10p border-bottom-0">

                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-id="{{ $x->id }}" data-branch_aname="{{ $x->branch_aname}}"
                                                            data-branch_ename="{{ $x->branch_ename}}"
                                                            data-address="{{ $x->address}}"data-phone_1="{{ $x->phone_1}}"
                                                            data-phone_2="{{ $x->phone_2}}"data-phone_3="{{ $x->phone_3}}"
                                                            data-email="{{ $x->email}}"
                                                            data-toggle="modal" href="#update_Modal"
                                                            title="تعديل"><i class="las la-pen"></i></a>

                                                            &nbsp;&nbsp;

                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{ $x->id }}" data-branch_aname="{{ $x->branch_aname }}"
                                                            data-toggle="modal"
                                                            href="#delete_modal" title="حذف"><i class="las la-trash"></i></a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>
                </div>
                <!--/div-->
                <!-- Basic modal -->
                    <div class="modal" id="add_modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">إضافة فرع جديدة للشركة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('companyBranches.store') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الفرع بالعربي</label>
                                            <input type="text" class="form-control" id="branch_aname" name="branch_aname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الفرع بالانجليزي</label>
                                            <input type="text" class="form-control" id="branch_ename" name="branch_ename">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">العنوان</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 1</label>
                                            <input type="number" value='0' class="form-control" id="phone_1" name="phone_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 2</label>
                                            <input type="number" value='0' class="form-control" id="phone_2" name="phone_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 3</label>
                                            <input type="number" value='0' class="form-control" id="phone_3" name="phone_3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني </label>
                                            <input type="email" placeholder="example@mttnet.ly" class="form-control" id="email" name="email">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Basic modal -->

                <!-- edit -->
                    <div class="modal fade" id="update_Modal" tabindex="-1" role="dialog" aria-labelledby="edit_Modal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات البنك</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="companyBranches/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="recipient-name" class="col-form-label">اسم الفرع بالعربي :</label>
                                            <input class="form-control" name="branch_aname" id="branch_aname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الفرع بالانجليزي</label>
                                            <input type="text" class="form-control" id="branch_ename" name="branch_ename">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">العنوان</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 1</label>
                                            <input type="number" value='0' class="form-control" id="phone_1" name="phone_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 2</label>
                                            <input type="number" value='0' class="form-control" id="phone_2" name="phone_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الهاتف 3</label>
                                            <input type="number" value='0' class="form-control" id="phone_3" name="phone_3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني </label>
                                            <input type="email" placeholder="example@mttnet.ly" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End edit -->

                <!-- delete -->
                    <div class="modal" id="delete_modal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف بيانات الفرع</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="companyBranches/destroy" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="branch_aname" id="branch_aname" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!--End  delete -->

            <!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<script>
    $('#update_Modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var branch_aname = button.data('branch_aname')
        var branch_ename = button.data('branch_ename')
        var address      = button.data('address')
        var phone_1      = button.data('phone_1')
        var phone_2      = button.data('phone_2')
        var phone_3      = button.data('phone_3')
        var email        = button.data('email')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #branch_aname').val(branch_aname);
        modal.find('.modal-body #branch_ename').val(branch_ename);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #phone_1').val(phone_1);
        modal.find('.modal-body #phone_2').val(phone_2);
        modal.find('.modal-body #phone_3').val(phone_3);
        modal.find('.modal-body #email').val(email);
    })
</script>

<script>
    $('#delete_modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var branch_aname = button.data('branch_aname')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #branch_aname').val(branch_aname);
    })

</script>

@endsection
