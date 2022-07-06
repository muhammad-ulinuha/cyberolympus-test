@extends('olahdata.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>List Order</h4>
                    <div class=" w-25">
                        <form action="/search" method="POST" class="d-flex">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
                            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Orderan</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; ?>
                            @forelse ($orders as $order)
                            <tr class="text-center">
                                <td>{{ $n++ }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->status }}</td>
                                <td></td>

                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data customer tidak tersedia</td>
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
