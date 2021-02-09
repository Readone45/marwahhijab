@extends('layouts.app')

@section('title', 'Setelan Website')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setelan Website</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Setelan</h5>
                            </div>
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active show" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="false">Situs web</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">SEO</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="true">Alamat Kantor</a>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                    <div class="card-title">
                                        <h5>Situs Web</h5>
                                    </div>
                                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama Situs</label>
                                        <input type="text" name="name" class="form-control" value="{{ site('site.name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Deskripsi Situs</label>
                                        <textarea type="text" name="description" class="form-control" style="height: 100px" required>{{ site('site.description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Logo Situs</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Favicon</label>
                                        <input type="file" name="icon" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <div class="card-title">
                                        <h5>SEO</h5>
                                    </div>
                                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  <div class="form-group">
                                    <label for="">Meta keywords</label>
                                    <textarea type="text" name="keywords" class="form-control" style="height: 100px" required>{{ site('site.keywords') }}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Google Analytics</label>
                                    <textarea type="text" name="google_analytics" class="form-control" style="height: 100px">{{ site('site.google_analytics') }}</textarea>
                                  </div>
                                  <div class="form-group">
                                    <button class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-title">
                                        <h5>Alamat</h5>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea type="text" name="address" class="form-control" style="height: 100px" required>{{ site('site.address') }}</textarea>
                                    </div>

                                    <p class="text-danger">
                                        Harap Isi provinsi dan Kabupaten jika ingin mengubah alamat pengiriman
                                    </p>
                                    <div class="form-group">
                                        <label for="">Provinsi</label>
                                        <select name="province" id="province" class="form-control">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kabupaten / Kota</label>
                                        <select name="city" id="city" class="form-control">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                    </form>
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
</script>
@endpush
