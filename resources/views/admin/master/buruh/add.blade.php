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
                        <li class="breadcrumb-item"><a href="{{ route('master.buruh') }}">Master</a>
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
            <form action="{{ route('master.buruh.add') }}" method="POST" action="" enctype="multipart/form-data">
                @csrf
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $main_title }}</h4>
                        <div class="card-header-right">
                            <a href="{{ route('master.buruh') }}"
                            class="btn btn-outline-secondary text-center border-0 btn-sm"><span><i class="fa fa-arrow-left"></i> Kembali</span></a>
                        </div>
                        <div class="col-md-12 mt-4">
                            <hr>
                        </div>
                        @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Nama</label><sup class="text-danger">*</sup>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" required
                                            name="nama" value="{{ old('nama') }}" placeholder="Nama">
                                        <input type="hidden" class="form-control" nama="role" value="siswa">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Alamat</label><sup class="text-danger">*</sup>
                                        <input type="text"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" value="{{ old('alamat') }}" required
                                            placeholder="alamat">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn waves-effect waves-light btn-inverse rounded" type="reset"> <i class="fa fa-times"></i>Reset</button>
                                <button class="btn waves-effect waves-light btn-success rounded" type="submit"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    @push('custom-scripts')

    <script>
        function generate() {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < 5; i++) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                console.log(result);
                $('#input_pass').val(result)
                // return result;
            }
    </script>
    @endpush
@endsection
