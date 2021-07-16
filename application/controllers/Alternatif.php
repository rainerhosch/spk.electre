<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Alternatif.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 17/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_alternatif', 'alternatif');
        $this->load->model('M_lokasi', 'lokasi');
    }

    public function index()
    {
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Alternatif';
        $data['content'] = 'pages/v_alternatif';

        $data['data_lokasi'] = $this->lokasi->get_data_lokasi()->result_array();
        $data['data_alternatif'] = $this->alternatif->get_data()->result_array();
        $this->load->view('template', $data);
    }

    public function add_alternatif()
    {
        $data = [
            'kd_alternatif' => $this->input->post('kd_alternatif'),
            'nm_alternatif' => $this->input->post('nama_alternatif'),
            'kd_daerah' => $this->input->post('lokasi'),
        ];
        $insert = $this->alternatif->insert_data($data);
        if (!$insert) {
            // error
        } else {
            // sukses
            redirect('Alternatif');
        }
    }

    public function hapus_alternatif($id_alternatif)
    {
        // code here...
        $data = ['id_alternatif' => $id_alternatif];
        $delete = $this->alternatif->hapus_data($data);
        if (!$delete) {
            // error
        } else {
            // success
            redirect('Alternatif');
        }
    }
}
