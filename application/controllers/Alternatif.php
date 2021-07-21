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
        $this->load->model('M_kriteria', 'kriteria');
    }

    public function index()
    {
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Alternatif';
        $data['content'] = 'pages/v_alternatif';

        $data['data_lokasi'] = $this->lokasi->get_data_lokasi()->result_array();
        $data['data_alternatif'] = $this->alternatif->get_data()->result_array();
        $data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
        $this->load->view('template', $data);
    }

    public function add_alternatif()
    {
        // var_dump($this->input->post());
        // die;
        $data = [
            'kd_daerah' => $this->input->post('lokasi'),
            'kd_alternatif' => $this->input->post('kd_alternatif'),
            'nm_alternatif' => $this->input->post('nama_alternatif'),
            'C1' => $this->input->post('C1'),
            'C2' => $this->input->post('C2'),
            'C3' => $this->input->post('C3'),
            'C4' => $this->input->post('C4'),
            'C5' => $this->input->post('C5')
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

    public function get_data_alternatif_perlokasi()
    {
        if ($this->input->is_ajax_request()) {
            $id_lokasi =  $this->input->post('lokasi');
            $response = $this->alternatif->get_data(['a.kd_daerah' => $id_lokasi])->result_array();
            if (count($response) <= 0) {
                $data = null;
            } else {
                $data = $response;
            }
        } else {
            $data = false;
        }
        echo json_encode($data);
    }
}
