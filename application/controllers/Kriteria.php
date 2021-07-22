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

        // $data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
        $this->load->view('template', $data);
    }

    public function get_kriteria()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->kriteria->get_data_kriteria()->result_array();
        } else {
            // errr
            $data = false;
        }
        echo json_encode($data);
    }

    public function add_kriteria()
    {
        $dataKriteria = [
            'kd_kriteria' => $this->input->post('kode_kriteria'),
            'nm_kriteria' => $this->input->post('nama_kriteria'),
            'bobot_kr' => $this->input->post('bobot_kriteria'),

        ];
        // $jml_input = count($this->input->post('nama_kriteria_detail'));
        // $kDetail = $this->input->post('nama_kriteria_detail');
        // $kDetailBobot = $this->input->post('bobot');


        $insertKriteria = $this->kriteria->tambah_kriteria($dataKriteria);
        // $id_kriteria = $insertKriteria;

        // for ($i = 0; $i < $jml_input; $i++) {
        //     $dataKriteriaDetail = [
        //         'id_kriteria' => $id_kriteria,
        //         'nm_detail_kriteria' => $kDetail[$i],
        //         'nilai' => $kDetailBobot[$i]
        //     ];
        //     $this->kriteria->tambah_kriteria_detail($dataKriteriaDetail);
        // }
        if (!$insertKriteria) {
            // error
            redirect('Kriteria');
        } else {
            // success
            redirect('Kriteria');
        }
    }

    public function hapus_kriteria()
    {
        // code here...
        if ($this->input->is_ajax_request()) {
            $data = ['id_kriteria' => $this->input->post('id_kriteria')];
            $delete = $this->kriteria->hapus_kriteria($data);
            if (!$delete) {
                // error
                redirect('Kriteria');
            } else {
                // success
                redirect('Kriteria');
            }
        }
    }


    //=============================== sub kriteria ===============================
    public function sub_kriteria()
    {
        // code here...
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Sub Kriteria';
        $data['content'] = 'pages/v_subkriteria';

        $data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
        $this->load->view('template', $data);
    }

    public function get_subkriteria()
    {
        if ($this->input->is_ajax_request()) {
            $id_kriteria = $this->input->post('id_kriteria');
            if ($id_kriteria != null) {
                $kondisi = ['skr.id_kriteria' => $id_kriteria];
                $response = $this->kriteria->get_data_kriteria_detail($kondisi)->result_array();
                if (count($response) > 0) {
                    $data = [
                        'status' => false,
                        'msg' => 'Terdapat data sub kriteria, silahkan hapus data sub kriteria dahulu!'
                    ];
                } else {
                    $data = [
                        'status' => true,
                        'msg' => 'Bisa Dihapus!'
                    ];
                }
            } else {
                $data = $this->kriteria->get_data_kriteria_detail()->result_array();
            }
        } else {
            // errr
            $data = false;
        }
        echo json_encode($data);
    }

    public function add_sub_kriteria()
    {
        // var_dump($this->input->post());
        // die;

        $jml_input = count($this->input->post('nama_kriteria_detail'));
        $id_kriteria = $this->input->post('id_kriteria');
        $kDetail = $this->input->post('nama_kriteria_detail');
        $kDetailBobot = $this->input->post('bobot_sub');

        for ($i = 0; $i < $jml_input; $i++) {
            $dataKriteriaDetail = [
                'id_kriteria' => $id_kriteria,
                'nm_detail_kriteria' => $kDetail[$i],
                'nilai' => $kDetailBobot[$i]
            ];
            $this->kriteria->tambah_kriteria_detail($dataKriteriaDetail);
        }
        if (!$insertKriteria) {
            // error
            redirect('Kriteria/sub_kriteria');
        } else {
            // success
            redirect('Kriteria/sub_kriteria');
        }
    }
}
