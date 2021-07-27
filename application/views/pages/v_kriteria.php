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
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Bobot (W)</th>
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
                        <!-- <div class="md-form mb-5 row">
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
                        </div> -->
                        <!-- <hr> -->
                        <!-- <h5>Kriteria Details</h5> -->
                        <table id="table_kriteria_form">
                            <tbody id="kriteria_form_tbody">
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
                                // console.log(response);
                                if (response.status != true) {
                                    alert(response.msg);
                                } else {
                                    alert(response.msg);
                                    location.reload();
                                }
                            }
                        });
                    });
                }
            });


            $("#add_rows").click(function() {
                $(".btn#simpan").prop("disabled", false);
                $.ajax({
                    type: "POST",
                    url: "kriteria/get_max_kode",
                    serverside: true,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.data);
                        $("#table_kriteria_form").each(function() {
                            $(".btn#delete_rows").prop("disabled", false);
                            // $(".btn#simpan").prop("disabled", false);
                            inputArray = jQuery('#table_kriteria_form >tbody >tr').length;
                            let kode_auto = response.data + inputArray;
                            let tds = '<tr>';
                            size = jQuery('#table_kriteria_form >tbody >tr').length + 1,
                                tds += '<td width="10%">';
                            tds += `<input type="text" id="kd_kriteria_${inputArray}" name="kd_kriteria[${inputArray}]" class="form-control validate text-center" value="C${kode_auto}" disabled>`;
                            tds += `<input type="hidden" id="kode_kriteria_${inputArray}" name="kode_kriteria[${inputArray}]" class="form-control validate text-center" value="C${kode_auto}">`;
                            tds += '</td>';
                            tds += '<td width="50%">';
                            tds += '<input type="text" id="nama_kriteria_' + inputArray + '" name="nama_kriteria[' + inputArray + ']" class="form-control validate" placeholder="Nama Kriteria">';
                            tds += '</td>';
                            tds += '<td width="20%" class="text-center"><input type="text" id="bobot_' + inputArray + '" name="bobot_w[' + inputArray + ']" class="form-control validate" placeholder="Bobot (W)"></td>';
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

                    }
                });
            });
            $('#delete_rows').on("click", function() {
                let jml_trx = size;
                let last = $('#table_kriteria_form').find('tr:last');
                if (last.is(':first-child')) {
                    alert('Harus ada setidaknya satu data');
                    $(".btn#delete_rows").prop("disabled", true);
                } else {
                    last.remove()
                }
            });
        });
    </script>

</div>
<!-- END Page Content -->