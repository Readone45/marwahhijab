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
                                <h5>Tambah Foto</h5>
                            </div>
                            <form action="{{ route('product-images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <input type="file" id="photo" name="photo" class="form-control" required>
                            </div>
                            <div class="form-group mb-0">
                                <input type="hidden" name="product_id" required value="{{ request()->segment(3) }}">
                                <button class="btn btn-primary">Tambah foto</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Gallery Foto Produk</h5>
                            </div>

                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-img-top" style="background-image: url({{ asset('images/'.$image->photo) }});height:30vh;background-size:cover;background-position : center"></div>
                                                <div class="card-footer px-0 py-0">
                                                    <button onclick="deleteConfirm('delete-form-{{ $image->id }}')" class="btn form-control btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                                    <form id="delete-form-{{ $image->id }}" action="{{ route('product-images.destroy',$image->id) }}" method="POST">@csrf @method('DELETE')</form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

    $(".gallery .gallery-item").each(function() {
    var me = $(this);

    me.attr('href', me.data('image'));
    me.attr('title', me.data('title'));
    if(me.parent().hasClass('gallery-fw')) {
      me.css({
        height: me.parent().data('item-height'),
      });
      me.find('div').css({
        lineHeight: me.parent().data('item-height') + 'px'
      });
    }
    me.css({
      backgroundImage: 'url("'+ me.data('image') +'")'
    });
  });
</script>
@endpush
