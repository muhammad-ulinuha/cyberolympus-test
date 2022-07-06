@extends('olahdata.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h4 class="card-header">List Top 10 Customer Paling Banyak Pembeli</h4>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Id Customer</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; ?>
                            @forelse ($customers as $customer)
                            <tr class="text-center">
                                <td>{{ $n++ }}</td>
                                <td>{{ $customer->id }}</td>

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
