<div id="page-content">
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addKriteria">
                    Add Kriteria
                </button>
                <!-- Example Content -->
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="ktiteria_tbody">
                        <?php $no = 1;
                        foreach ($data_kriteria as $i => $val) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $val['kd_kriteria']; ?></td>
                                <td class="text-center"><?= $val['nm_kriteria']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning">O</button>

                                    <a href="<?= base_url('Kriteria/hapus_kriteria') . '/' . $val['id_kriteria']; ?>"><button type="button" class="btn btn-danger">X</button></a>
                                    <!-- <button type="button" class="btn btn-danger">X</button> -->
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- detail kriteria -->
        <div class="col-md-6">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addKriteriaDetail">
                    Add Kriteria Detail
                </button>
                <!-- Example Content -->
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <!-- <col>
                    <col>
                    <col>
                    <colgroup span="3"></colgroup> -->
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th>
                            <th scope="col">Kode</th> -->
                            <th class="text-center" scope="col">Kriteria</th>
                            <th class="text-center" scope="col">Kriteria Detail</th>
                            <th class="text-center" colspan="3" scope="colgroup">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th class="text-center" rowspan="3" scope="rowgroup">Kondisi Rumah</th>
                            <th class="text-center" scope="row">Utuh</th>
                            <td>A2</td>
                            <td>A3</td>
                            <td>A4</td>
                        </tr>
                        <tr class="text-center">
                            <th class="text-center" scope="row">Beberapa bagian rusak</th>
                            <td>A1</td>
                            <td>A2</td>
                            <td>A3</td>
                        </tr>
                        <tr class="text-center">
                            <th class="text-center" scope="row">Hancur</th>
                            <td>A3</td>
                            <td>A4</td>
                            <td>A5</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-center">
                            <th class="text-center" rowspan="3" scope="rowgroup">Kondisi Materil</th>
                            <th class="text-center" scope="row">Utuh</th>
                            <td>A1</td>
                            <td>A3</td>
                            <td>A4</td>
                        </tr>
                        <tr class="text-center">
                            <th class="text-center" scope="row">Beberapa masih bisa digunakan</th>
                            <td>A2</td>
                            <td>A3</td>
                            <td>A5</td>
                        </tr>
                        <tr class="text-center">
                            <th class="text-center" scope="row">Hancur</th>
                            <td>A3</td>
                            <td>A4</td>
                            <td>A5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- modal add -->
    <div class="modal fade" id="addKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="<?= base_url('Kriteria'); ?>/add_kriteria" method="post" enctype="multipart/form-data">
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="kode_kriteria">Kode Kriteria</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control validate" placeholder="contoh C1, C2, C3 ...">
                            </div>
                        </div>
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="nama_kriteria">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control validate">
                                <input type="hidden" id="is_active" name="is_active" value="0">
                            </div>
                        </div>
                        <!-- <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="bobot_kriteria">Bobot</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="bobot_kriteria" name="bobot_kriteria" class="form-control validate">
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
<!-- END Page Content -->