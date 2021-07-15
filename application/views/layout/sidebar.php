<!-- Main Sidebar -->
<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <a href="<?= base_url() ?>" class="sidebar-brand">
                <i class="fa fa-xing"></i><span class="sidebar-nav-mini-hide"><strong>SPK</strong> Electre</span>
            </a>
            <ul class="sidebar-nav">
                <li>
                    <a class="<?= $content == 'pages/v_dashboard' ? 'active' : ''; ?>" href="<?= base_url() ?>"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a class="<?= $content == 'pages/v_lokasi' ? 'active' : ''; ?>" href="<?= base_url('Lokasi'); ?>"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Daerah</span></a>
                </li>
                <li>
                    <a class="<?= $content == 'pages/v_alternatif' ? 'active' : ''; ?>" href="<?= base_url('Alternatif'); ?>"><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Alternatif</span></a>
                </li>
                <li>
                    <a class="<?= $content == 'pages/v_kriteria' ? 'active' : ''; ?>" href="<?= base_url('Kriteria'); ?>"><i class="gi gi-table sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Kriteria</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END Main Sidebar -->