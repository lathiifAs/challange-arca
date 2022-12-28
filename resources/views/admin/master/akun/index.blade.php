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
                        <li class="breadcrumb-item"><a href="#!">Master</a>
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
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Akun</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-refresh reload-card"></i></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mt-5">
                                <form action="{{ route('master.akun') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="keyword"
                                            value="{{ $keyword }}" placeholder="Pencarian..."
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-grd-primary mdi mdi mdi-magnify px-3" type="submit"
                                            id="button-addon2"> Cari</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-9 mt-5 text-right">
                                <a href="{{ route('master.akun.add') }}" class="btn btn-primary mdi mdi mdi-magnify px-3"
                                    type="submit" id="button-addon2"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th class="text-center" width="20%">Role</th>
                                        <th class="text-center" width="30%">Nama</th>
                                        <th class="text-center" width="25%">Email</th>
                                        <th width="20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $key=> $akun)
                                        <tr>
                                            <th class="text-center">{{ $key + 1 }}</th>
                                            <td class="text-center">{{ strtoupper(trans($akun->type)) }}</td>
                                            <td>{{ $akun->name }}</td>
                                            <td class="text-center">{{ $akun->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('master.akun.edit', $akun->id) }}" title="edit"
                                                    class="btn waves-effect waves-light btn-out btn-warning rounded"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="#" onclick="hapus({{ $akun->id }})" title="Hapus"
                                                    class="btn waves-effect waves-light btn-out btn-danger rounded ml-1"><i
                                                        class="fa fa-trash"></i></a>
                                                {{-- <button type="submit" title="Hapus" class="ml-2 btn rounded btn-danger mb-0 p-2"><span
                                                        class="fa fa-trash"></span></button> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-mute" colspan="5">Data tidak tersedia !
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-block justify-content-center">
                                <div class="col-lg-12" style="float: center">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            function hapus(id) {
                Swal.fire({
                    title: 'Anda yakin ingin menghapus data ini?',
                    text: "Data yang terhapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get('/master/akun/delete/' + id)
                            .then(function(response) {

                                if (response.data.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        response.data.message,
                                        'success'
                                    ).then(function() {
                                        location.reload();
                                    })
                                } else {
                                    Swal.fire(
                                        'Danger!',
                                        response.data.message,
                                        'error'
                                    )
                                }
                                console.log();
                            })
                            .catch(function(error) {
                                console.log(error);
                            })

                    }
                })
            }
        </script>
    @endpush
@endsection
