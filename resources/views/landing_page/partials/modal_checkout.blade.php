<form id="formCheckout">
<div class="modal fade" id="exampleModalCheckout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Checkout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs custom pb-3" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Diri</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alamat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pengiriman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="confirm-tab" data-toggle="tab" href="#confirm" role="tab" aria-controls="confirm" aria-selected="false">Konfirmasi</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-checkout p-3">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control input" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No Handphone</label>
                            <input type="text" class="form-control input" name="phone" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Kode Pos</label>
                            <input type="text" class="form-control input" name="postal_code" id="postal_code" required>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-checkout p-3">
                        <div class="form-group">
                            <label for="name">Provinsi</label>
                            <select name="province" id="province" onchange="citySelect()" style="width:100%" class="form-control js-select2 input" required>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="form-group">
                            <label for="city">Kabupaten / Kota</label>
                            <select name="city" id="city" style="width:100%" class="form-control js-select2 input" required>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Kecamatan</label>
                            <input type="text" class="form-control input" name="district" placeholder="Kecamatan" required>
                            {{-- <select name="district" id="district" style="width:100%" class="form-control js-select2" required>
                            </select>
                            <div class="dropDownSelect2"></div> --}}
                        </div>
                        <div class="form-group">
                            <label for="phone">Desa / Kelurahan</label>
                            <input type="text" class="form-control input" name="subdistrict" placeholder="Desa / Kelurahan" required>
                            {{-- <select name="district" id="district" style="width:100%" class="form-control js-select2" required>
                            </select>
                            <div class="dropDownSelect2"></div> --}}
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="5" class="form-control input" placeholder="Isi dengan nama jalan,nomor rumah,nama gedung,dsb"></textarea>
                        </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-checkout p-3">
                        <div class="form-group">
                            <label for="name">Layanan Pengiriman</label>
                            <select name="shipping_type" onchange="courierSelect()" id="shipping_type" style="width:100%" class="form-control js-select2 input" required>
                                <option value="">Pilih Layanan</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Metode Pengiriman</label>
                            <select onchange="serviceSelect()" name="shipping_method" id="shipping_method" style="width:100%" class="form-control input js-select2" required>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="confirm" role="tabpanel" aria-labelledby="confirm-tab">
                    <div class="form-checkout p-3">
                        <div class="form-group mt-3">
                            <label for="name"><h4>Konfirmasi Pesanan</h4></label>
                            <p class="py-2"><button class="btn btn-sm btn-primary js-show-cart" data-dismiss="modal">Lihat Keranjang</button></p>
                            <p>Total Pesanan : <strong id="total">Pilih jasa pengiriman</strong></p>
                            <p>Estimasi Biaya Pengiriman : <strong id="cost">Pilih jasa pengiriman</strong></p>
                            <p>Layanan : <strong id="method">Pilih jasa pengiriman</strong></p>
                            <hr>
                            <p>Subtotal : <h3><strong id="subtotal">Pilih Kurir</strong></h3></p>
                        </div>

                        <div id="listCartModal"></div>
                        <input type="hidden" name="form_province" id="form_province" required>
                        <input type="hidden" name="form_city" id="form_city" required>
                        <input type="hidden" name="form_subtotal" id="form_subtotal" required>
                        <input type="hidden" name="form_total" id="form_total" required>
                        <input type="hidden" name="form_weight" id="form_weight" required>
                        <input type="hidden" name="form_shipping_method" id="form_shipping_method" required>
                        <input type="hidden" name="form_shipping_cost" id="form_shipping_cost" required>
                    </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" onclick="btnCheckout()" class="btn btn-primary">Pesan Sekarang</button>
        </div>
      </div>
    </div>
  </div>

</form>
