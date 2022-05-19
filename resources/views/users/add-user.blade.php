<button type="button" class="btn btn-primary btn-hover-scale me-5" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
    إضافة مشترك
</button>

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة مشترك جديد</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/user/store') }}">
                @csrf
                <div class="modal-body">
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-label">الإسم:</label>
                                <input type="text" name="name" class="form-control mb-2 mb-md-0" placeholder="أدخل إسم المشترك" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">رقم الجوال:</label>
                                <input type="text" name="phone" class="form-control mb-2 mb-md-0" placeholder="أدخل رقم الجوال" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الجنس:</label>
                                <select class="form-select" name="gender" data-control="select2" data-placeholder="إختر">
                                    <option></option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="أنثى">أنثى</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">نوع المشترك:</label>
                                <select class="form-select" name="job" data-control="select2" data-placeholder="إختر">
                                    <option value="1" checked="checked">مشترك</option>
                                    <option value="4">محاسب</option>
                                    <option value="5">مدرب</option>
                                    <option value="3">مدير</option>
                                </select>
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