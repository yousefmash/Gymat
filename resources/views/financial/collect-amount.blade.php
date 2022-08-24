<div class="modal fade" tabindex="-1" id="collect_amount_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<form action="{{ URL( Cookie::get('gym_name').'/collect-amount') }}" id='collect_amount_form' method="post">
					@csrf
					<label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
						المبلغ المراد تحصيله:
					</label>
					<div class="mt-4 mx-20">
						<input type="text" value="{{ $gym_balance }}" name="receipt_num" class="form-control mb-2 mb-md-0" placeholder="أدخل رقم الإيصال" />
					</div>
					<div class="mt-4 mx-20">
						<textarea class="form-control form-control-solid rounded-3" name="note" rows="1" placeholder="أضف ملاحظة"></textarea>												</label>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" class="btn btn-primary" type="submit" value="سحب">
					<button type="button" class="btn btn-light  ml-3" data-bs-dismiss="modal">إلغاء</button>
				</div>
			</form>
		</div>
	</div>
</div>