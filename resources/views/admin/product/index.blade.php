@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Produk</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th class="text-center">Gambar</th>
                                        <th>Set</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                        </thead>

                                        @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}<br><br>
                                                <span class="mb-1"><strong>Size : {{ $product->size }}</strong></span><br>
                                                <span class=""><strong>Color : {{ $product->color }}</strong></span>
                                            </td>
                                            <td class="text-center p-3" width="70px">
                                                <div class="circle-float">
                                                    <img src="{{ asset('images/'.$product->photo) }}" alt="PHOTO IMAGE" class="rounded-circle m-3" width="70px" height="70px">
                                                    <div class="child">{{ $product->productImages->count() }}</div>
                                                </div>

                                                <a href="{{ route('product-images.show',$product->id) }}">
                                                    <small>+ Tambah Foto</small>
                                                </a>
                                            </td>
                                            <td class="p-3">
                                                <div class="card bg-light mb-3">
                                                    <div class="card-body">
                                                        @foreach ($product->priceList as $price)
                                                            <strong>&bullet; {{ $price->name }}  <small>Rp. {{ number_format($price->price) }}</small></strong>
                                                            <br>
                                                        @endforeach
                                                        <a href="{{ route('product-prices.show',$product->id) }}">
                                                            <small>+ Tambah Set</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span class="badge badge-success">aktif</span> </td>
                                            <td>
                                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                                @if(isset($product->deleted_at))
                                                    <a class="btn btn-success btn-action" data-toggle="tooltip" title="" data-original-title="Enable"><i class="fas fa-check"></i></a>
                                                @else
                                                    <button onclick="deleteConfirm('delete-form-{{ $product->id }}')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" method="POST">@csrf @method('DELETE')</form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse

                                </table>
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

@push('javascript')
<script>

    function deleteData(id){
        Swal.fire({
            type : 'success'
        });
    }

    $(document).on('click','#btnEdit',function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        let url = "{{ route('category.update',':ID') }}";
        url = url.replace(':ID',id);
        $('#modal_name').val(name);
        $('#formEdit').attr('action',url);
    });
</script>
@endpush
