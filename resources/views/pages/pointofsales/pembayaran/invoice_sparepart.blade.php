@extends('layouts.Admin.adminpointofsales')

@section('content')
{{-- HEADER --}}
<main>
    <!-- Main page content-->
    <div class="container mt-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                        <!-- Invoice branding-->
                        <img class="invoice-brand-img rounded-circle mb-4" src="/image/services.png" style="color:"
                            lt="" />
                        <div class="h2 text-white mb-0">{{ $pembayaran->kode_penjualan }}</div>
                        Bengkel
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        {{ $pembayaran->tanggal }}
                    </div>
                </div>
            </div>
            <div class="card-body p-4 p-md-5">
                <!-- Invoice table-->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="border-bottom">
                                <tr class="small text-uppercase text-muted">
                                    <th scope="col" colspan="10">List Sparepart</th>
                                    <th class="text-right" scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Invoice item 1-->
                                @forelse ($pembayaran->Detailsparepart as $item)
                                <tr class="border-bottom">
                                    <td colspan="10">
                                        <div class="font-weight-bold">{{ $item->nama_sparepart }}</div>
                                    </td>
                                    <td class="text-right font-weight-bold">Rp.
                                        {{ number_format($item->pivot->total_harga,0,',','.') }}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-borderless center col-6 mt-3 mx-auto">
                            <thead>
                            <tbody>
                                <!-- Invoice subtotal-->
                                <tr>
                                    <td class="pb-0">
                                        <div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div>

                                    </td>
                                    <td hidden=""><input type="text" class="nilai-subtotal2-td" name="subtotal"
                                            value="{{ $pembayaran->total_bayar }}"></td>
                                    <td hidden=""><input type="text" class="temp" name="temp"
                                            value="{{ $pembayaran->total_bayar }}"></td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <span
                                            class="diskon-td text-uppercase small font-weight-700 text-muted">Diskon</span>
                                        <br>
                                        <a href="#" class="ubah-diskon-td text-uppercase small font-weight-300">Ubah
                                            diskon</a>
                                        <a href="#" class="simpan-diskon-td text-uppercase small font-weight-300"
                                            hidden="">Simpan</a>
                                    </td>
                                    <td class="text-right pb-0 d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control diskon-input mr-2 col-4" min="0"
                                            max="100" name="diskon" value="0" hidden="">
                                        <span class="nilai-diskon-td mr-1 h5 mb-0 font-weight-700">0</span>
                                        <span class="h5 mb-0 font-weight-700">%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <span class="ppn-td text-uppercase small font-weight-700 text-muted">PPN</span>
                                        <br>
                                        <a href="#" class="ubah-ppn-td text-uppercase small font-weight-300">Ubah
                                            PPN</a>
                                        <a href="#" class="simpan-ppn-td text-uppercase small font-weight-300"
                                            hidden="">Simpan</a>
                                    </td>
                                    <td class="text-right pb-0 d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control ppn-input mr-2 col-4" min="0" max="100"
                                            name="ppn" value="0" hidden="">
                                        <span class="nilai-ppn-td mr-1 h5 mb-0 font-weight-700">0</span>
                                        <span class="h5 mb-0 font-weight-700">%</span>
                                    </td>
                                </tr>
                                <!-- Invoice total-->
                                <tr>
                                    <td class="pb-0">
                                        <div class="text-uppercase small font-weight-700 text-muted">Total Bayar:
                                        </div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700 text-green nilai-total1-td">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div>
                                    </td>
                                    <td class="text-right pb-0" hidden=""><input type="text" class="nilai-total2-td"
                                            name="total" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <hr>
                                        <div class="text-uppercase small font-weight-700 mt-4">Nominal Bayar:
                                        </div>
                                    </td>
                                    <td>
                                        <hr>
                                        <div class="text-right pb-0 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" onkeyup="validasi_bayar(this.value)" id="nominalBayar"
                                                class="form-control number-input input-notzero bayar-input" name="bayar"
                                                placeholder="Masukkan nominal bayar">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-right pb-0 nominal-error" hidden="">
                                    <td class="text-danger nominal-min">Nominal bayar kurang</td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-borderless center mt-1 col-4 mx-auto">
                            <tr>
                                <td class="text-right">
                                    <button class="btn btn-bayar btn-outline-success btn-block" id="validasibayar"
                                        data-toggle="modal" data-target="#modal_success" style="display: none"
                                        type="button">Bayar
                                        Sekarang</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                        <div class="h6 mb-1">{{ $pembayaran->Customer->nama_customer }}</div>
                        <div class="small">{{ $pembayaran->Customer->alamat_customer }}</div>
                        <div class="small">{{ $pembayaran->Customer->nohp_customer }}</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                        <div class="h6 mb-0">{{ $pembayaran->Bengkel->nama_bengkel }}</div>
                        <div class="small">{{ $pembayaran->Bengkel->alamat_bengkel }}</div>
                        <div class="small">{{ $pembayaran->Bengkel->nohp_bengkel }}</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                        <div class="small mb-0">Harap periksa Invoice {{ $pembayaran->kode_penjualan }} sebelum
                            melakukan pembayaran!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal transaksi sukses --}}

    <div class="modal fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body bg-grey">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h4 class="transaction-success-text">Transaksi Berhasil</h4>
                        </div>
                        <div class="col-12">
                            <table class="table-receipt">
                                <tr>
                                    <td>
                                        <span class="d-block little-td">Kode Transaksi</span>
                                        <span class="d-block font-weight-bold">{{ $pembayaran->kode_penjualan }}</span>
                                    </td>
                                    <td>
                                        <span class="d-block little-td">Tanggal</span>
                                        <span class="d-block font-weight-bold">{{ $pembayaran->tanggal }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-block little-td">Kasir</span>
                                        <span
                                            class="d-block font-weight-bold">{{ Auth::user()->pegawai->nama_pegawai }}</span>
                                    </td>
                                    <td>
                                        <span class="d-block little-td">Total</span>
                                        <div id="totalModal"
                                            class="h5 mb-0 font-weight-700 text-green nilai-total-modal">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div>
                                    </td>
                                </tr>
                            </table>
                            <table class="table-summary mt-3">
                                <tr>
                                    <td class="line-td" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td class="little-td big-td">Bayar</td>
                                    <td><div id="bayarModal"
                                            class="h5 mb-0 font-weight-700 text-green nilai-total-modal">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div></td>
                                </tr>
                                <tr>
                                    <td class="little-td big-td">Kembali</td>
                                    <td><div id="kembaliModal"
                                            class="h5 mb-0 font-weight-700 text-green nilai-total-modal">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-close-modal" data-dismiss="modal">Tutup</button>
                    <a href="" target="_blank" class="btn btn-sm btn-cetak-pdf">Cetak Struk</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function diskon() {
        var temp = parseInt($('input[name=temp]').val());
        var diskon = parseInt($('input[name=diskon]').val());
        var total = temp - (temp * diskon / 100);
        console.log(temp);
        console.log(diskon);
        console.log(total);

        // $('.nilai-total1-td').html('Rp. ' + parseInt(total).toLocaleString());
        $('.nilai-total1-td').html('Rp. ' + parseInt(total).toLocaleString());
        $('.temp').val(total);
        $('.nilai-total2-td').val(total);
    }

    function ppn() {
        var temp = parseInt($('input[name=temp]').val());
        var ppn = parseInt($('input[name=ppn]').val());
        var totalppn = temp + (temp * ppn / 100);
        console.log(temp);
        console.log(ppn);
        console.log(totalppn);
        $('.nilai-total1-td').html('Rp. ' + parseInt(totalppn).toLocaleString());
        $('.temp').val(totalppn);
        $('.nilai-total2-td').val(totalppn);
    }

    function validasi_bayar(nominal_bayar) {
        console.log(nominal_bayar);
        var total = $('.temp').val();
        console.log(total);
        if (nominal_bayar >= parseInt(total)) {
            console.log('boleh bayar')
            $('#validasibayar').show();
        } else {
            console.log('gaboleh')
            $('#validasibayar').hide();
        }
    }

    $(document).on('click', '#validasibayar', function (e) {
        var total = $('.temp').val();
        $('#totalModal').html('Rp. ' + parseInt(total).toLocaleString());
        var bayar = $('#nominalBayar').val();
        $('#bayarModal').html('Rp. ' + parseInt(bayar).toLocaleString());
        var kembali = parseInt(bayar) - parseInt(total);
        $('#kembaliModal').html('Rp. ' + parseInt(kembali).toLocaleString());
    });

    $(document).on('click', '.ubah-diskon-td', function (e) {
        e.preventDefault();
        $('.diskon-input').prop('hidden', false);
        $('.nilai-diskon-td').prop('hidden', true);
        $('.simpan-diskon-td').prop('hidden', false);
        $(this).prop('hidden', true);
    });

    $(document).on('click', '.simpan-diskon-td', function (e) {
        e.preventDefault();
        $('.diskon-input').prop('hidden', true);
        $('.nilai-diskon-td').prop('hidden', false);
        $('.ubah-diskon-td').prop('hidden', false);
        $(this).prop('hidden', true);
        diskon();
    });

    $(document).on('input', '.diskon-input', function () {
        $('.nilai-diskon-td').html($(this).val());
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
        } else {
            $(this).addClass('is-invalid');
        }
    });


    $(document).on('click', '.ubah-ppn-td', function (e) {
        e.preventDefault();
        $('.ppn-input').prop('hidden', false);
        $('.nilai-ppn-td').prop('hidden', true);
        $('.simpan-ppn-td').prop('hidden', false);
        $(this).prop('hidden', true);
    });

    $(document).on('click', '.simpan-ppn-td', function (e) {
        e.preventDefault();
        $('.ppn-input').prop('hidden', true);
        $('.nilai-ppn-td').prop('hidden', false);
        $('.ubah-ppn-td').prop('hidden', false);
        $(this).prop('hidden', true);
        ppn();
    });

    $(document).on('input', '.ppn-input', function () {
        $('.nilai-ppn-td').html($(this).val());
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
        } else {
            $(this).addClass('is-invalid');
        }
    });

    $(document).on('input', '.bayar-input', function () {
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
            $('.nominal-error').prop('hidden', true);
        } else {
            $(this).addClass('is-invalid');
        }
    });

    $(document).on('click', '.btn-bayar', function () {
        var total = parseInt($('.nilai-total2-td').val());
        var bayar = parseInt($('.bayar-input').val());
        if (bayar >= total) {
            $('.nominal-error').prop('hidden', true);
        } else {
            if (isNaN(bayar)) {
                $('.bayar-input').valid();
            } else {
                $('.nominal-error').prop('hidden', false);
            }
        }
    });

</script>

@endsection
