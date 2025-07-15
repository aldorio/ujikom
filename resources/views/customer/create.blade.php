@extends('app');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('customer.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Customer *</label>
                            <input type="text" placeholder="Masukkan Nama Customer" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="number" placeholder="Masukkan Password" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <textarea name="addres" class="form-control"  cols="30" rows="5" id=""></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{url()->previous()}}" class="btn btn-secondary ">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
