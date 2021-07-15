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
    }

    public function index()
    {
        $data['title'] = 'SPK ELECTRE';
        $data['page'] = 'Alternatif';
        $data['content'] = 'pages/v_alternatif';
        $this->load->view('template', $data);
    }
}
