@extends('landing_page.layouts.master2')
@section('title', 'Tentang')
@section('content')


<div class="container">
    <div class="mt-5 d-flex justify-content-between">
        <h1>Tentang</h1>
        <div>
            <nav aria-label="breadcrumb" class="my-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="flex-w flex-tr my-5">
        <div class="size-210 p-5 bor10 w-full-md d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/'.site('site.icon')) }}" alt="LOGO" width="80%">
        </div>

        <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
            {!! page('page.about') !!}
        </div>
    </div>
</div>


@endsection
