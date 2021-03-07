<?php
class M_kategori extends CI_Model
{
  public function get()
  {
    return $this->db->get('kategori');
  }
}
