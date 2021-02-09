@extends('layouts.app')

@section('title', 'Slider')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <a href="{{ route('slider.create') }}" class="btn btn-primary">Tambah Slider</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Gambar</th>
                                            <th>Text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td width="300px" class="p-3"><img src="{{ asset('images/'.$slider->image) }}" alt="IMAGE-SLIDER" width="300px"></td>
                                        <td>{{ $slider->title }} - {{ $slider->subtitle }}</td>
                                        <td>
                                            <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                            <button onclick="deleteConfirm('delete-form-{{ $slider->id }}')" class="btn btn-danger btn-action"><i class="fas fa-times"></i></button>
                                                    <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" method="POST">@csrf @method('DELETE')</form>
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
