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
            <form action="{{ route('admin.kontak.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $main_title }}</h4>

                            <div class="col-md-12 mt-4">
                                <hr>
                            </div>
                            @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Whatsapp</label>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                            name="whatsapp" value="{{ $data->whatsapp }}"  placeholder="Nomor Whatsapp">
                                        @error('whatsapp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                            name="instagram" value="{{ $data->instagram }}"  placeholder="Username/Akun instagram">
                                        @error('instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" value="{{ $data->facebook }}"  placeholder="Username/Akun facebook">
                                        @error('facebook')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Tiktok</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('tiktok') is-invalid @enderror" name="tiktok"
                                                    value="{{ $data->tiktok }}" id="input_pass"  placeholder="Username/Akun tiktok">
                                                @error('tiktok')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Linkedin</label>
                                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                             name="linkedin" value="{{ $data->linkedin }}" placeholder="Username/Akun Linkedin">
                                        @error('linkedin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Twitter</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('twitter') is-invalid @enderror"
                                                    name="twitter" value="{{ $data->twitter }}" id="input_pass"
                                                    placeholder="Username/Akun twitter">
                                                @error('twitter')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                             name="youtube" value="{{ $data->youtube }}" placeholder="Tanggal">
                                        @error('youtube')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                             name="email" value="{{ $data->email }}" placeholder="Email Kantor">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <label>Telfon </label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('telp') is-invalid @enderror"
                                                    name="telp" value="{{ $data->telp }}" id="input_pass"
                                                    placeholder="Nomor Telfon">
                                                @error('logo_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

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
