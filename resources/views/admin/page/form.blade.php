@extends('layouts.app')

@section('title', 'Update Halaman')

@section('content')
    <section class="section">
        <form action="{{ route($action,$page->id ?? '') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <input type="hidden" name="id" value="{{ $page->id ?? '' }}">
            <div class="section-header">
                <h1>Edit Page</h1>
            </div>
            @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Nama Produk" value="{{ $page->title ?? OLD('title') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Konten</label>
                                    <textarea class="form-control tiny" name="content" id="content" required>{!! $page->content ?? OLD('content') !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title float-left mb-0 pb-0">
                                    <h5 class="mb-0 pb-0">Aksi</h5>
                                </div>
                                <button type="submit" class="btn float-right btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

@push('javascript')
    <script>
        function createTextSlug()
        {
            let title = document.getElementById("name").value;
            document.getElementById("slug").value = generateSlug(title);
        }

        function generateSlug(text)
        {
            return text.toString().toLowerCase()
                .replace(/^-+/, '')
                .replace(/-+$/, '')
                .replace(/\s+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/[^\w\-]+/g, '');
        }
    </script>
@endpush

