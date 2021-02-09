@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <section class="section">
        <div class="section-header">
            <img src="{{ asset('images/'.$product->photo) }}" alt="IMG-PRODUCT" width="60px" height="60px" class="rounded-circle">
            <div class="d-flex flex-column">
                <strong class="ml-3">{{ Str::limit($product->name, 40, '...') }}</strong>
                <small class="ml-3">Foto Produk</small>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Tambah Set dan Harga</h5>
                            </div>
                            <form action="{{ route('product-prices.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <label for="">Nama Set</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Set" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" min="0" class="form-control" placeholder="Harga" required>
                            </div>
                            <div class="form-group mb-0">
                                <input type="hidden" name="product_id" required value="{{ request()->segment(3) }}">
                                <button class="btn btn-primary">Tambah Set</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Daftar Set & Harga</h5>
                            </div>

                            <div class="table-responsiive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Set</th>
                                            <th>Harga</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    @foreach ($product->priceList as $price)
                                    <tr>
                                        <td>{{ $price->name }}</td>
                                        <td> Rp. {{ number_format($price->price) }} </td>
                                        <td>
                                            <button data-name="{{ $price->name }}" data-price="{{ $price->price }}" data-id="{{ $price->id }}" id="btnEdit" class="btn btn-primary btn-action" data-toggle="modal" data-target="#exampleModal" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                            <button onclick="deleteConfirm('delete-form-{{ $price->id }}')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                            <form id="delete-form-{{ $price->id }}" action="{{ route('product-prices.destroy',$price->id) }}" method="POST">@csrf @method('DELETE')</form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
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
          <h5 class="modal-title">Update Set & Harga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-0">
            <label for="name">Nama Set</label>
            <input type="text" name="name" id="modal_name" placeholder="Nama Set" class="form-control" required>
          </div>
          <div class="form-group mb-0">
            <label for="name">Harga</label>
            <input type="text" name="price" id="modal_price" placeholder="Harga" class="form-control" required>
          </div>
        </div>
        <input type="hidden" name="id" id="modal_id" required>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</form>
</div>
@endpush

@push('javascript')
<script>

    $(document).on('click','#btnEdit',function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        let url = "{{ route('product-prices.update',':ID') }}";
        url = url.replace(':ID',id);
        $('#modal_name').val(name);
        $('#modal_price').val(price);
        $('#modal_id').val(id);
        $('#formEdit').attr('action',url);
  });

</script>
@endpush
