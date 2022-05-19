<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Gymat</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Gymat" />
		<link rel="shortcut icon" href="{{ asset("assets/media/logos/logo-solo.svg") }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::loader-->
		<div class="page-loader">
			<span class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</span>
		</div>
		<!--end::Loader-->

<!--layout-partial:layout/master.html-->
	@include("layout.master1")


<!--layout-partial:layout/_scrolltop.html-->
	@include("layout._scrolltop")

		<!--begin::Modals-->

<!--layout-partial:partials/modals/_upgrade-plan.html-->
	@include("partials.modals._upgrade-plan")


<!--layout-partial:partials/modals/users-search/_main.html-->
@include("partials.modals.users-search._main")

		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset("assets/plugins/global/plugins.bundle.js") }}"></script>
		<script src="{{ asset("assets/js/scripts.bundle.js") }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>