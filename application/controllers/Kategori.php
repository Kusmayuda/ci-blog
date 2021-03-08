<?php

class Kategori extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_kategori');
  }
  public function tambah()
  {
    $data = array(
      'nama' => $this->input->post('nama')
    );
    $tambah = $this->M_kategori->tambah($data);
    if ($tambah) { // Jika berhasil
      $this->session->set_flashdata('pesan', 'Berhasil Menambah Kategori');
      redirect('admin/kelola_kategori');
    } else { //Jika tidak berhasil
      $this->session->set_flashdata('pesan', 'Gagal Menambah Kategori');
      redirect('admin/kelola_kategori');
    }
  }
  public function hapus($id)
  {
    $this->load->model('M_kategori');
    $hapus = $this->M_kategori->hapus($id);
    if ($hapus) { // Jika berhasil
      $this->session->set_flashdata('pesan', 'Berhasil Menghapus Kategori');
      redirect('admin/kelola_kategori');
    } else { //Jika tidak berhasil
      $this->session->set_flashdata('pesan', 'Gagal Menghapus Kategori');
      redirect('admin/kelola_kategori');
    }
  }
  public function edit($id)
  {
    $data = array(
      'nama' => $this->input->post('nama')
    );
    $edit = $this->M_kategori->edit($id, $data);
    if ($edit) { // Jika berhasil
      $this->session->set_flashdata('pesan', 'Berhasil Mengubah Kategori');
      redirect('admin/kelola_kategori');
    } else { //Jika tidak berhasil
      $this->session->set_flashdata('pesan', 'Gagal Mengubah Kategori');
      redirect('admin/kelola_kategori');
    }
  }
}
