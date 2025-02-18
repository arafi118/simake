@extends('layouts.base')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <form action="" method="post" id="FormTahunTutupBuku">
                @csrf

                <input type="hidden" name="tgl_pakai" id="tgl_pakai" value="{{ $usaha->tgl_pakai }}">
                <div class="w-100">
                    <div class="my-2">
                        <label class="form-label" for="tahun_tutup_buku">Tahun</label>
                        <select class="form-control select2" name="tahun_tutup_buku" id="tahun_tutup_buku">
                            @php
                                $tgl_pakai = $usaha->tgl_pakai;
                                $th_pakai = explode('-', $tgl_pakai)[0];
                            @endphp
                            @for ($i = date('Y'); $i >= $th_pakai; $i--)
                                <option {{ $i == date('Y') ? 'selected' : '' }} value="{{ $i }}">
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                        <small class="text-danger" id="msg_tahun_tutup_buku"></small>
                    </div>

                    <input type="hidden" name="pembagian_laba" id="pembagian_laba" value="true">
                </div>
            </form>

            <div class="d-flex justify-content-end">
                <button type="button" id="TutupBuku" {{ date('m') <= 10 ? 'disabled' : '' }}
                    class="btn btn-sm btn-primary mb-0 ml-2">1. Tutup Buku</button>
                <button type="button" id="PembagianLaba" class="btn btn-sm btn-info mb-0 ml-2">
                    2. Simpan Alokasi Laba
                </button>
            </div>
        </div>
    </div>

    <div id="LayoutPreview">
        <div class="card">
            <div class="card-body p-3">
                <div class="p-5"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var tahun = "{{ date('Y') }}"
        var bulan = "{{ date('m') }}"

        $(document).on('change', 'select#tahun_tutup_buku', function(e) {
            e.preventDefault()

            var tahun_val = $(this).val()
            if ((tahun == tahun_val && bulan <= 10)) {
                $('#TutupBuku').prop("disabled", true)
            } else {
                $('#TutupBuku').prop("disabled", false)
            }
        })

        $(document).on('click', '#TutupBuku', function(e) {
            e.preventDefault()
            $('#FormTahunTutupBuku').attr('action', '/transaksi/tutup_buku/saldo')
            $('#LayoutPreview').html(
                '<div class="card"><div class="card-body p-3"><div class="p-5"></div></div></div>')

            var form = $('#FormTahunTutupBuku')
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(result) {
                    if (result.success) {
                        $('#LayoutPreview').html(result.view)
                    }
                }
            })
        })

        let childWindow;
        $(document).on('click', '#SimpanSaldo', function(e) {
            e.preventDefault()

            childWindow = window.open('/simpan_saldo?bulan=00&tahun=' + tahun, '_blank');
        })

        window.addEventListener('message', function(event) {
            if (event.data === 'closed') {
                $('#FormTahunTutupBuku').attr('action', '/transaksi/tutup_buku/saldo')
                $('#LayoutPreview').html(
                    '<div class="card"><div class="card-body p-3"><div class="p-5"></div></div></div>')

                var form = $('#FormTahunTutupBuku')
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(result) {
                        if (result.success) {
                            $('#LayoutPreview').html(result.view)
                        }
                    }
                })
            }
        })

        $(document).on('click', '#PembagianLaba', function(e) {
            e.preventDefault()
            $('#FormTahunTutupBuku').attr('action', '/transaksi/tutup_buku')

            $('#FormTahunTutupBuku').submit()
        })
    </script>

    @if (Session::get('success'))
        <script>
            Swal.fire('Selamat', "{{ Session::get('success') }}", 'success')
        </script>
    @endif
@endsection
