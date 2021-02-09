@extends('layouts.app')

@section('title', 'Sosial Media')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setelan Sosial Media</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Sosial Media</h5>
                            </div>
                            <form action="{{ route('socmed.store') }}" method="POST">
                                @csrf
                                @foreach ($settings as $socmed)
                                    <div class="form-group">
                                        <label>{{ $socmed->display_name }}</label>
                                        <input type="text" name="{{ str_replace('socmed.','',$socmed->key) }}" class="form-control" value="{{ $socmed->value }}" required>
                                    </div>
                                @endforeach
                                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
