<div id="page-content">
    <div class="row">
        <div class="col-md-3">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addLokasi">
                    Tambah Data Lokasi
                </button>
                <!-- Example Content -->
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daerah_tbody">
                        <?php $no = 1;
                        foreach ($data_lokasi as $i => $val) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $val['nm_daerah']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('Lokasi/hapus_lokasi') . '/' . $val['id_daerah']; ?>"><button type="button" class="btn btn-danger"><i class="hi hi-trash"></i></button></a>
                                    <!-- <button type="button" class="btn btn-danger">X</button> -->
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- modal add -->
    <div class="modal fade" id="addLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="<?= base_url('Lokasi'); ?>/add_lokasi" method="post" enctype="multipart/form-data">
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="nama_lokasi">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="nama_lokasi" name="nama_lokasi" class="form-control validate">
                                <input type="hidden" id="is_active" name="is_active" value="0">
                            </div>
                        </div>
                        <!-- <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="bobot_lokasi">Bobot</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="bobot_lokasi" name="bobot_lokasi" class="form-control validate">
                            </div>
                        </div> -->
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</div>