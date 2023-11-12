@extends('layouts.master')
@section('title')
العملاء والموردين
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
                <h4 class="content-title mb-0 my-auto">تهيئة النظام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ العملاء و الموردين</span>
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
                                    العملاء والموردين
                                </div>
                                <p class="mg-b-20">
                                    العملاء :
                                    <br>

                                    هم افراد تتعامل معهم الشركة وذلك عن طريق تقديم خدمات لهم  وذلك بمقابل مادى وتكون تلك الخدمات غالبا عبارة عن منتجات خاصة بالشركة

                                    ويعد المديونون لفظ اعم واشمل من العملاء :

                                    حيث ان العملاء هما افراد مديون للشركة مقابل سلعه او خدمه قدمتها لهم الشركة وذلك على عكس كلمة المديونون التى قد تضم اى شخص اشترى السلع من الشركة اصبح مديون لها ولكنها تضم ايضا مساعدات قدمتها الشركة لغيرها او سلف قدمتها الشركة للموظفين لديها او غيرها من المساعدات .
                                    <br>

                                    الموردين :
                                    <br>

                                    هما اشخاص يكون لهم حقوق تجاه الشركة و ذلك من خلال توريد السلع و الخدمات المدفوعة للشركة و تعد بذلك هى اصل للموردين و دين على الشركة.

                                    و بذلك يكون الدائنون هو لفظ اعم من الموردين :

                                    لان الدائنون هو اى فرد له حقوق مالية تجاه الشركة سواء كان البنك او المورد او حتى المالكون للشركة و اصحاب الاسهم يعتبر كل هؤلاء دائنون لكن المورد هو من يقوم يتوريد السلع و الخدمات و البضائع و هو يعد جزء من الدائنون .
                                </p>
                                <hr>

                                <div class="d-flex">
                                    <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-block">إضافة <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                        <!-- dropdown-menu -->
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-target="#add_modal" data-toggle="modal" href="">إضافة عملاء او موردين</a>
                                            <hr>
                                            <a href="{{ url('/' . $page='addPeople') }}" class="dropdown-item">إضافة اشخاص</a>
                                            <a href="{{ url('/' . $page='addLink') }}" class="dropdown-item">إضافة صلة</a>
                                            {{-- <a href="" class="dropdown-item">Logout</a> --}}
                                        </div>
                                        <!-- dropdown-menu -->
                                    </div>
                                    &nbsp;&nbsp;
                                    {{-- <a class="btn ripple btn-primary" data-target="#add_modal" data-toggle="modal" href="">إضافة نوع قيد جديدة</a> --}}
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
                                                <th class="wd-20p border-bottom-0">الاسم</th>
                                                <th class="wd-5p border-bottom-0">الاشخاص</th>
                                                <th class="wd-10p border-bottom-0">البريد الاكتروني</th>
                                                <th class="wd-5p border-bottom-0">الصلة</th>
                                                <th class="wd-5p border-bottom-0">البلد</th>
                                                <th class="wd-5p border-bottom-0">المدينة</th>
                                                <th class="wd-15p border-bottom-0">العنوان</th>
                                                <th class="wd-5p border-bottom-0">الهاتف</th>
                                                <th class="wd-5p border-bottom-0">رقم التسجيل الضريبي</th>
                                                <th class="wd-5p border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i =0?>
                                                @foreach($customersAndSuppliers as $x)
                                                    <?php $i++?>
                                                    <tr>
                                                        <td class="wd-5p border-bottom-0">{{$i}}</td>
                                                        <td>{{$x->C_Name}}</td>
                                                        <td>{{$x->peopleId->people_fname}}</td>
                                                        <td>{{$x->email}}</td>
                                                        <td>{{$x->linksId->link_name}}</td>
                                                        <td>{{$x->country}}</td>
                                                        <td>{{$x->city}}</td>
                                                        <td>{{$x->address}}</td>
                                                        <td>{{$x->phone}}</td>
                                                        <td>{{$x->Tax_Nu}}</td>
                                                        <td class="wd-10p border-bottom-0">
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"
                                                                data-C_Name="{{ $x->C_Name }}"
                                                                data-people_id="{{ $x->people_id }}" data-email="{{ $x->email }}"
                                                                data-links_id="{{ $x->links_id }}" data-country="{{ $x->country }}"
                                                                data-city="{{ $x->city }}" data-phone="{{ $x->phone }}"
                                                                data-address="{{ $x->address }}"
                                                                data-Tax_Nu="{{ $x->Tax_Nu }}"
                                                                data-toggle="modal" href="#update_Modal"
                                                                title="تعديل"><i class="las la-pen"></i></a>

                                                                &nbsp;&nbsp;

                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"
                                                                data-C_Name="{{$x->C_Name}}"
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
                                    <h6 class="modal-title">إضافة جديدة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('customersAndSuppliers.store') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الاسم</label>
                                            <input type="text" class="form-control" id="C_Name" name="C_Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الاشخاص</label>
                                            <select name="people_id" id="people_id" class="form-control" required>
                                                <option value="" selected disabled> -- حدد اسم شخص --</option>
                                                @foreach ($addPeople as $addPeoples)
                                                    <option value="{{ $addPeoples->id }}">{{ $addPeoples->people_fname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الصلة</label>
                                            <select name="links_id" id="links_id" class="form-control" required>
                                                <option value="" selected disabled> -- حدد الصلة  --</option>
                                                @foreach ($addLink as $addLinks)
                                                    <option value="{{ $addLinks->id }}">{{ $addLinks->link_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البلد</label>
                                            <input type="text" class="form-control" id="country" name="country">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">المدينة</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">العنوان</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">الهاتف</label>
                                            <textarea class="form-control" id="phone" name="phone" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">رقم التسجيل الضريبي</label>
                                            <textarea class="form-control" id="Tax_Nu" name="Tax_Nu" rows="3"></textarea>
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
                    <div class="modal fade" id="update_Modal" tabindex="-1" role="dialog" aria-labelledby="edit_Modal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات نوع القيد</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="customersAndSuppliers/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="">
                                            <label for="exampleInputEmail1">الاسم</label>
                                            <input type="text" class="form-control" name="C_Name" id="C_Name" >
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الاشخاص</label>
                                            <select name="people_id" id="people_id" class="form-control" required>
                                                <option value="" selected disabled> -- حدد اسم شخص --</option>
                                                @foreach ($addPeople as $addPeoples)
                                                    <option value="{{ $addPeoples->id }}">{{ $addPeoples->people_fname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الباريد الاكتروني</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الصلة</label>
                                            <select name="links_id" id="links_id" class="form-control" required>
                                                <option value="" selected disabled> -- حدد الصلة  --</option>
                                                @foreach ($addLink as $addLinks)
                                                    <option value="{{ $addLinks->id }}">{{ $addLinks->link_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البلد</label>
                                            <input type="text" class="form-control" id="country" name="country">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">المدينة</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">العنوان</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">الهاتف</label>
                                            <textarea class="form-control" id="phone" name="phone" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">رقم التسجيل الضريبي</label>
                                            <textarea class="form-control" id="Tax_Nu" name="Tax_Nu" rows="3"></textarea>
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
                <!-- End edit -->

                <!-- delete -->
                    <div class="modal" id="delete_modal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف بيانات نوع القيد</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="customersAndSuppliers/destroy" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="C_Name" id="C_Name" type="text" readonly>
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
        var button                  = $(event.relatedTarget)
        var id                      = button.data('id')
        var C_Name                  = button.data('C_Name')
        var people_id               = button.data('people_id')
        var email                   = button.data('email')
        var links_id                = button.data('links_id')
        var country                 = button.data('country')
        var city                    = button.data('city')
        var address                 = button.data('address')
        var phone                   = button.data('phone')
        var Tax_Nu                  = button.data('Tax_Nu')
        var modal             = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #C_Name').val(C_Name);
        modal.find('.modal-body #people_id').val(people_id);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #links_id').val(links_id);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #Tax_Nu').val(Tax_Nu);
    })
</script>

<script>
    $('#delete_modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var C_Name = button.data('C_Name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #C_Name').val(C_Name);
    })
</script>
@endsection
