<div id="page-content">
    <div class="row">
        <!-- <div class="col-md-6">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addKriteria">
                    Add Kriteria
                </button>
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kriteria_tbody">
                        <?php $no = 1;
                        foreach ($data_kriteria as $i => $val) : ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $val['kd_kriteria']; ?></td>
                                <td class="text-center"><?= $val['nm_kriteria']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning">O</button>

                                    <a href="<?= base_url('Kriteria/hapus_kriteria') . '/' . $val['id_kriteria']; ?>"><button type="button" class="btn btn-danger">X</button></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div> -->


        <!-- detail kriteria -->
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addKriteriaDetail">
                    Add Kriteria
                </button>
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <!-- <col>
                    <col>
                    <col>
                    <colgroup span="3"></colgroup> -->
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <!-- <th scope="col">Kode</th> -->
                            <th class="text-center" scope="col">Kriteria</th>
                            <th class="text-center" scope="col">Sub Kriteria</th>
                            <th class="text-center" colspan="1" scope="colgroup">Nilai / Bobot</th>
                            <th class="text-center" colspan="2" scope="colgroup">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_kriteria as $i => $val) : ?>
                            <!-- <tr> -->
                            <tr class="text-center">
                                <th class="text-center" rowspan="4" scope="rowgroup"><?= $val['nm_kriteria']; ?></th>
                            </tr>
                            <?php
                            $id_kriteria = $val['id_kriteria'];
                            $this->db->select('*');
                            $this->db->from('tbl_detail_kriteria dk');
                            $this->db->join('tbl_kriteria k', 'k.id_kriteria=dk.id_kriteria');
                            $this->db->where('dk.id_kriteria', $id_kriteria);
                            $data_subkriteria = $this->db->get()->result_array();
                            foreach ($data_subkriteria as $dsk) :
                            ?>
                                <tr class="text-center">
                                    <th class="text-center" scope="row"><?= $dsk['nm_detail_kriteria']; ?></th>
                                    <td class="text-center"><?= $dsk['nilai']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Kriteria/hapus_kriteria') . '/' . $dsk['id_kriteria']; ?>"><button type="button" class="btn-sm btn-danger"><i class="hi hi-trash"></i> Hapus Kriteria</button></a> |
                                        <a href="<?= base_url('Kriteria/hapus_detail_kriteria') . '/' . $dsk['id_detail_kriteria']; ?>"><button type="button" class="btn-sm btn-danger"><i class="hi hi-trash"></i> Hapus SubKriteria</button></a>
                                    </td>
                                </tr>
                                <!-- <th class="text-center" scope="row"><?= $dsk['nm_detail_kriteria']; ?></th> -->
                            <?php endforeach; ?>
                            <!-- <td>A2</td> -->

                            <!-- <tr class="text-center">
                                <th class="text-center" scope="row">Hancur</th>
                                <td>A3</td>
                            </tr> -->
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                    <!-- <tbody>
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
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>




    <!-- modal add kriteria -->
    <!-- <div class="modal fade" id="addKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
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
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- modal add kriteria detail -->
    <div class="modal fade" id="addKriteriaDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
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
                                <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control validate" placeholder="Nama Kriteria">
                            </div>
                        </div>
                        <hr>
                        <h5>Kriteria Details</h5>
                        <table id="table_kriteria_detail">
                            <tbody id="kriteria_detail_tbody">
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <div class="col-sm-9 text-left">
                        <button type="button" id="add_rows" class="btn btn-success text-left div_btn_row"><i class="gi gi-plus"></i></button>
                        <button type="button" id="delete_rows" class="btn btn-danger div_btn_row" disabled><i class="hi hi-minus"></i></button>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button type="submit" id="simpan" class="btn btn-primary" disabled>Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#add_rows").click(function() {
            $("#table_kriteria_detail").each(function() {
                $(".btn#delete_rows").prop("disabled", false);
                $(".btn#simpan").prop("disabled", false);
                let tds = '<tr>';
                inputArray = jQuery('#table_kriteria_detail >tbody >tr').length;
                size = jQuery('#table_kriteria_detail >tbody >tr').length + 1,
                    tds += '<td width="60%">';
                tds += '<input type="text" id="nama_kriteria_detail_' + inputArray + '" name="nama_kriteria_detail[' + inputArray + ']" class="form-control validate" placeholder="Nama kriteria detail">';
                tds += '</td>';
                tds += '<td width="20%" class="text-center"><input type="text" id="bobot_' + inputArray + '" name="bobot[' + inputArray + ']" class="form-control validate" placeholder="Bobot"></td>';
                tds += '</tr>';
                // console.log(size);
                if ($('tbody', this).length > 0) {
                    console.log(1);
                    $('tbody', this).append(tds);
                } else {
                    console.log(2);
                    $(this).append(tds);
                }
            });
        });
        $('#delete_rows').on("click", function() {
            let jml_trx = size;
            let last = $('#table_kriteria_detail').find('tr:last');
            if (last.is(':first-child')) {
                alert('Harus ada setidaknya satu transaksi');
                $(".btn#delete_rows").prop("disabled", true);
            } else {
                last.remove()
            }
        });
    </script>

</div>
<!-- END Page Content -->