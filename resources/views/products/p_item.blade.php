@extends('layouts.master')
@section('title')
 الاصناف
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
							<h4 class="content-title mb-0 my-auto"> المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/   ادخال انوع الاصناف</span>
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex ">
                            <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" title="إضافة صنف جديد" href="">إضافة</a>
                            &nbsp;&nbsp;
                            <a class="btn ripple btn-primary" href="{{ url('/' . $page='product') }}" title="رجوع الى شاشة المنتجات">رجوع</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1" data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">ر.ت</th>
                                        <th class="wd-10p border-bottom-0">اسم الصنف</th>
                                        <th class="wd-5p border-bottom-0">اسم المنتج</th>
                                        <th class="wd-5p border-bottom-0">سعر الصنف</th>
                                        <th class="wd-25p border-bottom-0">الوصف</th>
                                        <th class="wd-5p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =0?>
                                        @foreach($Pitem as $x)
                                            <?php $i++?>
                                        <tr>
                                            <td class="wd-5p border-bottom-0">{{$i}}</td>
                                            <td>{{$x->items_name}}</td>
                                            <td>{{$x->productId->product_name}}</td>
                                            <td>{{$x->product_price}}</td>
                                            <td>{{$x->description}}</td>
                                            <td class="wd-10p border-bottom-0">

                                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                    data-id             ="{{ $x->id }}"
                                                    data-items_name     ="{{ $x->items_name}}"
                                                    data-product_id     ="{{ $x->product_id}}"
                                                    data-product_price  ="{{ $x->product_price}}"
                                                    data-description    ="{{ $x->description }}"
                                                    data-toggle         ="modal"
                                                    href                ="#update_Modal"
                                                    title               ="تعديل">
                                                    <i class            ="las la-pen"></i>
                                                </a>

                                                    &nbsp;&nbsp;

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-id         ="{{ $x->id }}"
                                                    data-items_name ="{{ $x->items_name }}"
                                                    data-toggle     ="modal"
                                                    href            ="#modaldemo9"
                                                    title           ="حذف">
                                                    <i class        ="las la-trash"></i>
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
        <!--/div-->
        <!-- Basic modal -->
            <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">أضافة صنف جديدة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('item.store') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم الصنف</label>
                                    <input type="text" class="form-control" id="items_name" name="items_name">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج</label>
                                    <select name="product_id" id="product_id" class="form-control" required>
                                        <option value="" selected disabled> -- حدد اسم المنتج  --</option>
                                        @foreach ($product as $product_item)
                                            <option value="{{ $product_item->id }}">{{ $product_item->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سعر الصنف</label>
                                    <input type="number" step=0.01 value='0.00' class="form-control" id="product_price" name="product_price" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">الوصف</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
        </div>
        <!-- edit -->
            <div class="modal fade" id="update_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تعديل الصنف</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="item/update" method="post" autocomplete="off">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="recipient-name" class="col-form-label">اسم الصنف :</label>
                                    <input class="form-control" name="items_name" id="items_name" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتج</label>
                                    <select name="product_id" id="product_id" class="form-control" required>
                                        <option value="" selected disabled> -- حدد اسم المنتج  --</option>
                                        @foreach ($product as $product_item)
                                            <option value="{{ $product_item->id }}">{{ $product_item->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">سعر الصنف:</label>
                                    <input type="number" step=0.01 value='0.00' class="form-control" name="product_price" id="product_price" >
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="message-text" class="col-form-label">الوصف:</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
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
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">حذف هدا الصنف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="item/destroy" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" value="">
                                <input class="form-control" name="items_name" id="items_name" type="text" readonly>
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
        var id              = button.data('id')
        var items_name      = button.data('items_name')
        var product_id      = button.data('product_id')
        var product_price   = button.data('product_price')
        var description     = button.data('description')
        var modal           = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #items_name').val(items_name);
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #product_price').val(product_price);
        modal.find('.modal-body #description').val(description);
    })

</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button       = $(event.relatedTarget)
        var id           = button.data('id')
        var items_name   = button.data('items_name')
        var modal        = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #items_name').val(items_name);
    })

</script>

@endsection

