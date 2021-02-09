@extends('layouts.app')

@section('title', 'Halaman')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Halaman</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Key</th>
                                            <th>Konten</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @forelse ($pages as $page)
                                        <tr>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->key }}</td>
                                            <td>{{ Str::limit(strip_tags($page->content), 120, '...') }}</td>
                                            <td><a class="btn btn-primary" href="{{ route('page.edit',$page->id) }}"><i class="fas fa-pen"></i></a></td>
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
        let url = "{{ route('slider.update',':ID') }}";
        url = url.replace(':ID',id);
        $('#modal_name').val(name);
        $('#formEdit').attr('action',url);
    });
</script>
@endpush
