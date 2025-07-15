@extends('app');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('customer.update', $edit->id)}}" method="post">
                        @csrf
                        @method('PUT')
                         <div class="mb-3">
                            <label for="">Nama Customer *</label>
                            <input value="{{$edit->name}}"  type="text" placeholder="Masukkan Nama Level" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input value="{{$edit->phone}}" type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <textarea name="addres" class="form-control"  cols="30" rows="5" id="">{{$edit->addres}}</textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{url()->previous()}}" class="btn btn-secondary mt-2">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
