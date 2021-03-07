<?php
class AdminController extends CI_Controller
{
  // Ke Halaman

  public function Ke_HalamanAdmin($page)
  {
    // Load Model
    $this->load->model('M_kategori');
    // Cek ada file di views yang sesuai dengan yang diakses
    if ($this->load->view('back/admin/' . $page, '', true) === '') { // jika tidak
      echo "Terjadi Kesalahan";
    } else { // jika ada
      $judul = '';

      if ($page === "index") :
        $judul = 'Dashboard';
      // elseif ($page === "kelola_kategori") :
      //   $judul = 'Kelola Kategori';
      else :
        $judul = ucfirst(str_replace('_', ' ', $page));
      endif;

      $data['kategori'] = $this->M_kategori->get()->result();
      $data['judul'] = "Halaman " . $judul;

      $this->load->view('back/template/header', $data);
      $this->load->view('back/admin/' . $page, $data);
      $this->load->view('back/template/footer', $data);
    }
  }

  public function Ke_HalamanPenulis()
  {
    $data['judul'] = "Halaman Penulis";

    $this->load->view('back/template/header', $data);
    $this->load->view('back/penulis/index', $data);
    $this->load->view('back/template/footer', $data);
  }

  // Proses

  public function logout()
  {
    session_destroy();
    redirect(base_url());
  }

  public function login()
  {
    $data['judul'] = "Login Admin";
    $this->load->view('back/login', $data);
  }
  public function proseslogin_admin()
  {
    // Panggil Model
    $this->load->model('M_user');

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $cek = $this->M_user->cek_login($username, $password)->num_rows();
    $data = $this->M_user->cek_login($username, $password)->row();
    if ($cek > 0) { //Jika benar
      if ($data->level === "0") { // Jika Admin
        $level = 'admin';
        $sess = array(
          'username' => $data->username,
          'level' => $level,
          'user_id' => $data->id
        );
        $this->session->set_userdata($sess);
        redirect('admin/index');
      } elseif ($data->level === "1") { // Jika Penulis
        $level = 'penulis';
        $sess = array(
          'username' => $data->username,
          'level' => $level,
          'user_id' => $data->id
        );
        $this->session->set_userdata($sess);
        redirect('penulis/index');
      }
      $sess = array(
        'username' => $data->username,
        'level' => $level,
        'user_id' => $data->id
      );
    } else {
      $this->session->set_flashdata('pesan', 'Maaf Username atau Password Salah');
      redirect('login_admin');
    }
  }
}
