@extends('layouts.app')

@section('title', 'Pesanan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pesanan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                <h5>Riwayat Pesanan</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Waktu Dibuat</th>
                                        <th>Nama</th>
                                        <th>Pesanan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                        </thead>

                                        @forelse ($orders as $order)
                                        <tr>
                                            <td>
                                                <strong>
                                                    <i class="fas fa-calendar"></i> {{ date('d-M-Y',strtotime($order->created_at)) }}<br>
                                                    <i class="fas fa-clock"></i> {{ date('H:i',strtotime($order->created_at)) }}
                                                </strong>
                                            </td>
                                            <td>
                                                <i class="fas fa-user"></i> : <strong>{{ $order->name }}</strong>
                                                <br>
                                                <i class="fas fa-phone-alt"></i> : ( {{ $order->phone }} )
                                            </td>
                                            <td class="p-3">
                                                <div class="card bg-light mb-0">
                                                    <div class="card-body">
                                                        @foreach ($order->order_details as $detail)
                                                            <strong>&bullet; {{ $detail->product->name }} x {{ $detail->qty }}</strong>
                                                            <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-dark"><strong>Rp. {{ number_format($order->total) }}</strong></span>
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show',$order->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                <button onclick="deleteConfirm('delete-form-{{ $order->id }}')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                                <form id="delete-form-{{ $order->id }}" action="{{ route('order.destroy',$order->id) }}" method="POST">@csrf @method('DELETE')</form>
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
