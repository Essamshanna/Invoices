@extends('layouts.master')
@section('title')
إضافة الاشخاص
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
                <h4 class="content-title mb-0 my-auto">العملاء والموردين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة الاشخاص</span>
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
                                <div class="d-flex">
                                    <a class="btn ripple btn-primary" data-target="#add_modal" data-toggle="modal" href="">إضافة شخص جديدة</a>
                                    &nbsp;&nbsp;
                                    <a class="btn ripple btn-primary" href="{{ url('/' . $page='customersAndSuppliers') }}">رجوع</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1" data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th class="wd-5p border-bottom-0">ر.ت</th>
                                                <th class="wd-15p border-bottom-0">الاسم الاول</th>
                                                <th class="wd-15p border-bottom-0">اسم العائلة</th>
                                                <th class="wd-15p border-bottom-0">البريد الاكتروني</th>
                                                {{-- <th class="wd-15p border-bottom-0">مضاف في الايميلات</th> --}}
                                                <th class="wd-5p border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i =0?>
                                                @foreach($addPeople as $x)
                                                    <?php $i++?>
                                                    <tr>
                                                        <td class="wd-5p border-bottom-0">{{$i}}</td>
                                                        <td>{{$x->people_fname}}</td>
                                                        <td>{{$x->people_lname}}</td>
                                                        <td>{{$x->email}}</td>
                                                        {{-- <td>{{ $x->addedInEmails === 0 ? "غير مضاف في الايميلات" : "مضاف في الايميلات" }}</td> --}}
                                                        <td class="wd-10p border-bottom-0">

                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id                ="{{ $x->id }}"
                                                                data-people_fname      ="{{$x->people_fname}}"
                                                                data-people_lname      ="{{$x->people_lname}}"
                                                                data-email             ="{{$x->email}}"
                                                                {{-- data-addedInEmails     ="{{$x->addedInEmails}}" --}}
                                                                data-toggle            ="modal"
                                                                href                   ="#update_Modal"
                                                                title                  ="تعديل">
                                                                <i class               ="las la-pen"></i>
                                                            </a>
                                                                &nbsp;&nbsp;
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id          ="{{ $x->id }}"
                                                                data-people_fname="{{$x->people_fname}}"
                                                                data-toggle      ="modal"
                                                                href             ="#delete_modal"
                                                                title            ="حذف">
                                                                <i class         ="las la-trash"></i>
                                                            </a>
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
                                    <h6 class="modal-title">إضافة شخص جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('addPeople.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="form-label">ادخل الاسم الاول<span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="people_fname" name="people_fname">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ادخل اسم العائلة<span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="people_lname" name="people_lname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">مضاف في الايميلات</label>
                                            <select name="links_id" id="links_id" class="form-control" required>
                                                <option value="" selected disabled> -- حدد من هناء  --</option>
                                                <option value='1' id="links_id" name="links_id">مضاف في الايميلات</option>
                                                <option value='0' id="links_id" name="links_id">غير مضاف في الايميلات</option>
                                            </select>
                                        </div> --}}
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
                    <div class="modal fade" id="update_Modal" tabindex="-1" role="dialog" aria-labelledby="edit_Modal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل الصلة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="addPeople/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="">
                                            <label for="exampleInputEmail1">ادخل الاسم الاول</label>
                                            <input type="text" class="form-control" id="people_fname" name="people_fname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ادخل اسم العائلة</label>
                                            <input type="text" class="form-control" id="people_lname" name="people_lname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">مضاف في الايميلات</label>
                                            <select name="addedInEmails" id="addedInEmails" class="form-control" required>
                                                @if ('0' === "1")
                                                    <option value="" selected disabled> -- حدد الخيار من هنا  --</option>
                                                    <option value="0"  >غير مضاف في الايميلات</option>
                                                    <option  value="1" >مضاف في الايميلات</option>
                                                @else
                                                    <option value="" selected disabled> -- حدد الخيار من هنا  --</option>
                                                    <option value="1" >مضاف في الايميلات</option>
                                                    <option  value="0" >غير مضاف في الايميلات</option>
                                                @endif
                                            </select>
                                        </div> --}}
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
                    <div class="modal" id="delete_modal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف صلة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="addPeople/destroy" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="people_fname" id="people_fname" type="text" readonly>
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
        var button        = $(event.relatedTarget)
        var id            = button.data('id')
        var people_fname  = button.data('people_fname')
        var people_lname  = button.data('people_lname')
        var email         = button.data('email')
        // var addedInEmails = button.data('addedInEmails')
        var modal         = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #people_fname').val(people_fname);
        modal.find('.modal-body #people_lname').val(people_lname);
        modal.find('.modal-body #email').val(email);
        // modal.find('.modal-body #addedInEmails').val(addedInEmails);
    })
</script>

<script>
    $('#delete_modal').on('show.bs.modal', function(event) {
        var button            = $(event.relatedTarget)
        var id                = button.data('id')
        var people_fname         = button.data('people_fname')
        var modal             = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #people_fname').val(people_fname);
    })
</script>
@endsection
