@extends('layouts.app')

@section('title', 'Slider')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route($action,$slider->id ?? '') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($method)
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" class="form-control" value="{{ $slider->title ?? '' }}" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="">Subjudul</label>
                                    <input type="text" class="form-control" value="{{ $slider->subtitle ?? '' }}" name="subtitle">
                                </div>

                                <div class="form-group">
                                    <label for="">Gambar Slider</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <input type="hidden" name="id" value="">

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
<form id="formEdit" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-0">
              <label for="name">Nama Kategori</label>
            <input type="text" name="name" id="modal_name" placeholder="Nama Kategori" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</form>
</div>
@endpush
