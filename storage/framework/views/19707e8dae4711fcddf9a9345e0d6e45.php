<?php if($relasi): ?>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="relasi">Relasi</label>
            <input autocomplete="off" type="text" name="relasi" id="relasi" class="form-control form-control-sm">
            <small class="text-danger" id="msg_relasi"></small>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input autocomplete="off" type="text" name="keterangan" id="keterangan"
                class="form-control form-control-sm" value="<?php echo e($keterangan_transaksi); ?>">
            <small class="text-danger" id="msg_keterangan"></small>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="nominal">Nominal Rp.</label>
            <input autocomplete="off" type="text" name="nominal" id="nominal" class="form-control form-control-sm">
            <small class="text-danger" id="msg_nominal"></small>
        </div>
    </div>
<?php else: ?>
    <input type="hidden" name="relasi" id="relasi" value="">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input autocomplete="off" type="text" name="keterangan" id="keterangan"
                class="form-control form-control-sm" value="<?php echo e($keterangan_transaksi); ?>">
            <small class="text-danger" id="msg_keterangan"></small>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="nominal">Nominal Rp.</label>
            <input autocomplete="off" type="text" name="nominal" id="nominal" class="form-control form-control-sm"
                value="<?php echo e(number_format($susut, 2)); ?>">
            <small class="text-danger" id="msg_nominal"></small>
        </div>
    </div>
<?php endif; ?>

<script>
    $("#nominal").maskMoney({
        allowNegative: true
    });
</script>
<?php /**PATH C:\laragon\www\demo\resources\views/transaksi/jurnal_umum/partials/form_nominal.blade.php ENDPATH**/ ?>