@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Data Customers</h4>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-outline-secondary mb-3" id="create-new-post" onclick="addCustomer()">Tambah Data</a>
                    </div>
                    <div class="d-flex justify-content-between">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel"></i> Filters
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="/rowten" class="dropdown-item" type="button">Tampilakan data 1-10</a></li>
                            <li><a href="/az" class="dropdown-item" type="button">Mengurutkan data A-Z</a></li>
                        </ul>
                    </div>
                    <form action="/search" method="POST" class="d-flex">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <!-- form filter data berdasarkan range tanggal  -->
                    <form action="/searchdate" method="POST">
                        @csrf
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input type="date" class="form-control" name="catitanggal" id="caritanggal" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                    </div>
                    
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- { $n=1 } --}}
                            <?php $n=1; ?>
                            @forelse ($customers as $customer)
                            <tr class="text-center">
                                <td>{{ $n++ }}</td>
                                <td>{{ $customer->nama }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->telepon }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                        <a href="#"class="btn btn-sm btn-primary btn-edit"
                                        data-id="{{ $customer->id }}"
                                        data-nama="{{ $customer->nama }}"
                                        data-alamat="{{ $customer->alamat }}"
                                        data-telepon="{{ $customer->telepon }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
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


{{-- modal add customer --}}
    <div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Customer</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Nama : </label>
                        <div class="form-group mb-3">
                            <input type="text" id="nama" name="nama"  placeholder="nama..." class="form-control"
                                required>
                        </div>

                        <label class="form-label">Alamat : </label>
                        <div class="foreground mb-3">                            
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>

                        <label>Telepon : </label>
                        <div class="form-group">
                            <input type="text" id="telepon" name="telepon"  placeholder="telepon..." class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>

                        <button type="submit" name="tombol" class="btn btn-primary ml-1" value="Simpan">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
{{-- end modal add customer --}}

{{-- modal edit customer --}}
    <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Form Edit Post </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Nama : </label>
                        <div class="form-group">
                            <input type="text" placeholder="nama" id="nama" class="form-control nama" name="nama" required>
                        </div>

                        <label>Alamat : </label>
                        <div class="form-group">
                            <textarea type="text" id="alamat" name="alamat"  placeholder="alamat" class="form-control alamat"
                                required></textarea>
                        </div>

                        <label>Telepon : </label>
                        <div class="form-group">
                            <input type="text" placeholder="telepon" id="telepon" class="form-control telepon" name="telepon" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>

                        <button type="submit" name="tombol" class="btn btn-primary ml-1" value="Simpan">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- end modal edit customer --}}


<script src="/js/jquery.min.js"></script>

<script>
    $('#laravel_crud').DataTable();
        function addCustomer() {
        $("#idCustomer").val('');
        $('#post-modal').modal('show');
    }
</script>

<script>
    $(document).ready(function(){
        // get Edit
    $('.btn-edit').on('click',function(){
        // get data from button edit
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const telepon = $(this).data('telepon');

        // Set data to Form Edit
        $('.id').val(id);
        $('.nama').val(nama);
        $('.alamat').val(alamat);
        $('.telepon').val(telepon);

        // Call Modal Edit
        $('#editModal').modal('show');
    });
    });
</script>
@endsection
