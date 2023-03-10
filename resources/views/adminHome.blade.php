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
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $main_title }}</h5>
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
                            </div>
                            <div class="col-md-9 mt-5 text-right">
                                <a href="{{ route('admin.home.add') }}" class="btn btn-primary mdi mdi mdi-magnify px-3"
                                    type="submit" id="button-addon2"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10%">No.</th>
                                        <th class="text-center" width="25%">Tanggal</th>
                                        <th class="text-center" width="25%">Total Biaya</th>
                                        <th width="20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $key=> $byr)
                                        <tr>
                                            <th class="text-center">{{ $key + 1 }}</th>
                                            <td class="text-center">{{ date('d F Y', strtotime($byr->created_at)); }}</td>
                                            <td class="text-right">Rp. {{ number_format($byr->total_bonus, 0) }}</td>
                                            <td class="text-center">
                                                <a href="#" title="detail" onclick="openModal({{ $byr->id }})"
                                                    class="btn waves-effect waves-light btn-out btn-info rounded"><i
                                                        class="fa fa-info"></i></a>
                                                <a href="{{ route('admin.home.edit', $byr->id) }}" title="edit"
                                                    class="btn waves-effect waves-light btn-out btn-warning rounded"><i
                                                        class="fa fa-edit"></i></a>

                                                @if (auth()->user()->type == 'admin')
                                                <a href="#" onclick="hapus({{ $byr->id }})" title="Hapus"
                                                    class="btn waves-effect waves-light btn-out btn-danger rounded ml-1"><i
                                                        class="fa fa-trash"></i></a>
                                                @endif
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

    <!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran Bonus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="row">
                        <label for="">Tnggal</label>
                    </div>
                    <div class="row">
                        <b><label for="" id="tgl">27 10 96</label></b>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label for="">Total Pembayaran</label>
                    </div>
                    <div class="row">
                        <b><label for="" id="total_bayar">27 10 96</label></b>
                    </div>
                </div>

                <h5 class="mt-3">Detail Pembayaran</h5>

                <div class="table-responsive mt-2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="20%">Buruh</th>
                                <th class="text-center" width="25%">Presentase</th>
                                <th class="text-center" width="20%">Hasil Bonus</th>
                            </tr>
                        </thead>
                        <tbody id="append_list">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        axios.get('/admin/home/delete/' + id)
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


            function openModal(id) {
                axios.get('/admin/home/detail/' + id)
                            .then(function(response) {
                                $( "#append_list" ).html('');
                                // console.log(response.data.data_pembayaran);
                                var date = new Date(response.data.data_pembayaran.created_at);
                                date = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear();
                                $('#tgl').html(date);
                                $('#total_bayar').html(response.data.data_pembayaran.total_bonus.toLocaleString('id-ID'));

                                var table = '';
                                response.data.data_pembayaran_detail.forEach(function(list, index) {
                                    // console.log(list.nama);
                                    table += `<tr>
                                        <td>`+list.nama+`</td>
                                        <td class="text-center">`+list.presentase+`%</td>
                                        <td class="text-center">Rp.`+list.hasil_bonus.toLocaleString('id-ID')+`</td>
                                    </tr>`;
                                });

                                $( "#append_list" ).append(table);

                                $('#detailModal').modal('show');
                            })
                            .catch(function(error) {
                                console.log(error);
                            })
            }
        </script>
    @endpush
@endsection
