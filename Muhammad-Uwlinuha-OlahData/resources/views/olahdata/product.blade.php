@extends('olahdata.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h4 class="card-header">List Top 10 Product Banyak Terjual</h4>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Jumlah Terjual</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- { $n=1 } --}}
                            <?php $n=1; ?>
                            @forelse ($products as $product)
                            <tr class="text-center">
                                <td>{{ $n++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->ordering }}</td>
                                <td>{{ $product->status }}</td>

                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
