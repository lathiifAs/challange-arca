@extends('template_admin.template')
@section('konten')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ $main_title }}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="ti-layout-grid2-alt"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('master.artikel') }}">Master</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">{{ $main_title }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <form action="{{ route('master.artikel.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                            <div class="card-header-right">
                                <a href="{{ route('master.artikel') }}"
                                    class="btn btn-outline-secondary text-center border-0 btn-sm"><span><i
                                            class="fa fa-arrow-left"></i> Kembali</span></a>
                            </div>
                            <div class="col-md-12 mt-4">
                                <hr>
                            </div>
                            @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Thumbnail <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <input type="file"
                                            class="form-control @error('thumbnail_name') is-invalid @enderror"
                                            name="thumbnail_name" value="{{ old('thumbnail_name') }}" required
                                            placeholder="thumbnail_name">
                                        @error('thumbnail_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Kategori</label>
                                        <select class="form-control" required name="kategori_id">
                                            @forelse($kategori as $key=> $kt)
                                                <option value="{{ $kt->id }}">{{ $kt->name }}</option>
                                            @empty
                                                <option value="">Data Kosong !</option>
                                            @endforelse
                                        </select>
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Judul</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" value="{{ old('title') }}" required placeholder="Judul">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Status Publish</label>
                                        <select class="form-control" required name="st_publish">
                                            <option value="1">Publish</option>
                                            <option value="0">Jangan Publish</option>
                                        </select>
                                        @error('st_publish')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Konten</label>
                                        <textarea name="content" class="form-control" id="summernote" cols="30" rows="30">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn waves-effect waves-light btn-inverse rounded" type="reset"> <i
                                        class="fa fa-times"></i>Reset</button>
                                <button class="btn waves-effect waves-light btn-success rounded" type="submit"><i
                                        class="fa fa-check"></i> Simpan</button>
                            </div>
            </form>
        </div>
    </div>

    @push('custom-scripts')
        <script type="text/javascript" src="{{ URL('admin_template/assets/plugins/summernote/summernote-bs4.min.js') }}">
        </script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    tabsize: 3,
                    height: 550
                });
            });
        </script>
    @endpush
@endsection
