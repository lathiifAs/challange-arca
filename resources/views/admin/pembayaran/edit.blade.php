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
            <form action="{{ route('admin.home.update') }}" method="POST" >
                <input type="hidden" name="id" value="{{ $pembayaran->id }}">
                @csrf
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $main_title }}</h4>
                        <div class="card-header-right">
                            <a href="{{ route('admin.home') }}"
                            class="btn btn-outline-secondary text-center border-0 btn-sm"><span><i class="fa fa-arrow-left"></i> Kembali</span></a>
                        </div>
                        <div class="col-md-12 mt-4">
                            <hr>
                        </div>
                        @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Pembayaran</label><sup class="text-danger">*</sup>
                                        <input type="number" class="form-control @error('pembayaran') is-invalid @enderror" required id="pembayaran"
                                            name="pembayaran" value="{{ $pembayaran->total_bonus }}" placeholder="Rp.">
                                        @error('pembayaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="row mt-5">
                                        <div class="col-md-6 mt-2">
                                            <h6 class="">Presentase Buruh</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right">
                                                <a href="#" class="btn btn-primary mdi mdi mdi-magnify px-3" onclick="tambahburuh()"
                                                    type="submit" id="button-addon2"> <i class="fa fa-plus"></i> Tambah Buruh</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="20%">Buruh</th>
                                                        <th class="text-center" width="25%">Presentase</th>
                                                        <th class="text-center" width="20%">Hasil Bonus</th>
                                                        <th width="15%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="append_list">
                                                <tr id="1">
                                                    <td>
                                                        <select class="js-example-basic-single" name="buruh_id[]">
                                                                <option value="">Pilih Buruh</option>
                                                                @forelse($data as $key=>$buruh)
                                                                    <option value="{{ $buruh->id }}" @if($pembayaran_detail[0]->buruh_id == $buruh->id) selected
                                                                    @endif>{{ $buruh->nama }}</option>
                                                                @empty
                                                                    <option value="">Data Buruh Kosong !</option>
                                                                @endforelse
                                                            </select>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input type="number" class="form-control allinput present" value="{{ $pembayaran_detail[0]->presentase }}" name="presentase[]">
                                                            </div>
                                                            <div class="col-md-1 mt-1">
                                                                <label for="">%</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right"><i>Rp.<label for="" class = "hasilbayar">{{ number_format($pembayaran_detail[0]->hasil_bonus, 0) }}</label><input type="hidden" class="hasilbayarinput" value="{{ $pembayaran_detail[0]->hasil_bonus }}" name="hasil_bayar[]"></i></td>
                                                    <td></td>

                                                </tr>

                                                <tr id="2">
                                                    <td>
                                                        <select class="js-example-basic-single" name="buruh_id[]">
                                                                <option value="">Pilih Buruh</option>
                                                                @forelse($data as $key=>$buruh)
                                                                    <option value="{{ $buruh->id }}" @if($pembayaran_detail[1]->buruh_id == $buruh->id) selected
                                                                    @endif>{{ $buruh->nama }}</option>
                                                                @empty
                                                                    <option value="">Data Buruh Kosong !</option>
                                                                @endforelse
                                                            </select>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input type="number" class="form-control allinput present" value="{{ $pembayaran_detail[1]->presentase }}" name="presentase[]">
                                                            </div>
                                                            <div class="col-md-1 mt-1">
                                                                <label for="">%</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right"><i>Rp.<label for="" class = "hasilbayar">{{ number_format($pembayaran_detail[1]->hasil_bonus, 0) }}</label><input type="hidden" class="hasilbayarinput" value="{{ $pembayaran_detail[1]->hasil_bonus }}" name="hasil_bayar[]"></i></td>
                                                    <td></td>
                                                </tr>

                                                <tr id="3">
                                                    <td>
                                                        <select class="js-example-basic-single" name="buruh_id[]">
                                                                <option value="">Pilih Buruh</option>
                                                                @forelse($data as $key=>$buruh)
                                                                    <option value="{{ $buruh->id }}" @if($pembayaran_detail[2]->buruh_id == $buruh->id) selected
                                                                    @endif>{{ $buruh->nama }}</option>
                                                                @empty
                                                                    <option value="">Data Buruh Kosong !</option>
                                                                @endforelse
                                                            </select>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input type="number" class="form-control allinput present" value="{{ $pembayaran_detail[2]->presentase }}" name="presentase[]">
                                                            </div>
                                                            <div class="col-md-1 mt-1">
                                                                <label for="">%</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right"><i>Rp.<label for="" class = "hasilbayar">{{ number_format($pembayaran_detail[2]->hasil_bonus, 0) }}</label><input type="hidden" class="hasilbayarinput" value="{{ $pembayaran_detail[2]->hasil_bonus }}" name="hasil_bayar[]"></i></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn waves-effect waves-light btn-outline-primary rounded mr-4" type="button" onclick="hitungpresentase()"><i class="fa fa-percent"></i> Hitung</button>
                                <button class="btn waves-effect waves-light btn-success rounded" type="submit" id="btnsave"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    @push('custom-scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


    <script>

            var list_index = 4;

            $(document).ready(function() {
                $('#btnsave').hide();

                var data_array = {!! json_encode($pembayaran_detail) !!}
                data_array = data_array.slice(3)

                var data_table = '';
                data_array.forEach(function(list, index) {
                    // console.log(list.buruh_id)

                    var data_buruh = {!! json_encode($data) !!}

                    var options_list = '';
                    console.log(list.buruh_id);
                    data_buruh.forEach(function (list_buruh, index_buruh) {

                        var st_check = '';
                        if (list_buruh.id == list.buruh_id) {
                            st_check = 'selected';
                        }

                        options_list += `<option value="`+list_buruh.id+`" `+st_check+`>`+list_buruh.nama+`</option>`
                    });


                    data_table += `<tr id=`+list_index+`>
                        <td>
                            <select class="js-example-basic-single" name="buruh_id[]">
                                    <option value="">Pilih Buruh</option>
                                    `+options_list+`
                                </select>
                        </td>
                        <td class="d-flex justify-content-center">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="number" class="form-control allinput present" value="`+list.presentase+`" name="presentase[]">
                                </div>
                                <div class="col-md-1 mt-1">
                                    <label for="">%</label>
                                </div>
                            </div>
                        </td>
                        <td class="text-right"><i>Rp.<label for="" class = "hasilbayar">`+list.hasil_bonus.toLocaleString('id-ID')+`</label><input type="hidden" class="hasilbayarinput" value="`+list.hasil_bonus+`" name="hasil_bayar[]"></i></td>
                        <td>
                            <a href="#" onclick="hapusburuh(`+list_index+`)" title="Hapus"
                        class="btn waves-effect waves-light btn-out btn-danger rounded ml-1"><i
                            class="fa fa-trash"></i></a>
                        </td>
                    </tr>`
                });

                $( "#append_list" ).append(data_table);

                var select2 = $('.js-example-basic-single').select2();

                // var select2 = $('.js-example-basic-single').select2();
                // list_index = list_index + 1;

            });

            function hitungpresentase() {
                var sum = 0;
                var buruh = [];
                var bayar = $('#pembayaran').val()

                $('.present').each(function() {
                    sum += Number($(this).val());
                });

                    //validasi presentase
                if (sum != 100) {
                    alert('Gagal! Total Presentase tidak 100%')
                }else if(!bayar){
                    alert('Gagal! Pembayaran tidak boleh kosong !')
                }else{
                    // validasi buruh
                    $('.js-example-basic-single').each(function(index) {
                        if (!$(this).val()) {
                            alert('Buruh harus dipilih!')
                            return false;
                        }else{
                            if (jQuery.inArray($(this).val(), buruh) !== -1) {
                                alert('buruh tidak boleh sama!')
                                return false;
                            }else{
                                buruh.push($(this).val())
                            }


                            var presentase =  $("input[name='presentase[]']")
                                .map(function(){return $(this).val();}).get();


                                $('.hasilbayar').each(function(index) {
                                    $(this).html('');
                                    var hasil_bayar =  bayar * presentase[index] / 100;
                                    $(this).html(hasil_bayar.toLocaleString('id-ID'));
                                });

                                $('.hasilbayarinput').each(function(index) {

                                var hasil_bayar =  bayar * presentase[index] / 100;
                                    $(this).val('');
                                    $(this).val(hasil_bayar);
                                    $('#btnsave').show();
                                });

                        }

                    });
                }

            }

            function tambahburuh() {
                $( "#append_list" ).append(`
                <tr id=`+list_index+`>
                    <td>
                        <select class="js-example-basic-single" name="buruh_id[]">
                            <option value="">Pilih Buruh</option>
                            @forelse($data as $key=>$buruh)
                                <option value="{{ $buruh->id }}">{{ $buruh->nama }}</option>
                            @empty
                                <option value="">Data Buruh Kosong !</option>
                            @endforelse
                        </select>
                    </td>
                    <td class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="number" class="form-control allinput present" id="present`+list_index+`" name="presentase[]">
                            </div>
                            <div class="col-md-1 mt-1">
                                <label for="">%</label>
                            </div>
                        </div>
                    </td>
                    <td class="text-right"><i>Rp. <label for="" class = "hasilbayar"></label> <input type="hidden" class="hasilbayarinput" name="hasil_bayar[]"></i></td>
                    <td class="text-center">
                        <a href="#" onclick="hapusburuh(`+list_index+`)" title="Hapus"
                    class="btn waves-effect waves-light btn-out btn-danger rounded ml-1"><i
                        class="fa fa-trash"></i></a>
                    </td>
                </tr>
                `);
                var select2 = $('.js-example-basic-single').select2();
                list_index = list_index + 1;
              }



            function hapusburuh(id) {
                list_index = list_index - 1;
                $( '#'+id ).remove();
            }

    </script>
    @endpush
@endsection
