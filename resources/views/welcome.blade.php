@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-0">
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <label for="">Judul Postingan</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Isi Postingan</label>
                                <textarea class="form-control tiny" name="" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-0">
                        <div class="card-header text-white bg-primary">
                              <span>Detil Post</span>
                        </div>
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <label for="">Judul Postingan</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
