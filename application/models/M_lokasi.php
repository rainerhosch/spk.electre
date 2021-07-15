<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_lokasi.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 17/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_lokasi extends CI_Model
{
    function get_data_lokasi($data = null)
    {
        // code here...
        $this->db->select('*');
        $this->db->from('tbl_daerah');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }

    function tambah_lokasi($data)
    {
        // code here...
        return $this->db->insert('tbl_daerah', $data);
    }


    public function hapus_lokasi($data)
    {
        $this->db->where($data);
        $this->db->delete('tbl_daerah');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
