@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Tambah Kategori</h5>
                            </div>
                            <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Kategori" autocomplete="off" required>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary">Tambah Kategori</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Data Kategori</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Tanggal dibuat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                        </thead>

                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td> <span class="badge badge-success">aktif</span> </td>
                                            <td>
                                                <button data-name="{{ $category->name }}" data-id="{{ $category->id }}" id="btnEdit" class="btn btn-primary btn-action" data-toggle="modal" data-target="#exampleModal" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                                @if(isset($category->deleted_at))
                                                    <a class="btn btn-success btn-action" data-toggle="tooltip" title="" data-original-title="Enable"><i class="fas fa-check"></i></a>
                                                @else
                                                    <button onclick="deleteConfirm('delete-form-{{ $category->id }}')" class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-original-title="Disable"><i class="fas fa-times"></i></button>
                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST">@csrf @method('DELETE')</form>
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
