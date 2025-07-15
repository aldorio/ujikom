@extends('app');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                       <div class="mb-3">
                            <label for="">Nama User *</label>
                            <input type="text" placeholder="Masukkan Nama User" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Email *</label>
                            <input type="email" placeholder="Masukkan Email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Password *</label>
                            <input type="password" placeholder="Masukkan Password" class="form-control" name="password" required>
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
