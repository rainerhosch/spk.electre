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
        $this->db->insert('tbl_alternatif', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function insert_data_nilai($data)
    {
        return $this->db->insert('tbl_relasi', $data);
    }

    function get_data($data = null)
    {
        // code here...
        $this->db->select('a.id_alternatif, a.kd_alternatif, a.nm_alternatif, d.nm_daerah');
        // $this->db->select('a.id_alternatif, a.kd_alternatif, a.nm_alternatif, d.nm_daerah, k.kd_kriteria, p.bobot_penilaian');
        $this->db->from('tbl_alternatif a');
        $this->db->join('tbl_daerah d', 'd.id_daerah=a.kd_daerah');
        // $this->db->join('tbl_relasi rel', 'rel.id_alternatif=a.id_alternatif');
        // $this->db->join('tbl_kriteria k', 'k.id_kriteria=rel.id_kriteria');
        // $this->db->join('tbl_penilaian p', 'p.id_penilaian=rel.id_penilaian');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }

    public function get_alternatif_perlokasi($data = null)
    {
        // code here...
        $this->db->select('a.id_alternatif, a.kd_alternatif, a.nm_alternatif');
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
