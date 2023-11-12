@extends('layouts.master')
@section('title')
شجرت الحسابات
@stop
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
<!--Internal  datatable -->
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
							<h4 class="content-title mb-0 my-auto">الحسابات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ شجرت الحسابات </span>
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
				<div class="row">
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									شجرت الحسابات
								</div>
								<p class="mg-b-20">شجرة الحسابات ببساطة هي كشف أو بيان يتم فيه تسجيل كافة الحسابات الخاصة بالشركة. ويطلق عليها شجرة الحسابات نظرًا لأنها متفرعة على هيئة شكل شجري إلى عدة أقسام منها الحسابات الرئيسية والحسابات الفرعية. وتعتبر شجرة الحسابات هي القوام الأساسي لنظام المحاسبية.</p>
								<hr>
                                <hr>
                                <div class="row">
									<!-- col -->
                                   <div class="col-lg-4">
                                        <ul id=treeview1>
                                            @foreach($treeAccounts as $item)
                                                @if ($item->acc_level === 0  )
                                                    <li>
                                                        <a href="#">{{$item->acc_aname}} ({{$item->acc_id}})</a>
                                                        <ul>
                                                            @foreach ($treeAccounts  as $i)
                                                                @if ( $i->acc_level === 1 and $item->acc_id === $i->acc_parent_no )
                                                                    <li>
                                                                        <a href="#">{{$i->acc_aname}} ({{$i->acc_id}})</a>
                                                                        <ul >
                                                                            @foreach ($treeAccounts  as $j)
                                                                                @if ( $j->acc_level === 2 and $i->acc_id === $j->acc_parent_no )
                                                                                    <li>
                                                                                        <a href="#">{{$j->acc_aname}} ({{$i->acc_id}})</a>
                                                                                        <ul>
                                                                                            @foreach ($treeAccounts  as $k)
                                                                                                @if ( $k->acc_level === 3 and $j->acc_id === $k->acc_parent_no )
                                                                                                    <li>
                                                                                                        <a href="#">{{$k->acc_aname}} ({{$k->acc_id}})</a>
                                                                                                        <ul>
                                                                                                            @foreach ($treeAccounts  as $f)
                                                                                                                @if ( $f->acc_level === 4 and $k->acc_id === $f->acc_parent_no )
                                                                                                                    <li>
                                                                                                                        <a href="#">{{$f->acc_aname}} ({{$f->acc_id}})</a>
                                                                                                                    </li>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else

                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <!--div-->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">أضافة حساب جديد</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th class="wd-5p border-bottom-0">ر.ت</th>
                                            <th class="wd-15p border-bottom-0">رقم الحساب</th>
                                            <th class="wd-20p border-bottom-0">حساب الاب</th>
                                            <th class="wd-5p border-bottom-0">اسم الحساب بالعربي</th>
                                            <th class="wd-5p border-bottom-0">اسم الحساب بالانجليزي</th>
                                            <th class="wd-5p border-bottom-0">طبيعة الحساب</th>
                                            <th class="wd-15p border-bottom-0">مستوء الحساب</th>
                                            <th class="wd-20p border-bottom-0">مدين</th>
                                            <th class="wd-5p border-bottom-0">داين</th>
                                            <th class="wd-5p border-bottom-0">الرصيد</th>
                                            <th class="wd-20p border-bottom-0">تاتيره في التقارير</th>
                                            <th class="wd-5p border-bottom-0">نوع الحساب</th>
                                            <th class="wd-5p border-bottom-0">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i =0?>
                                            @foreach($treeAccounts as $x)
                                                <?php $i++?>
                                            <tr>
                                                <td class="wd-5p border-bottom-0">{{$i}}</td>
                                                <td>{{$x->acc_id}}</td>
                                                <td>{{$x->acc_parent_no}}</td>
                                                <td>{{$x->acc_aname}}</td>
                                                <td>{{$x->acc_ename}}</td>
                                                <td>{{$x->nature_accounts->nature_type_aname}}</td>
                                                <td>{{$x->acc_level}}</td>
                                                <td>{{$x->acc_debit}}</td>
                                                <td>{{$x->acc_credit}}</td>
                                                <td>{{$x->acc_balance}}</td>
                                                <td>{{$x->acc_reports->acc_rep_aname}}</td>
                                                <td>{{$x->acc_typees->acc_type_aname}}</td>
                                                <td class="wd-10p border-bottom-0">
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}"              data-acc_id="{{ $x->acc_id }}"
                                                        data-acc_aname="{{ $x->acc_aname}}" data-acc_parent_no="{{ $x->acc_parent_no }}"
                                                        data-acc_ename="{{ $x->acc_ename }}"data-acc_type_id="{{ $x->acc_type_id }}"
                                                        data-acc_nature_id="{{ $x->acc_nature_id }}" data-acc_report_id="{{ $x->acc_report_id }}"
                                                        data-acc_level="{{ $x->acc_level }}" data-acc_debit="{{ $x->acc_debit }}"
                                                        data-acc_credit="{{ $x->acc_credit }}"data-acc_balance="{{ $x->acc_balance }}"
                                                        data-toggle="modal" href="#exampleModal2"
                                                        title="تعديل"><i class="las la-pen"></i></a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-acc_aname="{{ $x->acc_aname }}" data-toggle="modal"
                                                        href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>

                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
                <!--/div-->
                <!-- Basic modal -->
                    <div class="modal" id="modaldemo1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">أضافة حساب جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('treeAccounts.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> رقم الحساب</label>
                                            <input type="number" class="form-control" id="acc_id" name="acc_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الحساب  الاب</label>
                                            <input type="number" value='0' class="form-control" id="acc_parent_no" name="acc_parent_no">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الحساب  بالعربي</label>
                                            <input type="text" class="form-control" id="acc_aname" name="acc_aname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">اسم الحساب بالانجليزي</label>
                                            <input type="text" class="form-control" id="acc_ename" name="acc_ename">
                                        </div>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">طبيعة الحساب</label>
                                        <select name="acc_nature_id" id="acc_nature_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد طبيعة الحساب--</option>
                                            @foreach ($nnatureAccount as $nnatureAccounts)
                                                <option value="{{ $nnatureAccounts->id }}">{{ $nnatureAccounts->nature_type_aname }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> مستواء الحساب</label>
                                            <input type="number" value='0' class="form-control" id="acc_level" name="acc_level">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">مدين</label>
                                            <input type="number" step=0.01 value='0.00' class="form-control" id="acc_debit" name="acc_debit">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">داين</label>
                                            <input type="number" step=0.01 value='0.00' class="form-control" id="acc_credit" name="acc_credit">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الرصيد</label>
                                            <input type="number" step=0.01 value='0.00' class="form-control" id="acc_balance" name="acc_balance">
                                        </div>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">تاثيره في التقارير</label>
                                        <select name="acc_report_id" id="acc_report_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد تاثيره الحساب--</option>
                                            @foreach ($acc_report as $acc_reports)
                                                <option value="{{ $acc_reports->id }}">{{ $acc_reports->acc_rep_aname }}</option>
                                            @endforeach
                                        </select>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع الحساب</label>
                                        <select name="acc_type_id" id="acc_type_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد نوع الحساب--</option>
                                            @foreach ($acc_typee as $acc_typees)
                                                <option value="{{ $acc_typees->id }}">{{ $acc_typees->acc_type_aname }}</option>
                                            @endforeach
                                        </select>

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
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الحساب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="treeAccounts/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id" name="id">
                                            <label for="exampleInputEmail1"> رقم الحساب</label>
                                            <input type="number" class="form-control" id="acc_id" name="acc_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الحساب الاب</label>
                                            <input type="number" value='0' class="form-control" id="acc_parent_no" name="acc_parent_no">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اسم الحساب  بالعربي</label>
                                            <input type="text" class="form-control" id="acc_aname" name="acc_aname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">اسم الحساب بالانجليزي</label>
                                            <input type="text" class="form-control" id="acc_ename" name="acc_ename">
                                        </div>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">طبيعة الحساب</label>
                                        <select name="acc_nature_id" id="acc_nature_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد طبيعة الحساب--</option>
                                            @foreach ($nnatureAccount as $nnatureAccounts)
                                                <option value="{{ $nnatureAccounts->id }}">{{ $nnatureAccounts->nature_type_aname }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> مستواء الحساب</label>
                                            <input type="number" value='0' class="form-control" id="acc_level" name="acc_level">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">مدين</label>
                                            <input type="number" value='0' class="form-control" id="acc_debit" name="acc_debit">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">داين</label>
                                            <input type="number" value='0' class="form-control" id="acc_credit" name="acc_credit">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الرصيد</label>
                                            <input type="number" value='0' class="form-control" id="acc_balance" name="acc_balance">
                                        </div>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">تاثيره في التقارير</label>
                                        <select name="acc_report_id" id="acc_report_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد تاثيره الحساب--</option>
                                            @foreach ($acc_report as $acc_reports)
                                                <option value="{{ $acc_reports->id }}">{{ $acc_reports->acc_rep_aname }}</option>
                                            @endforeach
                                        </select>
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع الحساب</label>
                                        <select name="acc_type_id" id="acc_type_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد نوع الحساب--</option>
                                            @foreach ($acc_typee as $acc_typees)
                                                <option value="{{ $acc_typees->id }}">{{ $acc_typees->acc_type_aname }}</option>
                                            @endforeach
                                        </select>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End edit -->

                <!-- delete -->
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف الحساب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="treeAccounts/destroy" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="acc_aname" id="acc_aname" type="text" readonly>
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
<!-- Internal Treeview js -->
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
<!-- Internal dataTables js -->
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
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button        = $(event.relatedTarget)
        var id            = button.data('id')
        var acc_id        = button.data('acc_id')
        var acc_parent_no = button.data('acc_parent_no')
        var acc_aname     = button.data('acc_aname')
        var acc_ename     = button.data('acc_ename')
        var acc_nature_id = button.data('acc_nature_id')
        var acc_level     = button.data('acc_level')
        var acc_debit     = button.data('acc_debit')
        var acc_credit    = button.data('acc_credit')
        var acc_balance   = button.data('acc_balance')
        var acc_report_id = button.data('acc_report_id')
        var acc_type_id   = button.data('acc_type_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #acc_id').val(acc_id);
        modal.find('.modal-body #acc_parent_no').val(acc_parent_no);
        modal.find('.modal-body #acc_aname').val(acc_aname);
        modal.find('.modal-body #acc_ename').val(acc_ename);
        modal.find('.modal-body #acc_nature_id').val(acc_nature_id);
        modal.find('.modal-body #acc_level').val(acc_level);
        modal.find('.modal-body #acc_debit').val(acc_debit);
        modal.find('.modal-body #acc_credit').val(acc_credit);
        modal.find('.modal-body #acc_balance').val(acc_balance);
        modal.find('.modal-body #acc_report_id').val(acc_report_id);
        modal.find('.modal-body #acc_type_id').val(acc_type_id);
    })

</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var acc_aname = button.data('acc_aname')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #acc_aname').val(acc_aname);
    })

</script>
@endsection

