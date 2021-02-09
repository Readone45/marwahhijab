	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

                <div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Kontak
					</h4>
					<ul>
                        <li class="p-b-10">
                            <span class="text-white">Telepon</span> :
							<a href="tel:{{ site('contact.phone') }}" class="stext-107 cl7 hov-cl1 trans-04">
								{{ site('contact.phone') }}
							</a>
						</li>
                        <li class="p-b-10">
                            <span class="text-white">Whatsapp</span> :
							<a href="http://api.whatsapp.com/send?phone={{ site('contact.whatsapp') }}" class="stext-107 cl7 hov-cl1 trans-04">
								{{ site('contact.whatsapp') }}
							</a>
						</li>
                        <li class="p-b-10">
                            <span class="text-white">Email</span> :
							<a href="mailto:{{ site('contact.email') }}" class="stext-107 cl7 hov-cl1 trans-04">
								{{ site('contact.email') }}
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Alamat
					</h4>
                        <p class="text-white">
                            {{ site('site.address') }}
                        </p>
				</div>

                <div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Sosial Media
					</h4>

					<div>
						<a href="{{ site('socmed.facebook') }}" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="{{ site('socmed.instagram') }}" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>

                <div class="col-sm-6 col-lg-3 p-b-50">

                    <insta-feed username="marwahhijabpusat01"></insta-feed>

				</div>
			</div>

			<div class="p-t-40">
				{{-- <div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/store/images') }}/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/store/images') }}/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/store/images') }}/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/store/images') }}/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/store/images') }}/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div> --}}

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; {{date('Y')}} <a href="{{ url('') }}">{{ site('site.name') }}</a>. Developed By <a href="http://inovindo.co.id" target="_blank"><span class="text-primary">INOVINDO</span><span class="text-success">WEB</span></a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>
