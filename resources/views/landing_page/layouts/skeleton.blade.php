<!DOCTYPE html>
<html lang="en">
<head>
	<title> @yield('title','Beranda') - {{ site('site.name') }}</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description',site('site.description'))">
    <meta name="keywords" content="@yield('keywords',site('site.keywords'))" />
    <meta name="author" content="{{ site('site.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffb3b3">
    <link rel="canonical" href="{{ url()->full() }}">

    <meta property="og:title" content="@yield('title',site('site.name'))" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:image" content="@yield('image',asset('images/'.site('site.logo')))" />
    <meta property="og:description" content="@yield('description',site('site.description'))"/>
    <meta property="og:site_name" content="{{ site('site.name') }}"/>

	<meta name="twitter:title" content="{{ site('site.name') }}" />
	<meta name="twitter:image" content="@yield('image',asset('images/'.site('site.logo')))" />
    <meta name="twitter:url" content="{{ url()->full() }}" />
    <meta property="twitter:card" content="{{ site('site.description') }}"/>

    <link rel="icon" type="image/png" href="{{ asset('images/'.site('site.icon')) }}"/>
    <link rel="shortcut icon" href="{{ asset('images/'.site('site.icon')) }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('themes/store/fonts') }}/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/fonts') }}/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/store/fonts') }}/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/vendor') }}/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/css') }}/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/css') }}/main.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/store/css') }}/custom.css">
</head>
<body class="animsition">

	<!-- Main Content -->
@yield('app')


<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('themes/store/vendor') }}/animsition/js/animsition.min.js"></script>
	<script src="{{ asset('themes/store/vendor') }}/bootstrap/js/popper.js"></script>
	<script src="{{ asset('themes/store/vendor') }}/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('themes/store/vendor') }}/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('themes/store/vendor') }}/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/slick/slick.min.js"></script>
	<script src="{{ asset('themes/store/js') }}/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/vendor') }}/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('themes/store/js') }}/main.js"></script>
    <script src="{{ asset('themes/store/js') }}/insta-feed.js"></script>

    <script>
        var cart;


        refreshCart();

        function refreshCart(){
            let tempCart = JSON.parse(getItemCart());
            let listCart = '';
            let listCartModal = '';
            let totalPrice = 0;
            let totalWeight = 0;
            if(tempCart.length > 0){
                tempCart.forEach((val,index) => {
                    totalPrice += val.price*val.qty;
                    totalWeight += val.weight*val.qty;
                    listCart +=`
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img" onclick="deleteItemCart(${index})">
                            <img src="${val.photo}" alt="IMG">
                        </div>
                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                ${val.name}
                            </a>

                            <span class="header-cart-item-info">
                                ${val.set} x ${val.qty}
                            </span>
                        </div>
                    </li>`;
                    listCartModal +=`
                    <input type="hidden" name="product_id[]" value="${val.id}">
                    <input type="hidden" name="price[]" value="${val.price*val.qty}">
                    <input type="hidden" name="qty[]" value="${val.qty}">
                    <input type="hidden" name="size[]" value="${val.size}">
                    <input type="hidden" name="set[]" value="${val.set}">
                    <input type="hidden" name="color[]" value="${val.color}">
                    `;
                    });
                $('#listCart').html(listCart);
                $('#listCartModal').html(listCartModal);
            } else {
                $('#listCart').html(`<li class="header-cart-item flex-w flex-t m-b-12">No item in cart</li>`);
            }
            $('.js-show-cart').attr('data-notify',tempCart.length);
            $('#totalPrice').html(formatNumber(totalPrice));
            $('#totalWeight').html(formatNumber(totalWeight));
            $('#form_total').val(totalPrice);
            $('#form_weight').val(totalWeight);
            $('#total').html(formatNumber(totalPrice));
            $('#subtotal').html(formatNumber(totalPrice));
        }

        function getItemCart(){
            cart = localStorage.getItem('mycart') ?? localStorage.setItem('mycart', '[]');
            return cart;
        }

        function setItemCart(cartItem){
            //console.log(cartItem);
            localStorage.setItem('mycart',JSON.stringify(cartItem));
        }

        function deleteItemCart(index){
            let tempCart = JSON.parse(getItemCart());
            tempCart.splice(index,1);
            //console.log(tempCart.length);
            setItemCart(tempCart);
            refreshCart();
        }

        function addToCart(name,id){
            let csrf_token = $('meta[name=csrf-token]').attr('content');
            let color = $('#color').select2('data');
            let set = $('#set').select2('data');
            let size = $('#size').select2('data');
            let qty = $('.num-product').val();
            let cart = {
                        'id' : id,
                        'name' : name,
                        'color' : color[0].text,
                        'set' : set[0].text,
                        'size' : size[0].text,
                        'qty' : qty,
                        'price' : set[0].element.dataset.price,
                    };

            $.ajax({
                url : "{{ route('product') }}",
                data : { _token : csrf_token, ids : id },
                method : 'POST',
                success : function(res){
                   parsingCart(cart,res.photo_url,res.weight);
                },
                error : function(a,b,c){
                    console.log(a);
                    console.log(b);
                    console.log(c);
                }
            });
        }

        function parsingCart(itemCart,photo,weight){
            let cartTemp = JSON.parse(getItemCart());
            itemCart.photo = photo;
            itemCart.weight = weight;
            cartTemp.push(itemCart);
            setItemCart(cartTemp);
            refreshCart();
        }

        function fetchProductCart(id){
            let csrf_token = $('meta[name=csrf-token]').attr('content');
            let ids = id;
            let photo_url = '';
            //Object.values(cartTemp).map((key)=> key.id)
            return photo_url;
        }

        function formatNumber(bilangan){
            let reverse = bilangan.toString().split('').reverse().join('');
            let ribuan 	= reverse.match(/\d{1,3}/g);
                ribuan	= ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }

        loadProvince();

        function loadProvince(){
            $.ajax({
                url : "{{ route('province') }}",
                success : function(res){
                    $('#province').html("<option>Pilih Provinsi</option>"+res);
                }
            });
        }

        function citySelect(){
            let url = "{{ route('city',':ID') }}";
            let id_province = $('#province').select2('data')[0].element.dataset.id;
            url = url.replace(':ID',id_province);
            $.ajax({
                url : url,
                success : function(res){
                    $('#city').html("<option>Pilih Kota / Kabupaten</option>"+res);
                }
            });
        }

        function districtSelect(){
            let url = "{{ route('district',':ID') }}";
            let id_city = $('#city').select2('data')[0].element.dataset.id;
            url = url.replace(':ID',id_city);
            $.ajax({
                url : url,
                success : function(res){
                    $('#district').html("<option>Pilih Kecamatan</option>"+res);
                }
            });
        }

        function courierSelect(){
            let url = "{{ route('courier',':ID') }}";
            let token = $('meta[name=csrf-token]').attr('content');
            let destination = $('#city').select2('data')[0].element.dataset.id;
            let courier = $('#shipping_type').select2('data')[0].id;
            let weight = 100;
            url = url.replace(':ID',destination);
            $.ajax({
                url : url,
                data : { _token : token, weight : weight, courier : courier, destination : destination},
                method : 'POST',
                success : function(res){
                    $('#shipping_method').html("<option>Pilih Pengiriman</option>"+res);
                    $('#form_shipping_method').val(courier);
                    $('#method').html(courier);
                }
            });
        }

        function serviceSelect(){
            let cost = $('#shipping_method').select2('data')[0].id;
            let nameService = $('#shipping_method').select2('data')[0].text;
            $('#form_shipping_cost').val(cost);
            $('#cost').html(cost);
            let subtotal = parseInt($('#form_total').val()) + parseInt(cost);
            $('#form_subtotal').val(subtotal);
            $('#subtotal').html(formatNumber(subtotal));
            $('#method').html(($('#method').html()+' - '+nameService.split(' - ')[0]).toUpperCase());
        }

        function btnCheckout(){
            let checkNull = 0;

            $('#formCheckout').find('.input').each(function(index,element){
                if(element.value !== ""){

                }else{
                    checkNull++;
                }
            });

            console.log(checkNull);

            if(checkNull < 1){
                let token = $('meta[name=csrf-token]').attr('content');
                let data = $('#formCheckout').serialize();
                let formData = new FormData();
                let url = "{{ route('checkout') }}";
                $.ajax({
                    url : url,
                    method : 'POST',
                    data : data+'&_token='+token,
                    success : function(res){
                        if(res.message == "success"){
                            $('#formCheckout')[0].reset();
                            setItemCart([]);
                            window.location.href = res.redirect;
                        }
                    },
                    error : function(a,b,c){
                        console.log(a);
                        console.log(b);
                        console.log(c);
                    }
                });
            }else{
                alert("Harap Isi Semua Data");
            }

        }


    </script>

</body>
</html>
