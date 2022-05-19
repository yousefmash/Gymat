@if ($button)
<button type="button" class="btn btn-primary btn-hover-scale me-5" data-bs-toggle="modal" data-bs-target="#receipt">
    إضافة إيصال
</button>  
@endif

<div class="modal fade" tabindex="-1" id="receipt">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة إيصال</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/add-receipt') }}">
                @csrf
                <div class="modal-body">
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label class="form-label">رقم الإيصال:</label>
                                <input type="text" name="receipt_num" class="form-control mb-2 mb-md-0" placeholder="أدخل رقم الإيصال" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">المشترك:</label>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="إختر نوع البيانات التي تريد البحث عن المشترك بها" aria-label="إختر نوع البيانات التي تريد البحث عن المشترك بها"></i></td>
                                <select class="form-select" id ='search_type' name="user_type" data-control="select2" data-placeholder="إختر">
                                    <option value="phone">رقم الهاتف</option>
                                    <option value="name">الإسم</option>
                                    <option value="id">رقم المعرف</option>
                                </select>
                                <input type="text" id='receipter_name' name="user" class="form-control mb-2 mb-md-0" placeholder="أدخل بيانات المشترك" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">القيمة:</label>
                                <input type="text" name="value" class="form-control mb-2 mb-md-0" placeholder="أدخل قيمة الحركة" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">نوع الحركة:</label>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" name="receipt_type" type="radio" value="deposit" checked="checked"/>
                                    <label class="form-check-label" for="form_checkbox">
                                        إيداع
                                    </label>
                                    <input class="form-check-input ml-3" name="receipt_type" type="radio" value="withdraw"/>
                                    <label class="form-check-label" for="form_checkbox">
                                        سحب
                                    </label>
                                </div>                            
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الملاحظة:</label>
                                <textarea class="form-control form-control-solid rounded-3" name="note" rows="2"></textarea>												</label>
                            </div>
                        </div>
                    </div>
                    <!--end::Form group-->
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" type="submit" value="حفظ">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>