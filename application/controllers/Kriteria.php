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

    public function get_max_kode()
    {
        $data = [];
        if ($this->input->is_ajax_request()) {
            $response = $this->kriteria->get_max_kode()->row_array();
            if ($response['kd_kriteria'] != null) {
                $kode_max = str_split($response['kd_kriteria']);
                $new_kode = $kode_max[1];
            } else {
                $new_kode = 0;
            }
            $data = [
                'status' => 200,
                'data' => $new_kode + 1
            ];
        } else {
            // errr
            $data = [
                'status' => 404,
                'data' => null
            ];
        }
        echo json_encode($data);
    }

    public function add_kriteria()
    {
        $jml_input = count($this->input->post('kode_kriteria'));
        $dataKode = $this->input->post('kode_kriteria');
        $dataNama = $this->input->post('nama_kriteria');
        $dataBobot = $this->input->post('bobot_w');
        for ($i = 0; $i < $jml_input; $i++) {
            $dataKriteria = [
                'kd_kriteria' => $dataKode[$i],
                'nm_kriteria' => $dataNama[$i],
                'bobot_kr' => $dataBobot[$i],
            ];
            $insertKriteria = $this->kriteria->tambah_kriteria($dataKriteria);
        }
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
            $this->kriteria->hapus_kriteria($data);
        }
    }


    //=============================== sub kriteria ===============================
    public function penilaian()
    {
        // code here...
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Nilai';
        $data['content'] = 'pages/v_nilai_tingkat_kepentingan';

        $data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
        $this->load->view('template', $data);
    }

    public function get_penilaian()
    {
        if ($this->input->is_ajax_request()) {
            $id_kriteria = $this->input->post('id_kriteria');
            if ($id_kriteria != null) {
                $kondisi = ['skr.id_kriteria' => $id_kriteria];
                $response = $this->kriteria->get_data_penilaian($kondisi)->result_array();
                if (count($response) > 0) {
                    $data = [
                        'status' => false,
                        'msg' => 'Terdapat data sub kriteria, silahkan hapus data sub kriteria dahulu!'
                    ];
                } else {
                    $data = [
                        'status' => true,
                        'msg' => 'Berhasil Terhapus!'
                    ];
                    $this->hapus_kriteria($id_kriteria);
                }
            } else {
                $data = $this->kriteria->get_data_penilaian()->result_array();
            }
        } else {
            // errr
            $data = false;
        }
        echo json_encode($data);
    }

    public function add_data_penilaian()
    {
        // var_dump($this->input->post());
        // die;
        // $id_kriteria = $this->input->post('id_kriteria');

        $jml_input = count($this->input->post('nama_penilaian'));
        $nmPenilaian = $this->input->post('nama_penilaian');
        $bobotPenilaian = $this->input->post('bobot_sub');

        for ($i = 0; $i < $jml_input; $i++) {
            $dataPenilaian = [
                'nm_penilaian' => $nmPenilaian[$i],
                'bobot_penilaian' => $bobotPenilaian[$i]
            ];
            $this->kriteria->tambah_penilaian($dataPenilaian);
        }
        if (!$insertKriteria) {
            // error
            redirect('Kriteria/penilaian');
        } else {
            // success
            redirect('Kriteria/penilaian');
        }
    }
}
