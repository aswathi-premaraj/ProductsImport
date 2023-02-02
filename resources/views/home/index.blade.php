@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div>
           <div class="container mt-5 text-center">
                <h2 class="mb-4">
                Upload
                </h2>
                <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="" id="customFile" accept=".csv">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                    
                </form>
            </div>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
    @auth
@if(count($products)>0)
    <div class="bg-light p-5 rounded">
    <table class="table table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Sku</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->description}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>
@endif
@endauth
@endsection
@section('script')
<script>
    $('#customFile').on('change', function(){ 
        files = $(this)[0].files; name = ''; for(var i = 0; i < files.length; i++){ name += '\"' + files[i].name + '\"' + (i != files.length-1 ? ", " : ""); } $(".custom-file-label").html(name); });
</script>
@endsection