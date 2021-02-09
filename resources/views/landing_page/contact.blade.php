@extends('landing_page.layouts.master2')
@section('title', 'Kontak')
@section('content')


<div class="container">
    <div class="mt-5 d-flex justify-content-between">
        <h1>Kontak</h1>
        <div>
            <nav aria-label="breadcrumb" class="my-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="flex-w flex-tr my-3">
        <div class="size-210 bor10 w-full-md">
            {!! site('contact.maps') !!}
        </div>

        <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
            <div class="flex-w w-full p-b-42">
                <span class="fs-18 cl5 txt-center size-211">
                    <span class="lnr lnr-map-marker"></span>
                </span>

                <div class="size-212 p-t-2">
                    <span class="mtext-110 cl2">
                        Alamat
                    </span>

                    <p class="stext-115 cl6 size-213 p-t-18">
                        {{ site('site.address') }}
                    </p>
                </div>
            </div>

            <div class="flex-w w-full p-b-42">
                <span class="fs-18 cl5 txt-center size-211">
                    <span class="lnr lnr-phone-handset"></span>
                </span>

                <div class="size-212 p-t-2">
                    <span class="mtext-110 cl2">
                        Telepon
                    </span>

                    <p class="stext-115 cl1 size-213 p-t-18">
                        <a href="tel:{{ site('contact.phone') }}">{{ site('contact.phone') }}</a>
                    </p>
                </div>
            </div>

            <div class="flex-w w-full">
                <span class="fs-18 cl5 txt-center size-211">
                    <span class="lnr lnr-envelope"></span>
                </span>

                <div class="size-212 p-t-2">
                    <span class="mtext-110 cl2">
                        Email
                    </span>

                    <p class="stext-115 cl1 size-213 p-t-18">
                        <a href="mailto:{{ site('contact.email') }}">{{ site('contact.email') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
