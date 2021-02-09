@extends('layouts.app')

@section('title', 'Buat Produk Baru')

@section('content')
    <section class="section">
        <form action="{{ route($action,$product->id ?? '') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
            <div class="section-header">
                <h1>Buat Produk Baru</h1>
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
                    <div class="col-md-8">
                        <div class="card p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" onkeyup="createTextSlug()" class="form-control" name="name" id="name" placeholder="Nama Produk" value="{{ $product->name ?? OLD('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Kategori Produk</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Pilih Kategori</option>

                                        @php
                                        $category_id = '';
                                            if(isset($product->category_id)){
                                                $category_id = $product->category_id;
                                            }
                                        @endphp
                                        @foreach ($categories as $category)

                                            <option value="{{ $category->id }}" {{ ( $category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Berat Produk</label>
                                    <p><small>Berat produk dalam satuan gram</small></p>
                                    <input type="number" class="form-control" name="weight" id="weight" min="1" placeholder="Contoh : 100" value="{{ $product->weight ?? OLD('weight') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Deskripsi Produk</label>
                                    <textarea class="form-control tiny" name="description" id="description" required>{!! $product->description ?? OLD('description') !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Info Tambahan</label>
                                    <p><small>Berisi info tambahan seperti harga,berat,panjang,lebar,ukuran,bahan,warna</small></p>
                                    <textarea class="form-control tiny" name="additional" id="additional">{!! $product->additional ?? OLD('additional') !!}</textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="">Slug Produk</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Diambil dari nama produk" value="{{ $product->slug ?? OLD('slug') }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card card-primary p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <p><small>Ketikan tanpa tanda titik</small></p>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="contoh: 120000" autocomplete="off" required>
                                </div>
                            </div>
                        </div> --}}

                        <div class="card card-primary p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="">Thumbnail Produk</label>
                                    @isset($product->photo)
                                    <img src="{{ asset('images/'.$product->photo) }}" alt="PHOTO-PRODUCT" width="100%">
                                    @endisset
                                    <input type="file" class="form-control" name="photo" id="photo">
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary p-0">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Tags / label</label>
                                    <p><small>Pisahakan label dengan tanda koma (,)</small></p>
                                    <textarea name="tags" spellcheck="false" id="tags" class="form-control" placeholder="contoh : pakaian,hijab" style="height: 80px" required>{!! $product->tags ?? OLD('tags') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Warna</label>
                                    <p><small>Pisahakan warna dengan tanda koma (,)</small></p>
                                    <textarea name="color" spellcheck="false" id="color" class="form-control" placeholder="contoh : Pink,Black,Mint,Coffee" style="height: 80px" required>{!! $product->color ?? OLD('color') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <p><small>Pisahakan ukuran dengan tanda koma (,)</small></p>
                                    <textarea name="size" spellcheck="false" id="size" class="form-control" placeholder="contoh : X,L,M,XL" style="height: 80px" required>{!! $product->size ?? OLD('size') !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary p-0">
                            <div class="card-body pb-0">
                                <div class="card-title">
                                    <h6>Meta SEO</h6>
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <p><small>Masukan deskripsi singkat produk</small></p>
                                    <textarea name="meta_description" spellcheck="false" id="color" class="form-control" placeholder="contoh : Produk baru nyaman dipakai warna elegan" style="height: 80px">{!! $product->meta_description ?? OLD('meta_description') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <p><small>Pisahakan keyword dengan tanda koma (,)</small></p>
                                    <textarea name="meta_keywords" spellcheck="false" id="size" class="form-control" placeholder="contoh : marwah hijab,pakaian muslim,busana muslim" style="height: 120px">{!! $product->meta_keywords ?? OLD('meta_keywords') !!}</textarea>
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
                                <button type="submit" class="btn float-right btn-primary">Simpan Produk</button>
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

