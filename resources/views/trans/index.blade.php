@extends('app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title}}</h3>
                <div class="mb-3" align="right">
                    <a href="{{route('trans.create')}}" class="btn btn-success">Tambah</a>

                </div>
                <table class="table table-bordered">

                    <tr>
                        <th>No</th>
                        <th>No Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($datas as $index => $data )
                    <tr>
                        <td>{{$index += 1}}</td>
                        {{-- <td><a href="{{route('trans.show', $data->id)}}">{{$data ->order_code}}</a></td> --}}
                        <td>{{$data ->order_code ?? 'na'}}</td>
                        <td>{{$data ->customer->customer_name ?? 'na'}}</td>
                        <td>{{$data ->order_end_date ?? 'na'}}</td>
                        <td>{{$data->status_text ?? 'na'}}</td>
                        <td>
                            {{-- <a href="{{route('print_struk', $data->id)}}" class="btn btn-secondary">Print</a> --}}
                            {{-- <a href="{{route('trans.show', $data->id)}}" class="btn btn-primary">Edit</a> --}}
                            <form action="{{route('trans.destroy', $data->id)}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ngga u???')" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

