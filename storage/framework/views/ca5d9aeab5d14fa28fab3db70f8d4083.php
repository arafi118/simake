<form action="/pengaturan/pengelola/<?php echo e($kec->id); ?>" method="post" id="FormPengelola">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="sebutan_pengawas">Sebutan Pengawas</label>
                <input autocomplete="off" type="text" name="sebutan_pengawas" id="sebutan_pengawas"
                    class="form-control form-control-sm" value="<?php echo e($kec->nama_bp_long); ?>">
                <small class="text-danger" id="msg_sebutan_pengawas"></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sebutan_verifikator">Sebutan Verifikator</label>
                <input autocomplete="off" type="text" name="sebutan_verifikator" id="sebutan_verifikator"
                    class="form-control form-control-sm" value="<?php echo e($kec->nama_tv_long); ?>">
                <small class="text-danger" id="msg_sebutan_verifikator"></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kepala_lembaga">Sebutan Kepala Lembaga</label>
                <input autocomplete="off" type="text" name="kepala_lembaga" id="kepala_lembaga"
                    class="form-control form-control-sm" value="<?php echo e($kec->sebutan_level_1); ?>">
                <small class="text-danger" id="msg_kepala_lembaga"></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kabag_administrasi">Sebutan Kabag Administrasi</label>
                <input autocomplete="off" type="text" name="kabag_administrasi" id="kabag_administrasi"
                    class="form-control form-control-sm" value="<?php echo e($kec->sebutan_level_2); ?>">
                <small class="text-danger" id="msg_kabag_administrasi"></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kabag_keuangan">Sebutan Kabag Keuangan</label>
                <input autocomplete="off" type="text" name="kabag_keuangan" id="kabag_keuangan"
                    class="form-control form-control-sm" value="<?php echo e($kec->sebutan_level_3); ?>">
                <small class="text-danger" id="msg_kabag_keuangan"></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bkk_bkm">BKK/BKM</label>
                <input autocomplete="off" type="text" name="bkk_bkm" id="bkk_bkm"
                    class="form-control form-control-sm" value="<?php echo e($kec->disiapkan); ?>">
                <small class="text-danger" id="msg_bkk_bkm"></small>
            </div>
        </div>
    </div>
</form>

<div class="d-flex justify-content-end">
    <button type="button" id="SimpanPengelola" data-target="#FormPengelola"
        class="btn btn-sm btn-warning mb-0 btn-simpan">
        Simpan Perubahan
    </button>
</div>
<?php /**PATH C:\laragon\www\demo\resources\views/sop/partials/_pengelola.blade.php ENDPATH**/ ?>