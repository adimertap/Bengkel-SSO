@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Pajak</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pajak</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container mt-n10">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon">1</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Pembayaran</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Daftar Data Pajak</div>
                            <div class="wizard-step-text-details">Tambah Data</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Pembayaran</div>
                            <div class="wizard-step-text-details">Daftar Pajak</div>
                        </div>
                    </a>

                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Step 1</h3>
                                <h5 class="card-title">Input Formulir Pembelian</h5>
                                <form action="{{ route('pajak.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                                            <input class="form-control" id="kode_pajak" type="text" name="kode_pajak"
                                                placeholder="Input Kode Pajak" value="{{ $kode_pajak }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                            <select class="form-control" name="id_pegawai" id="id_pegawai"
                                                class="form-control @error('id_supplier') is-invalid @enderror">
                                                <option>Pilih Pegawai</option>
                                                @foreach ($pegawai as $item)
                                                <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="status_jurnal">Status Jurnal</label>
                                            <input class="form-control" id="status_jurnal" type="text"
                                                name="status_jurnal" value="Pending" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tanggal_bayar">Tanggal Pembayaran</label>
                                            <input class="form-control" id="tanggal_bayar" type="date"
                                                name="tanggal_bayar" placeholder="Input Tanggal Receive"
                                                value="{{ old('tanggal_bayar') }}"
                                                class="form-control @error('tanggal_bayar') is-invalid @enderror" />
                                            @error('tanggal_bayar')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="deskripsi_pajak">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi_pajak" type="text"
                                            name="deskripsi_pajak" placeholder="Deskripsi Pembayaran"
                                            class="form-control @error('deskripsi_pajak') is-invalid @enderror"></textarea>
                                        @error('deskripsi_pajak')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pajak.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                            aria-labelledby="wizard1-tab">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Tambah Data Pajak</h5>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-xxl-10 col-sm-10">
                                    <div class="form-group col-md-4">
                                        <label class="small mb-1" for="deskripsi_pajak">Tambah Data Pajak</label>
                                        <button class="form-control btn btn-secondary" type="button" data-toggle="modal"
                                            data-target="#Modaltambahpajak">Tambah Data Pajak</button>
                                    </div>
                                </div>
                            </div>
                            <div class="datatable">
                                <div id="dataTable_wrapperr" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            <table class="table table-bordered table-hover dataTable"
                                                id="dataTablekonfirmasi" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 100px;">Data Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 120px;">Nilai Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 180px;">Keterangan Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 30px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button">Next</button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                        {{-- ALERT --}}
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Error! Anda belum menambahkan Data Pajak!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="alert alert-success" id="alerttambah" role="alert" style="display:none"> <i
                                class="fas fa-check"></i>
                            Berhasil! Anda berhasil menambahkan Data Pajak!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                    <h3 class="text-primary">Step 3</h3>
                                    <h5 class="card-title">Konfirmasi Pembayaran Pajak</h5>
                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    <div class="h3 text-white">PO</div>
                                    #{{ $kode_pajak }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive col-md-6">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">STEP 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Kode Pajak</div>
                                                    <div class="small text-muted d-none d-md-block">{{ $kode_pajak }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Pegawai</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailpegawai"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Tanggal Pembayaran</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        <span id="detailtanggalbayar"></span></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- 2 --}}
                                <div class="table-responsive col-md-6">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Konfirmasi Formulir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Status Jurnal</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        Pending</div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Deskripsi</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        <span id="detaildeskripsi"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Total Pembayaran Pajak</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailtotalpembayaran"></span></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="Modaltambahpajak" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pajak</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="data_pajak">Data Pajak</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                </span>
                            </div>
                            <input class="form-control" id="data_pajak" type="text" name="data_pajak"
                                placeholder="Input Data Pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                <label class="small mb-1" for="nilai_pajak">Nominal Pajak</label>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <div class="small text-lg-right">
                                    <span class="font-weight-500 text-primary">Detail Nominal: </span>
                                    <span id="detailnominalpajak"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Rp.
                                </span>
                            </div>
                            <input class="form-control" id="nilai_pajak" type="number" name="nilai_pajak"
                                placeholder="Input Nominal Pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_pajak">Keterangan Pajak</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="keterangan_pajak" type="text" name="keterangan_pajak"
                                placeholder="Input Keterangan Pajak"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="tambahpajak(event)" type="button"
                        data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI --}}
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="submit(event,{{ $pajak }})" type="button">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
    function submit(event, pajak) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_pajak = form1.find('input[name="kode_pajak"]').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_bayar = form1.find('input[name="tanggal_pembayaran"]').val()
        var deskripsi_pajak = form1.find('input[name="approve_po"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()


        for (var i = 0; i < pajak.length; i++) {
            var form1 = $('#form2')
            var data_pajak = $('#form2').find('input[name="data_pajak"]').val()
            var nilai_pajak = $('#form2').find('input[name="nilai_pajak"]').val()
            var nilai_pajak_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nilai_pajak)
            var keterangan_pajak = $('#form2').find('textarea[name="keterangan_pajak"]').val()

            if (nilai_pajak_fix == 0 | nilai_pajak_fix == '') {
                continue
            } else {
                var id_pajak = pajak[i].id_pajak
                var obj = {
                    id_pajak: id_pajak,
                    data_pajak: data_pajak,
                    nilai_pajak_fix: nilai_pajak_fix,
                    keterangan_pajak: keterangan_pajak
                }
                dataform2.push(obj)

                console.log(obj)
            }

        }
    }






        function tambahpajak(event) {
            event.preventDefault()
            var _token = $('#form2').find('input[name="_token"]').val()
            var data_pajak = $('#form2').find('input[name="data_pajak"]').val()
            var nilai_pajak = $('#form2').find('input[name="nilai_pajak"]').val()
            var nilai_pajak_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nilai_pajak)
            var keterangan_pajak = $('#form2').find('textarea[name="keterangan_pajak"]').val()

            if (nilai_pajak == 0 | nilai_pajak == '' | data_pajak == '') {
                alert('Data Inputan Ada yang belum terisi')
            } else {
                alert('Berhasil Menambahkan Data Pajak')
                $('#dataTablekonfirmasi').DataTable().row.add([
                    data_pajak, data_pajak, nilai_pajak_fix, keterangan_pajak
                ]).draw();
            }
        }

        function hapussparepart(element) {
            var table = $('#dataTablekonfirmasi').DataTable()
            var row = $(element).parent().parent()
            table.row(row).remove().draw();
            alert('Data Pajak Berhasil di Hapus')
        }

        $(document).ready(function () {
            $('#nilai_pajak').on('input', function () {
                var nominal = $(this).val()
                var nominal_fix = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(nominal)

                $('#detailnominalpajak').html(nominal_fix);
            })
            $('#id_pegawai').on('change', function () {
                var select = $(this).find('option:selected')
                var textpegawai = select.text()
                if (textpegawai == 'Pilih Pegawai') {
                    $('#detailpegawai').html('');
                } else {
                    $('#detailpegawai').html(textpegawai);
                }
            })
            $('#deskripsi_pajak').on('change', function () {
                var deskripsi = $(this).val()

                $('#detaildeskripsi').html(deskripsi);
            })
            $('#tanggal_bayar').on('change', function () {
                var select = $(this)
                var textdate = select.val()
                var splitdate = textdate.split('-')
                console.log(splitdate)
                var datefix = new Date(splitdate[0], splitdate[1] - 1, splitdate[2])
                var formatindodate = new Intl.DateTimeFormat('id', {
                    dateStyle: 'long'
                }).format(datefix)
                $('#detailtanggalbayar').html(formatindodate);
            })

            var template = $('#template_delete_button').html()
            $('#dataTablekonfirmasi').DataTable({
                "columnDefs": [{
                        "targets": -1,
                        "data": null,
                        "defaultContent": template
                    },
                    {
                        "targets": 0,
                        "data": null,
                        'render': function (data, type, row, meta) {
                            return meta.row + 1
                        }
                    }
                ]
            });
        });

</script>

@endsection
