@extends('landing_page.layouts.skeleton')

@section('app')

    @include('landing_page.partials.topnav')

	<!-- Cart -->
	@include('landing_page.partials.sidecart')

	<!-- Banner -->
	@include('landing_page.partials.banner')

    <!-- Content -->
    @yield('content')

    <!-- Modal -->
    @include('landing_page.partials.modal_checkout')

    <!-- Footer -->
    @include('landing_page.partials.footer')



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

@endsection
