<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_alternatif.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 16/17/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_alternatif extends CI_Model
{
    function insert_data($data)
    {
        // code here...
        return $this->db->insert('tbl_alternatif', $data);
    }

    function get_data($data = null)
    {
        // code here...
        $this->db->select('a.id_alternatif, a.kd_alternatif, a.nm_alternatif, d.nm_daerah, a.C1, a.C2, a.C3, a.C4, a.C5');
        $this->db->from('tbl_alternatif a');
        $this->db->join('tbl_daerah d', 'd.id_daerah=a.kd_daerah');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }

    public function hapus_data($data)
    {
        $this->db->where($data);
        $this->db->delete('tbl_alternatif');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
