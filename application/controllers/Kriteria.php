<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Kriteria.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 14/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria', 'kriteria');
    }

    public function index()
    {
        // code here...
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Kriteria';
        $data['content'] = 'pages/v_kriteria';

        $data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
        $this->load->view('template', $data);
    }

    public function kriteria_detail()
    {
        // code here...
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Detail Kriteria';
        $data['content'] = 'pages/v_kriteria_detail';
        $this->load->view('template', $data);
    }

    public function add_kriteria()
    {
        $data = [
            'kd_kriteria' => $this->input->post('kode_kriteria'),
            'nm_kriteria' => $this->input->post('nama_kriteria'),
            // 'bobot_kriteria' => $this->input->post('bobot_kriteria'),
        ];
        $insert = $this->kriteria->tambah_kriteria($data);
        if (!$insert) {
            // error
        } else {
            // sukses
            redirect('Kriteria');
        }
    }

    public function hapus_kriteria($id_kriteria)
    {
        // code here...
        $data = ['id_kriteria' => $id_kriteria];
        $delete = $this->kriteria->hapus_kriteria($data);
        if (!$delete) {
            // error
        } else {
            // success
            redirect('Kriteria');
        }
    }
}
