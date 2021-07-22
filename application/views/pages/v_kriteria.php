<div id="page-content">
    <div class="row">
        <!-- kriteria -->
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addKriteriaDetail">
                    Add Kriteria
                </button>
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Nilai / Bobot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kriteria_tbody">
                    </tbody>
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

    <!-- modal add kriteria -->
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
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="bobot_kriteria">Bobot</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="bobot_kriteria" name="bobot_kriteria" class="form-control validate" placeholder="Bobot Kriteria">
                            </div>
                        </div>
                        <!-- <hr> -->
                        <!-- <h5>Kriteria Details</h5>
                        <table id="table_kriteria_detail">
                            <tbody id="kriteria_detail_tbody">
                            </tbody>
                        </table> -->
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <!-- <div class="col-sm-9 text-left">
                        <button type="button" id="add_rows" class="btn btn-success text-left div_btn_row"><i class="gi gi-plus"></i></button>
                        <button type="button" id="delete_rows" class="btn btn-danger div_btn_row" disabled><i class="hi hi-minus"></i></button>
                    </div> -->
                    <div class="col-sm-12 text-right">
                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "kriteria/get_kriteria",
                serverside: true,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    let html = ``;
                    $.each(response, function(i, val) {
                        html += `<tr class="text-center">`;
                        html += `<td class="text-center">${val.kd_kriteria}</td>`;
                        html += `<td class="text-center">${val.nm_kriteria}</td>`;
                        html += `<td class="text-center">${val.bobot_kr}</td>`;
                        html += `<td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a edit-id="${val.id_kriteria}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default btn_edit_kr" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a delete-id="${val.id_kriteria}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-danger btn_delete_kr" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>`;
                        html += `</tr>`;
                    });
                    $("#kriteria_tbody").html(html);

                    // edit function
                    $('.btn_edit_kr').click(function() {
                        let edit_id = $(this).attr("edit-id");
                        // console.log(edit_id);
                    });

                    // delete function
                    $('.btn_delete_kr').click(function() {
                        let delete_id = $(this).attr("delete-id");
                        $.ajax({
                            type: "POST",
                            url: "kriteria/get_subkriteria",
                            data: {
                                id_kriteria: delete_id
                            },
                            serverside: true,
                            dataType: "json",
                            success: function(response) {
                                console.log(response);
                                if (response.status != true) {
                                    alert(response.msg);
                                } else {
                                    alert(response.msg);
                                }
                            }
                        });
                        // $.ajax({
                        //     type: "POST",
                        //     url: "kriteria/hapus_kriteria",
                        //     data: {
                        //         id_kriteria: delete_id
                        //     },
                        //     serverside: true,
                        //     dataType: "json",
                        //     success: function(response) {}
                        // });
                        // console.log(delete_id);
                    });
                }
            });
        });
    </script>

</div>
<!-- END Page Content -->