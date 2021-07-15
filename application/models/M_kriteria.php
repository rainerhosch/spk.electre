<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_kriteria.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 14/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_kriteria extends CI_Model
{
    function tambah_kriteria($data)
    {
        return $this->db->insert('tbl_kriteria', $data);
    }

    function get_data_kriteria($data = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_kriteria');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }

    function get_data_kriteria_detail($data = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_kriteria_detail');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }
}
