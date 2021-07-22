<div id="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><?= $page; ?></h2>
                </div>
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addSubKriteria">
                    Add Sub Kriteria
                </button>
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Kode Kriteria</th>
                            <th class="text-center">Sub Kriteria</th>
                            <th class="text-center">Nilai / Bobot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="subkriteria_tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal add sub kriteria -->
    <div class="modal fade" id="addSubKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Tambah Sub Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Kriteria'); ?>/add_sub_kriteria" method="post" enctype="multipart/form-data">
                        <div class="md-form mb-5 row">
                            <div class="col-md-3">
                                <label data-error="wrong" data-success="right" for="kriteria">Kriteria</label>
                            </div>
                            <div class="col-md-9">
                                <select id="id_kriteria" name="id_kriteria" class="select-select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <!-- <option value="x">-- Pilih Kriteria --</option> -->
                                    <?php foreach ($data_kriteria as $i => $val) : ?>
                                        <option value="<?= $val['id_kriteria']; ?>"><?= $val['nm_kriteria']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <h5>Sub Kriteria</h5>
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
                url: "get_subkriteria",
                serverside: true,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    let html = ``;
                    $.each(response, function(i, val) {
                        html += `<tr class="text-center">`;
                        html += `<td class="text-center">${val.kd_kriteria}</td>`;
                        html += `<td class="text-center">${val.nm_detail_kriteria}</td>`;
                        html += `<td class="text-center">${val.nilai}</td>`;
                        html += `<td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a edit-id="${val.id_detail_kriteria}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default btn_edit_skr" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a delete-id="${val.id_detail_kriteria}" href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-danger btn_delete_skr" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>`;
                        html += `</tr>`;
                    });
                    $("#subkriteria_tbody").html(html);
                    // edit function
                    $('.btn_edit_skr').click(function() {
                        let edit_id = $(this).attr("edit-id");
                        console.log(edit_id);
                    });

                    // delete function
                    $('.btn_delete_skr').click(function() {
                        let delete_id = $(this).attr("delete-id");
                        // $.ajax({
                        //     type: "POST",
                        //     url: "kriteria/hapus_subkriteria",
                        //     data: {
                        //         id_kriteria: delete_id
                        //     },
                        //     serverside: true,
                        //     dataType: "json",
                        //     success: function(response) {}
                        // });
                        console.log(delete_id);
                    });
                }
            });

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
                    tds += '<td width="20%" class="text-center"><input type="text" id="bobot_' + inputArray + '" name="bobot_sub[' + inputArray + ']" class="form-control validate" placeholder="Bobot"></td>';
                    tds += '</tr>';
                    // console.log(size);
                    if ($('tbody', this).length > 0) {
                        // console.log(1);
                        $('tbody', this).append(tds);
                    } else {
                        // console.log(2);
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
        });
    </script>
</div>