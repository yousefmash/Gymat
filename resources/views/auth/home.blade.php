
<!DOCTYPE html>
<html lang="ar">
	<!--begin::Head-->
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&amp;display=swap" rel="stylesheet">		

		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset("assets/plugins/global/plugins.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
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
					<!--begin::Logo-->
					<a href="../../demo1/dist/index.html" class="mb-12">
					</a>
					<!--end::Logo-->
					@yield('login_content')
					
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto">
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
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset("assets/js/custom/authentication/sign-in/general.js") }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
	@include('dashboard.error_alert')
	@if ($errors->any())
		<script>
			$(document).ready(function(){
				$("#Error-Modal").modal('show');
			});
		</script>
	@endif
</html>