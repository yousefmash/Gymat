@php $user_job = Auth::user()->job_id; @endphp					
@extends('index')
@section('Stylesheets')
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section('admin_content')
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<!--begin::Row-->
		<div class="row gy-5 g-xl-8">
			@if ($user_job == 3||$user_job == 4)
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--actions Widget-->
					@include("widgets.actionsWidget")
				</div>
				<!--end::Col-->
			@endif
			@if ($user_job == 3)
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--Sessions Widget-->
					@include("widgets.SessionsWidget")
				</div>
				<!--end::Col-->
			@endif
			@if ($user_job == 3||$user_job == 4)
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--Movements Widget-->
					@include("widgets.MovementsWidget")
				</div>
				<!--end::Col-->
			@endif
			@if ($user_job == 3||$user_job == 5)
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--coach Widget-->
					@include("widgets.coachWidget")
				</div>
				<!--end::Col-->
			@endif
			@if ($user_job == 3||$user_job == 4)
				<!--begin::Col-->
				<div class="col-xl-12">
					<!--notices Widget-->
					@include("widgets.noticesWidget")
				</div>
				<!--end::Col-->
			@endif
		</div>
		<!--end::Row-->
	</div>
	<!--end::Container-->
@endsection			
@section('Javascript')
	<script src="{{ $dailyfund->cdn() }}"></script>
	<script src="{{ $dailySessions->cdn() }}"></script>
	<script src="{{ $UsersSessions->cdn() }}"></script>

	{{ $dailyfund->script() }}
	{{ $dailySessions->script() }}
	{{ $UsersSessions->script() }}
@endsection