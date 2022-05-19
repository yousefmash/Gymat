<!DOCTYPE html>
<html lang="ar">
	<!--begin::Head-->
	<head>
		<title></title>
		<meta charset="utf-8" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: linear-gradient(to top left, #ff9900, #ffea2e);">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" id="sign_in_form" action="/getGym" method="post">
                            @csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
                                <a href="{{ url('/') }}" class="mb-12">
                                    <img alt="Logo" src="{{ asset("assets/media/logos/logo-dark.png")}}" class="h-60px" />
                                </a>
                                <!--end::Title-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
                            <div class="form-floating fv-row mb-10">
                                <select class="form-select" id="floatingSelect" name="GymId" aria-label="Floating label select example">
                                    <option selected>إختر الجيم</option>
									@foreach($gym as $g)
										<option value="{{ $g->name }}" >{{ $g->name }}</option>
									@endforeach
                                </select>
                                <label for="floatingSelect">إختر الجيم المشترك فيه</label>
                            </div>
                            <!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-warning w-100 mb-5">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-white text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-white text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-white text-hover-primary px-2">Contact Us</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset("assets/plugins/global/plugins.bundle.js") }}"></script>
		<script src="{{ asset("assets/js/scripts.bundle.js") }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>