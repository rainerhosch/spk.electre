<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Home.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : dd/mm/yyyy
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kriteria', 'kriteria');
		$this->load->model('M_alternatif', 'alternatif');
		$this->load->model('M_lokasi', 'lokasi');
	}

	public function index()
	{
		$data['title'] = 'SPK ELECTRE';
		$data['page'] = 'Dashboard';
		$data['content'] = 'pages/v_dashboard';

		$data['data_lokasi'] = $this->lokasi->get_data_lokasi()->result_array();
		$data['data_alternatif'] = $this->alternatif->get_data()->result_array();
		$data['data_kriteria'] = $this->kriteria->get_data_kriteria()->result_array();
		$this->load->view('template', $data);
	}
}
