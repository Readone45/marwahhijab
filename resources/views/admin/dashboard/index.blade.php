@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Pesanan Hari Ini</h4>
                      </div>
                      <div class="card-body">
                        59
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                      <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Jumlah Produk</h4>
                        </div>
                        <div class="card-body">
                          59
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                      <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Pesanan</h4>
                        </div>
                        <div class="card-body">
                          59
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>10 Pesanan Terakhir</h4>
                          <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                              <tbody><tr>
                                <th>Invoice ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Action</th>
                              </tr>
                              <tr>
                                <td><a href="#">INV-87239</a></td>
                                <td class="font-weight-600">Kusnadi</td>
                                <td><div class="badge badge-warning">Unpaid</div></td>
                                <td>July 19, 2018</td>
                                <td>
                                  <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                              </tr>
                              <tr>
                                <td><a href="#">INV-48574</a></td>
                                <td class="font-weight-600">Hasan Basri</td>
                                <td><div class="badge badge-success">Paid</div></td>
                                <td>July 21, 2018</td>
                                <td>
                                  <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                              </tr>
                              <tr>
                                <td><a href="#">INV-76824</a></td>
                                <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                <td><div class="badge badge-warning">Unpaid</div></td>
                                <td>July 22, 2018</td>
                                <td>
                                  <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                              </tr>
                              <tr>
                                <td><a href="#">INV-84990</a></td>
                                <td class="font-weight-600">Agung Ardiansyah</td>
                                <td><div class="badge badge-warning">Unpaid</div></td>
                                <td>July 22, 2018</td>
                                <td>
                                  <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                              </tr>
                              <tr>
                                <td><a href="#">INV-87320</a></td>
                                <td class="font-weight-600">Ardian Rahardiansyah</td>
                                <td><div class="badge badge-success">Paid</div></td>
                                <td>July 28, 2018</td>
                                <td>
                                  <a href="#" class="btn btn-primary">Detail</a>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection
