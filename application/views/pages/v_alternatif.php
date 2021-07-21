<div id="page-content">
    <div class="row">
        <div class="col-md-3">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addAlternatif">
                    Tambah Data Alternatif
                </button>
                <!-- Example Content -->
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="alternatif_tbody">
                        <?php $no = 1;
                        foreach ($data_alternatif as $i => $val) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $val['kd_alternatif']; ?></td>
                                <td class="text-center"><?= $val['nm_alternatif']; ?></td>
                                <td class="text-center"><?= $val['nm_daerah']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('Alternatif/hapus_alternatif') . '/' . $val['id_alternatif']; ?>"><button type="button" class="btn btn-danger"><i class="hi hi-trash"></i></button></a>
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
    <div class="modal fade" id="addAlternatif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Data Alternatif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="<?= base_url('Alternatif'); ?>/add_alternatif" method="post" enctype="multipart/form-data">
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="lokasi">Lokasi</label>
                            </div>
                            <div class="col-md-9">
                                <select id="lokasi" name="lokasi" class="select-select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="x">-- Pilih Lokasi --</option>
                                    <?php foreach ($data_lokasi as $value) : ?>
                                        <option value="<?= $value['id_daerah']; ?>"><?= $value['nm_daerah']; ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                        </div>
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="kd_alternatif">Kode</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="kd_alternatif" name="kd_alternatif" class="form-control validate" placeholder="Contoh : A1, A2, A3, dst">
                            </div>
                        </div>
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="nama_alternatif">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="nama_alternatif" name="nama_alternatif" class="form-control validate">
                            </div>
                        </div>
                        <hr>
                        <?php
                        $i = 1;
                        foreach ($data_kriteria as $c) : ?>
                            <div class="md-form mb-5 row">
                                <div class="col-md-3">
                                    <label data-error="wrong" data-success="right" for="nama_alternatif"><?= $c['nm_kriteria']; ?></label>
                                </div>
                                <div class="col-md-9">
                                    <select id='C<?= $i; ?>' name='C<?= $i; ?>' class="select-select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value="x">-- Pilih --</option>
                                        <?php
                                        $id_kriteria = $c['id_kriteria'];
                                        $this->db->select('*');
                                        $this->db->from('tbl_detail_kriteria');
                                        $this->db->where('id_kriteria', $id_kriteria);
                                        $response = $this->db->get()->result_array();
                                        foreach ($response as $v) : ?>
                                            <option value="<?= $v['nilai']; ?>"><?= $v['nm_detail_kriteria']; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach;  ?>
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