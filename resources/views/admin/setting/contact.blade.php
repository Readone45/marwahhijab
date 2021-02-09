@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setelan Kontak</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Kontak</h5>
                            </div>
                            <form action="{{ route('admin.contact.store') }}" method="POST">
                                @csrf
                                @foreach ($settings as $contact)
                                    @if ($contact->type == 'rich_text')
                                    <div class="form-group">
                                        <label>{{ $contact->display_name }}</label>
                                        <textarea style="height: 180px" name="{{ str_replace('contact.','',$contact->key) }}" class="form-control" required>{{ $contact->value }}</textarea>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label>{{ $contact->display_name }}</label>
                                        <input type="text" name="{{ str_replace('contact.','',$contact->key) }}" class="form-control" value="{{ $contact->value }}" required>
                                    </div>
                                    @endif
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
