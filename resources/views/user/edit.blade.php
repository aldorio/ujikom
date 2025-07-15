@extends('app');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('user.update', $edit->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Nama User *</label>
                            <input value="{{$edit->name}}" type="text" placeholder="Masukkan Nama User" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Email *</label>
                            <input value="{{$edit->email}}" type="text" placeholder="Masukkan Email Anda" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Password *</label>
                            <input type="password" placeholder="Masukkan Password Anda" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
