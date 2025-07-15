@extends('app');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('trans.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">No Pesanan</label>
                                    <input type="text"  class="form-control" name="order_code" readonly value="{{$orderCode}}">
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <select name="id_customer" id="" class="form-control">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($customers as $customer )
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Paket</label>
                                    <select name="id_service"  id="id_service" class="form-control">
                                        <option value="">Pilih Paket</option>
                                        @foreach ($services as $service )
                                        <option data-price="{{$service->price}}" value="{{$service->id}}">{{$service->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">End Order</label>
                                    <input type="date" name="order_end_date" class="form-control">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Catatan</label>
                                    <textarea name="note" class="form-control"  cols="30" rows="5" id=""></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="" alt="">
                            </div>
                        </div>

                        <div class="mt-3" mb-3>
                            <div align="right" class="mb-3" >
                                <button class="btn btn-primary addRow" type="button">Tambah Row</button>
                            </div>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paket</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <p><strong>Grand Total: Rp. <span id="grandTotal">0</span></strong></p>
                            <input type="hidden" name="grand_total" id="grandTotalInput" value="0">
                            <input type="submit" class="btn btn-success" name="save" value="Save">
                            <a href="{{url()->previous()}}" class="btn btn-secondary ">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
