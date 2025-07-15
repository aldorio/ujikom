@extends('app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$title}}</h3>
                        <div class="card-body">
                            <form action="{{route('service.store')}}" method="post">
                                @csrf
                                <label for="" class="form-label">Service Name</label>
                                <input type="text" class="form-control" name="service_name" required>

                                <label for="" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" required>

                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control"  cols="30" rows="5" id=""></textarea>

                                <button type="submit" class="btn btn-primary mt-2">Create</button>
                                <a href="{{url()->previous()}}" class="btn btn-secondary mt-2">Back</a>
                            </form>
                        </div>
                 </div>
            </div>
        </div>
    </div>


@endsection
