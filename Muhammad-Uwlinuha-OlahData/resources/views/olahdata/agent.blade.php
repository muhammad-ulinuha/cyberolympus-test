@extends('olahdata.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h4 class="card-header">List Top 10 Agent Paling Banyak Mendapatkan Customer</h4>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Name Agent</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; ?>
                            @forelse ($agents as $agent)
                            <tr class="text-center">
                                <td>{{ $n++ }}</td>
                                <td>{{ $agent->store_name }}</td>

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
