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

    public function get_kriteria_detail($id_kriteria)
    {
        // code here...
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Detail Kriteria';
        $data['content'] = 'pages/v_kriteria_detail';
        $this->load->view('template', $data);
    }

    public function add_kriteria()
    {
        $dataKriteria = [
            'kd_kriteria' => $this->input->post('kode_kriteria'),
            'nm_kriteria' => $this->input->post('nama_kriteria'),
        ];
        $jml_input = count($this->input->post('nama_kriteria_detail'));
        $kDetail = $this->input->post('nama_kriteria_detail');
        $kDetailBobot = $this->input->post('bobot');


        $insertKriteria = $this->kriteria->tambah_kriteria($dataKriteria);
        $id_kriteria = $insertKriteria;

        for ($i = 0; $i < $jml_input; $i++) {
            $dataKriteriaDetail = [
                'id_kriteria' => $id_kriteria,
                'nm_detail_kriteria' => $kDetail[$i],
                'nilai' => $kDetailBobot[$i]
            ];
            $this->kriteria->tambah_kriteria_detail($dataKriteriaDetail);
        }
        redirect('Kriteria');
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
