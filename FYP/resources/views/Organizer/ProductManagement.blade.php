@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container bootstrap snippets bootdey pt-5 pl-4">
        <h1 class="text-primary">Product Management ({{ $dealer->name }})</h1>
        <hr>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Product</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Price (RM)</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Condition</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="text-center">
                        <td>
                            <div class="product-info">
                                <span class="product-name">{{ $product->name }}</span>&nbsp;
                                <div class="icon-container">
                                    <span class="icon"
                                        style="background-image: url('/images/{{ $product->image }}')"></span>
                                    <div class="tooltip">
                                        <img src="/images/{{ $product['image'] }}"
                                            style="width: 150px; height: 150px; object-fit: cover" alt="Product Image">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
