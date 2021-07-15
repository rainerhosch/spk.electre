<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Lokasi.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 16/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lokasi', 'lokasi');
    }

    public function index()
    {
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Daerah';
        $data['content'] = 'pages/v_lokasi';
        $data['data_lokasi'] = $this->lokasi->get_data_lokasi()->result_array();
        $this->load->view('template', $data);
    }

    public function add_lokasi()
    {
        $data = [
            'nm_daerah' => $this->input->post('nama_lokasi'),
            // 'bobot_lokasi' => $this->input->post('bobot_lokasi'),
        ];
        $insert = $this->lokasi->tambah_lokasi($data);
        if (!$insert) {
            // error
        } else {
            // sukses
            redirect('Lokasi');
        }
    }

    public function hapus_lokasi($id_lokasi)
    {
        // code here...
        $data = ['id_daerah' => $id_lokasi];
        $delete = $this->lokasi->hapus_lokasi($data);
        if (!$delete) {
            // error
        } else {
            // success
            redirect('Lokasi');
        }
    }
}
