<?php

class Model extends CI_Model
{
    function tambah($id, $status)
    {
        $orang = $this->db->get_where('anggota', ['id' => $id])->row();

        $data = array(
            'nama' => $orang->nama,
            'tanggal' => date('Y-m-d'),
            'status' => $status
        );
        $this->db->insert('jimpitan', $data);
    }
}
