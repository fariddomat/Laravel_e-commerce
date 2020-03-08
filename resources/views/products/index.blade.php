@extends('layouts.app')

@section('content')

<div class="panel col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h3>Show Products</h3>
    </div>
    <hr>
    <div class="panel-body">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td scope="row">{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td><a href="{{route('products.edit',$p->id)}}" class="btn btn-xs btn-warning">Edit</a></td>
                <td>
                    <form action="{{route('products.destroy',$p->id)}}" method="POST">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger btn-xs">Delete</button>
                </form></td>
                </tr>
                @endforeach
                
            </tbody>

        </table>
        <div class="text-center">
            
        {{$products->appends(request()->query())->links()}}
        </div>
    </div>
</div>
@endsection