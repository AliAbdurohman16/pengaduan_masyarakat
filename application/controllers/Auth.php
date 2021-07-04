<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');
		$this->load->helper('text');
		$this->load->helper('string');

	}

	public function index()
	{
		$data['title'] = "Masuk";
		$this->load->view('auth/v_header', $data);
		$this->load->view('auth/v_login');
		$this->load->view('auth/v_footer');
	}

	public function aksi()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'kata sandi', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == true) {
			// Menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = [
				'username' => $username,
				'password' => password_verify($username, $password)
			];

			// Cek kesesuaian login pada table pengguna
			$cek = $this->m_data->cek_login('masyarakat', $where)->num_rows();
			$cek1 = $this->m_data->cek_login('petugas', $where)->num_rows();

			if ($cek || $cek1 > 0) {
				// Ambil data pengguna yang melakukan login
				$data = $this->m_data->cek_login('masyarakat', $where)->row();
				$data1 = $this->m_data->cek_login('petugas', $where)->row();

				// Buat session untuk yang berhasil login
				$data_session = [
					'nik' => $data->nik,
					'id_petugas' => $data1->id_petugas,
					'level' => $data1->level,
					'status' => 'telah_login'
				];
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			} else {
				redirect('auth?alert=gagal');
			}
		} else {
			$this->index();
		}
	}

	public function registrasi()
	{
		$data['title'] = "Registrasi";
		$this->load->view('auth/v_header', $data);
		$this->load->view('auth/v_registrasi');
		$this->load->view('auth/v_footer');
	}

	public function registrasi_aksi()
	{
		$this->form_validation->set_rules('nik', 'nik', 'trim|required|min_length[16]|max_length[16]|is_unique[masyarakat.nik]');
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('telp', 'telepon', 'trim|required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('pengaduan', 'masukkan isi laporan anda', 'trim|required');
		
		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'foto', 'trim|required');
		}
		
		if ($this->form_validation->run() == true) {
			$nik = $this->input->post('nik');
			$password = random_string('alnum', 6);
			$data = [
				'nik' => $nik,
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'foto' => 'default.jpg'
			];

			$this->m_data->insert_data($data, 'masyarakat');

			$config = [
                'upload_path' => './gambar/pengaduan/',
                'allowed_types' => 'gif|jpg|png|jpeg'
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                // Mengambil data tentang gambar
                $gambar = $this->upload->data();

                $data = [
					'tgl_pengaduan' => date('Y-m-d'),
					'nik' => $nik,
					'isi_laporan' => $this->input->post('pengaduan'),
                    'foto' => $gambar['file_name'],
					'status' => ''
                ];

                $this->m_data->insert_data($data, 'pengaduan');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Terimakasih anda telah registrasi! Silahkan <b>Masuk</b> dengan Kata Sandi <b>' . $password . '</b> </div>');
                $this->index();
            }
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Terimakasih anda telah registrasi! Silahkan <b>Masuk</b> dengan Kata Sandi <b>' . $password . '</b> </div>');
			$this->index();  
        } else {
            $this->registrasi();
        }
	}

	public function lupa_kata_sandi()
	{
		$data['title'] = "Lupa Kata Sandi";
		$this->load->view('auth/v_header', $data);
		$this->load->view('auth/v_lupa_ks');
		$this->load->view('auth/v_footer');
	}

	public function lupa_kata_sandi_aksi()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');

		if ($this->form_validation->run() == true) {
			// Menangkap data username dan password dari halaman login
			$where = [
				'username' => $this->input->post('username')
			];

			// Cek kesesuaian login pada table pengguna
			$cek = $this->m_data->cek_login('masyarakat', $where)->num_rows();
			$cek1 = $this->m_data->cek_login('petugas', $where)->num_rows();

			if ($cek || $cek1 > 0) {
				$data = $this->m_data->cek_login('masyarakat', $where)->row();
				$data1 = $this->m_data->cek_login('petugas', $where)->row();

				$data_session = [
					'nik' => $data->nik,
					'id_petugas' => $data1->id_petugas				];
				$this->session->set_userdata($data_session);
				redirect('auth/ubah_kata_sandi');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Username anda salah! Silahkan masukkan username dengan benar!. </div>');
                $this->lupa_kata_sandi();
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Username anda salah! Silahkan masukkan username dengan benar!. </div>');
            $this->lupa_kata_sandi();
		}
	}

	public function ubah_kata_sandi()
	{
		$data['title'] = "Ubah Kata Sandi";
		$this->load->view('auth/v_header', $data);
		$this->load->view('auth/v_ubah_ks');
		$this->load->view('auth/v_footer');
	}

	public function ubah_kata_sandi_aksi()
	{
		$this->form_validation->set_rules('password', 'kata sandi baru', 'trim|required|min_length[6]|matches[password1]');
		$this->form_validation->set_rules('password1', 'konfirmasi kata sandi', 'trim|required|min_length[6]|matches[password]');

		if ($this->form_validation->run() == TRUE) {

			$where = [
				'nik' => $this->session->userdata('nik')
			];
			
			$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$this->m_data->update_data($where, $data, 'masyarakat');

			$where1 = [
				'id_petugas' => $this->session->userdata('id_petugas')
			];

			$this->m_data->update_data($where1, $data, 'petugas');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Kata sandi anda telah diperbarui! Silahkan masuk. </div>');
			$this->index();
		} else {
			$this->ubah_kata_sandi();
		}
	}

}