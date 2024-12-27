@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>

        <a href="{{ route('product.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Produk</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Nama Distributor</th>
                        <th>Diskon</th>
                        <th>Harga Setelah Diskon</th>
                        <th>Action</th>
                    </tr>
                    @php $no = 0; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $no += 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }} Points</td>
                            <td>{{ $item->nama_distributor }}</td>
                            <td>
                                {{ $item->discount ? $item->discount . '%' : 'Tidak ada diskon' }}
                            </td>
                            <td>
                                @if($item->discount)
                                    {{ $item->price - ($item->price * $item->discount / 100) }} Points
                                @else
                                    {{ $item->price }} Points
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                <a href="{{ route('product.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                <form action="{{ route('product.delete', $item->id) }}" method="POST" style="display: inline;" >
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0);" class="badge badge-danger" onclick="this.closest('form').submit();">Hapus</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Produk Kosong</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
