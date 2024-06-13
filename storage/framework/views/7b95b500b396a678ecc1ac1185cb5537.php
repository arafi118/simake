<?php
    use App\Utils\Tanggal;

    $kuitansi = false;
    $files = 'bm';
    if (
        $keuangan->startWith($trx->rekening_debit, '1.1.01') &&
        !$keuangan->startWith($trx->rekening_kredit, '1.1.01')
    ) {
        $files = 'bkm';
        $kuitansi = true;
    }
    if (
        !$keuangan->startWith($trx->rekening_debit, '1.1.01') &&
        $keuangan->startWith($trx->rekening_kredit, '1.1.01')
    ) {
        $files = 'bkk';
        $kuitansi = true;
    }
    if ($keuangan->startWith($trx->rekening_debit, '1.1.01') && $keuangan->startWith($trx->rekening_kredit, '1.1.01')) {
        $files = 'bm';
        $kuitansi = false;
    }
    if (
        $keuangan->startWith($trx->rekening_debit, '1.1.02') &&
        !(
            $keuangan->startWith($trx->rekening_kredit, '1.1.01') ||
            $keuangan->startWith($trx->rekening_kredit, '1.1.02')
        )
    ) {
        $files = 'bkm';
        $kuitansi = true;
    }
    if ($keuangan->startWith($trx->rekening_debit, '1.1.02') && $keuangan->startWith($trx->rekening_kredit, '1.1.02')) {
        $files = 'bm';
        $kuitansi = false;
    }
    if ($keuangan->startWith($trx->rekening_debit, '1.1.02') && $keuangan->startWith($trx->rekening_kredit, '1.1.01')) {
        $files = 'bm';
        $kuitansi = false;
    }
    if ($keuangan->startWith($trx->rekening_debit, '1.1.01') && $keuangan->startWith($trx->rekening_kredit, '1.1.02')) {
        $files = 'bm';
        $kuitansi = false;
    }
    if (
        $keuangan->startWith($trx->rekening_debit, '5.') &&
        !(
            $keuangan->startWith($trx->rekening_kredit, '1.1.01') ||
            $keuangan->startWith($trx->rekening_kredit, '1.1.02')
        )
    ) {
        $files = 'bm';
        $kuitansi = false;
    }
    if (
        !(
            $keuangan->startWith($trx->rekening_debit, '1.1.01') || $keuangan->startWith($trx->rekening_debit, '1.1.02')
        ) &&
        $keuangan->startWith($trx->rekening_kredit, '1.1.02')
    ) {
        $files = 'bm';
        $kuitansi = false;
    }
    if (
        !(
            $keuangan->startWith($trx->rekening_debit, '1.1.01') || $keuangan->startWith($trx->rekening_debit, '1.1.02')
        ) &&
        $keuangan->startWith($trx->rekening_kredit, '4.')
    ) {
        $files = 'bm';
        $kuitansi = false;
    }
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h6 class="text-uppercase text-body font-small-1 font-weight-bolder">
                    <?php echo e($trx->keterangan_transaksi); ?>

                </h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <h6 class="mb-0 text-dark font-small-3">
                                    <?php echo e($trx->rek_kredit->kode_akun); ?> - <?php echo e($trx->rek_kredit->nama_akun); ?>

                                </h6>
                                <span class="font-small-1"><?php echo e(Tanggal::tglLatin($trx->tgl_transaksi)); ?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-danger text-gradient font-small-3 font-weight-bold">
                            - Rp. <?php echo e(number_format($trx->jumlah, 2)); ?>

                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <h6 class="mb-0 text-dark font-small-3">
                                    <?php echo e($trx->rek_debit->kode_akun); ?> - <?php echo e($trx->rek_debit->nama_akun); ?>

                                </h6>
                                <span class="font-small-1"><?php echo e(Tanggal::tglLatin($trx->tgl_transaksi)); ?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient font-small-3 font-weight-bold">
                            + Rp. <?php echo e(number_format($trx->jumlah, 2)); ?>

                        </div>
                    </li>
                </ul>

                <div class="d-flex justify-content-end" style="gap: 1rem">
                    <div class="d-flex justify-content-end" style="gap: 1rem">
                        <?php if($kuitansi): ?>
                            <button type="button" data-action="/transaksi/dokumen/kuitansi/<?php echo e($trx->idt); ?>"
                                class="btn btn-sm btn-info btn-link">Kuitansi</button>
                        <?php endif; ?>
                        <button type="button"
                            data-action="/transaksi/dokumen/<?php echo e($files); ?>/<?php echo e($trx->idt); ?>"
                            class="btn btn-sm btn-indo btn-link"><?php echo e($files); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\demo\resources\views/transaksi/jurnal_umum/partials/notifikasi.blade.php ENDPATH**/ ?>