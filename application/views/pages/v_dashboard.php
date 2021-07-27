<div id="page-content">
    <?php $this->load->view('layout/stat_row') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2>Data nilai (Matriks X)</h2>
                </div>
                <div class="row mb-3" style="margin-bottom: 5px;">
                    <div class="col-md-4">
                        <div class="col-md-3">
                            <label data-error="wrong" data-success="right" for="lokasi">Lokasi</label>
                        </div>
                        <div class="col-md-9">
                            <select id="pilih_lokasi" name="pilih_lokasi" class="select-select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="x">-- Pilih Lokasi --</option>
                                <?php foreach ($data_lokasi as $value) : ?>
                                    <option value="<?= $value['id_daerah']; ?>"><?= $value['nm_daerah']; ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-8 text-right">
                        <button type="button" class="btn btn-primary" id="btnHitung" style="margin-bottom: 5px;" data-toggle="modal" data-target="#addAlternatif" disabled>
                            Hitung
                        </button>
                    </div> -->
                </div>
                <!-- Example Content -->
                <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <!-- <th class="text-center">#</th> -->
                            <!-- <th class="text-center">Lokasi</th> -->
                            <!-- <th class="text-center">Kode</th> -->
                            <th class="text-center">Alternatif</th>
                            <?php foreach ($data_kriteria as $i => $val) : ?>
                                <th class="text-center"><?= $val['kd_kriteria']; ?></th>
                            <?php endforeach; ?>
                            <!-- <th class="text-center">C1</th>
                            <th class="text-center">C2</th>
                            <th class="text-center">C3</th>
                            <th class="text-center">C4</th>
                            <th class="text-center">C5</th> -->
                            <!-- <th class="text-center">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody id="alternatif_tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <!-- Matriks X -->
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                    </div>
                    <h2><strong>Matriks R</strong> (Normalisasi)</h2>
                </div>
                <div class="block-content">
                    <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                        <caption>
                            Poster availability
                        </caption>
                        <col>
                        <col>
                        <colgroup span="3"></colgroup>
                        <thead>
                            <tr>
                                <th scope="col">Poster name</th>
                                <th scope="col">Color</th>
                                <th colspan="3" scope="colgroup">Sizes available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="3" scope="rowgroup">Zodiac</th>
                                <th scope="row">Full color</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A2</td>
                                <td>A3</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A3</td>
                                <td>A4</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="2" scope="rowgroup">Angels</th>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted">You can also have content that ignores toggling..</p>
            </div>
        </div>

        <!-- Matriks R -->
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                    </div>
                    <h2><strong>Matriks V</strong> (Normalisasi Terbobot)</h2>
                </div>
                <div class="block-content">
                    <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                        <caption>
                            Poster availability
                        </caption>
                        <col>
                        <col>
                        <colgroup span="3"></colgroup>
                        <thead>
                            <tr>
                                <th scope="col">Poster name</th>
                                <th scope="col">Color</th>
                                <th colspan="3" scope="colgroup">Sizes available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="3" scope="rowgroup">Zodiac</th>
                                <th scope="row">Full color</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A2</td>
                                <td>A3</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A3</td>
                                <td>A4</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="2" scope="rowgroup">Angels</th>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted">You can also have content that ignores toggling..</p>
            </div>
        </div>

        <!-- Matrix V -->
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                    </div>
                    <h2><strong>Matriks V</strong> (Normalisasi Terbobot)</h2>
                </div>
                <div class="block-content">
                    <table id="menu-datatable" class="table table-vcenter table-condensed table-bordered">
                        <caption>
                            Poster availability
                        </caption>
                        <col>
                        <col>
                        <colgroup span="3"></colgroup>
                        <thead>
                            <tr>
                                <th scope="col">Poster name</th>
                                <th scope="col">Color</th>
                                <th colspan="3" scope="colgroup">Sizes available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="3" scope="rowgroup">Zodiac</th>
                                <th scope="row">Full color</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A2</td>
                                <td>A3</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A3</td>
                                <td>A4</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="text-centeer">
                                <th rowspan="2" scope="rowgroup">Angels</th>
                                <th scope="row">Black and white</th>
                                <td>A1</td>
                                <td>A3</td>
                                <td>A4</td>
                            </tr>
                            <tr>
                                <th scope="row">Sepia</th>
                                <td>A2</td>
                                <td>A3</td>
                                <td>A5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted">You can also have content that ignores toggling..</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#pilih_lokasi').on('change', function() {
                let lokasi = this.value;
                $.ajax({
                    type: "POST",
                    url: "alternatif/get_data_alternatif_perlokasi",
                    data: {
                        lokasi: lokasi,
                    },
                    serverside: true,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let html = ``;
                        let no = 1;
                        $.each(response, function(i, value) {
                            html += `<tr>`;
                            // html += `<td class="text-center">${no}</td>`;
                            // html += `<td class="text-center">${value.nm_daerah}</td>`;
                            // html += `<td class="text-center">${value.kd_alternatif}</td>`;
                            html += `<td class="text-center">${value.nm_alternatif}</td>`;
                            html += `<td class="text-center">${value.C1}</td>`;
                            html += `<td class="text-center">${value.C2}</td>`;
                            html += `<td class="text-center">${value.C3}</td>`;
                            html += `<td class="text-center">${value.C4}</td>`;
                            html += `<td class="text-center">${value.C5}</td>`;
                            html += `</tr>`;
                            no++;
                        });
                        $("#alternatif_tbody").html(html);
                        $(".btn#btnHitung").prop("disabled", false);
                        $('.btn#btnHitung').on('click', function() {
                            // console.log(123)
                        });
                    }
                });
            });
        });
    </script>

</div>