
<div class="modal fade" tabindex="-1" id="food_table">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ URL( Cookie::get('gym_name').'/diet/food-table/update/'.$user->id) }}">
                @csrf
			    <div class="modal-body d-block justify-content-center">
					<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
                        إضافة وجبة للنظام الغذائي
                    </label>
					<div class="mt-4 mx-20">
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="form-label">إسم الوجبة</label>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="إختر نوع البيانات التي تريد البحث عن المشترك بها" aria-label="إختر نوع البيانات التي تريد البحث عن المشترك بها"></i></td>
                            <select class="form-select" id ='search_type' name="add_mael" data-control="select2" data-placeholder="إختر">
                                <option></option>
								@foreach ($meals as $m)
									<option value="{{$m->id}}">{{ $m->name }}</option>
								@endforeach
                            </select>
                        </div>
                        <!--end::Form group-->
                    </div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" class="btn btn-primary" type="submit" value="إضافة">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</div>
			</form>
		</div>
	</div>
</div>
