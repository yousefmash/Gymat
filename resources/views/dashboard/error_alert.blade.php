<!-- Modal -->
<div class="modal fade" tabindex="-1" id="Error-Modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-block justify-content-center">
				<p class="d-flex justify-content-center"><i class="bi bi-x-circle text-danger fa-6x"></i></p>
                @foreach ($errors->all() as $error)
                <label class="form-check-label d-flex justify-content-center fs-2" for="form_checkbox">
					{{ $error }}
				</label>
                @endforeach
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<form action="#" id='lineitem' method="post">
					@csrf
					<button type="button" class="btn btn-light" data-bs-dismiss="modal">حسناً</button>
				</form>
			</div>
		</div>
	</div>
</div>	