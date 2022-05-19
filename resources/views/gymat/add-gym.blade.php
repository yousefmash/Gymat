<button type="button" class="btn btn-primary btn-hover-scale me-5" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
    إضافة صالة رياضية
</button>

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة صالة رياضية جديد</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( $gym_name.'/gymat/store') }}">
                @csrf
                <div class="modal-body">
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="form-label">الإسم:</label>
                                <input type="text" name="name" class="form-control mb-2 mb-md-0" placeholder="أدخل إسم الصالة" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">رقم الجوال:</label>
                                <input type="text" name="phone" class="form-control mb-2 mb-md-0" placeholder="أدخل رقم الجوال" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الباقة:</label>
                                <select class="form-select" name="gym_package_id" data-control="select2" data-placeholder="إختر">
                                    <option></option>
                                    @foreach ($gym_packages as $g_p)
                                    <option value="{{ $g_p->id }}">{{ $g_p->name }}</option>
                                    @endforeach
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