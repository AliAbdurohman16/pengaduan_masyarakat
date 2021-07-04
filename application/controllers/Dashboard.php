<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');
		$this->load->model('m_laporan');
		$this->load->helper('text');
		$this->load->helper('string');

		// cek session yang login,
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status')!="telah_login") {
			redirect('auth?alert=belum_login');
		}
	}

	public function index()
	{
		$where = [
			'nik' => $this->session->userdata('nik')
		];
		
		$data = [ 
			'dpengaduan' => $this->m_data->get_data('pengaduan')->num_rows(),
			'masyarakat' => $this->m_data->get_data('masyarakat')->num_rows(),
			'petugas' => $this->m_data->get_data('petugas')->num_rows(),
			'tanggapan' => $this->m_data->get_data('tanggapan')->num_rows(),
			'selesai' => $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows(),
			'diproses' => $this->db->get_where('pengaduan', ['status' => 'proses'])->num_rows(),
			'ditolak' => $this->db->get_where('pengaduan', ['status' => '0'])->num_rows(),
			'belum_diproses' => $this->db->get_where('pengaduan', ['status' => ''])->num_rows()
		];
		
		$data['title'] = "Dashboard";
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_index', $data);
		$this->load->view('dashboard/v_footer', $data);
	}

	public function tulis_pengaduan()
	{
		$data['title'] = "Tulis Pengaduan";
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_tulis_pengaduan');
		$this->load->view('dashboard/v_footer');
	}

	public function tulis_pengaduan_aksi()
	{
		$this->form_validation->set_rules('laporan', 'masukkan laporan', 'trim|required');
		
		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'foto', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {

			$config = [
				'upload_path' => './gambar/pengaduan',
				'allowed_types' => 'gif|jpg|jpeg|png'
			];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				$gambar = $this->upload->data();

				$data = [
					'tgl_pengaduan' => date('Y-m-d'),
					'nik' => $this->input->post('nik'),
					'isi_laporan' => $this->input->post('laporan'),  
					'foto' => $gambar['file_name'],
					'status' => ""
				];

				$this->m_data->insert_data($data, 'pengaduan');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Laporan anda berhasil dikirim! Terima kasih!.</div>');
                $this->index();
			}
		} else {
			$this->tulis_pengaduan();
		}
	}

	public function pengaduan()
	{
		$where = [
			'nik' => $this->session->userdata('nik')
		];
		$data['title'] = "Data Pengaduan";
		$data['data_pengaduan'] = $this->m_data->get_data('pengaduan')->result();
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_pengaduan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function edit_pengaduan($id)
	{
		$where = [
			'id_pengaduan' => $id
		];
		
		$data['title'] = "Edit Pengaduan";
		$data['edit_pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_edit_pengaduan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_pengaduan()
	{
		$this->form_validation->set_rules('laporan', 'masukkan laporan', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$where = [
				'id_pengaduan' => $this->input->post('id')
			];

			$data = [
				'isi_laporan' => $this->input->post('laporan')
			];
			$this->m_data->update_data($where, $data, 'pengaduan');

			if (!empty($_FILES['foto']['name'])) {
				$config = [
					'upload_path' => './gambar/pengaduan/',
					'allowed_types' => 'jpg|jpeg|png|gif|'
				];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$gambar = $this->upload->data();
					$data = [
						'foto' => $gambar['file_name']
					];

					$this->m_data->update_data($where, $data, 'pengaduan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Laporan anda berhasil diperbarui!.</div>');
                	$this->index();
				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					$id = $this->input->post('id');
					$this->edit_pengaduan($id);
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Laporan anda berhasil diperbarui!.</div>');
                $this->index();
			}
		} else {
			$id = $this->input->post('id');
			$this->edit_pengaduan($id);
		}
		
	}

	public function hapus_pengaduan($id)
	{
		$where['id_pengaduan'] = $id;
		$this->m_data->delete_data($where, 'pengaduan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Laporan anda berhasil dihapus!.</div>');
        $this->index();
	}

	public function detail_pengaduan($id)
	{
		$where['id_pengaduan'] = $id;

		$data['title'] = "Detail Pengaduan";
		$data['tanggapan'] = $this->m_data->edit_data($where, 'tanggapan')->result();
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_detail_pengaduan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function detail_pengaduan_aksi()
	{
		$this->form_validation->set_rules('tanggapan', 'isi tanggapan', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		
		if ($this->form_validation->run() == TRUE ) {
			
			$where['id_pengaduan'] = $this->input->post('id_pengaduan');

			$data['status'] = $this->input->post('status');
			
			$this->m_data->update_data($where, $data, 'pengaduan');
			
			$data1 = [
				'id_pengaduan' => $this->input->post('id_pengaduan'),
				'id_petugas' => $this->input->post('id_petugas'),
				'tgl_tanggapan' => date('Y-m-d'),
				'tanggapan' => $this->input->post('tanggapan')
			];
			$this->m_data->insert_data($data1, 'tanggapan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data pengaduan masuk berhasil diperbarui.</div>');
			$this->pengaduan();
		} else {
			$id['id_pengaduan'] = $this->input->post('id_pengaduan');
			$this->detail_pengaduan($id);
		}
    }

	public function pengaduan_diproses()
	{
		$data['title'] = "Data Pengaduan Diproses";
		$data['data_pengaduan'] = $this->m_data->get_data('pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_pengaduan_diproses', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function detail_pengaduan_diproses($id)
	{
		$where['id_pengaduan'] = $id;

		$data['title'] = "Detail Pengaduan Diproses";
		$data['tanggapan'] = $this->m_data->edit_data($where, 'tanggapan')->result();
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_detail_pengaduan_diproses', $data);
		$this->load->view('dashboard/v_footer');
	}
	
	public function detail_pengaduan_aksi_diproses()
	{
		$where['id_pengaduan'] = $this->input->post('id');
		$data['status'] = $this->input->post('status');
		$this->m_data->update_data($where, $data, 'pengaduan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data pengaduan diproses berhasil diperbarui.</div>');
		$this->pengaduan_diproses();
    }

	public function pengaduan_selesai()
	{
		$data['title'] = "Data Pengaduan Selesai";
		$data['data_pengaduan'] = $this->m_data->get_data('pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_pengaduan_selesai', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function detail_pengaduan_selesai($id)
	{
		$where['id_pengaduan'] = $id;

		$data['title'] = "Detail Pengaduan Selesai";
		$data['tanggapan'] = $this->m_data->edit_data($where, 'tanggapan')->result();
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_detail_pengaduan_selesai', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengaduan_ditolak()
	{
		$data['title'] = "Data Pengaduan Ditolak";
		$data['data_pengaduan'] = $this->m_data->get_data('pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_pengaduan_ditolak', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function detail_pengaduan_ditolak($id)
	{
		$where['id_pengaduan'] = $id;

		$data['title'] = "Detail Pengaduan Selesai";
		$data['tanggapan'] = $this->m_data->edit_data($where, 'tanggapan')->result();
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_detail_pengaduan_ditolak', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function masyarakat()
	{
		$data['title'] = "Data Masyarakat";
		$data['masyarakat'] = $this->m_data->get_data('masyarakat')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_masyarakat', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function edit_masyarakat($id)
	{
		$where['nik'] = $id;

		$data['title'] = "Edit Data Masyarakat";
		$data['masyarakat'] = $this->m_data->edit_data($where, 'masyarakat')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_masyarakat_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_masyarakat()
	{
		$this->form_validation->set_rules('nik', 'nik', 'trim|required|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('sandi', 'kata sandi', 'min_length[6]');
		$this->form_validation->set_rules('telp', 'telepon', 'trim|required|min_length[11]|max_length[13]');
		
		
		if ($this->form_validation->run() == true) {
			$where['nik'] = $this->input->post('id');
			$data = [
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('sandi'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp')
			];

			$this->m_data->update_data($where, $data, 'masyarakat');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data petugas berhasil diperbarui!.</div>');
            $this->masyarakat();
		} else {
			$id = $this->input->post('id');
			$this->edit_masyarakat($id);
		}
		
	}

	public function hapus_masyarakat($id)
	{
		$where['nik'] = $id;

		$this->m_data->delete_data($where, 'masyarakat');
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data masyarakat berhasil dihapus!.</div>');
        $this->masyarakat();
	}

	public function petugas()
	{
		$data['title'] = "Data Petugas";
		$data['petugas'] = $this->m_data->get_data('petugas')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_petugas', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_petugas()
	{
		$data['title'] = "Tambah Petugas";
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_tambah_petugas');
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_petugas_aksi()
	{
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('telp', 'telepon', 'trim|required|min_length[11]|max_length[13]');
		
		if ($this->form_validation->run() == TRUE) {
			$password = random_string('alnum', 6);
			$data = [
				'nama_petugas' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'foto' => 'default.jpg',
				'level' => 'petugas'
			];

			$this->m_data->insert_data($data, 'petugas');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data petugas berhasil ditambahkan! Silahkan masuk dengan kata sandi <b>' . $password . '</b></div>');
            $this->petugas();
		} else {
			$this->tambah_petugas();
		}
		
	}

	public function edit_petugas($id)
	{
		$where['id_petugas'] = $id;
		$data['title'] = "Edit Petugas";
		$data['petugas'] = $this->m_data->edit_data($where, 'petugas')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_edit_petugas', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update_petugas()
	{
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');
		$this->form_validation->set_rules('sandi', 'kata sandi', 'min_length[6]');
		$this->form_validation->set_rules('telp', 'telepon', 'trim|required|min_length[11]|max_length[13]');
		
		
		if ($this->form_validation->run() == true) {
			$where['id_petugas'] = $this->input->post('id');
			$data = [
				'nama_petugas' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('sandi'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'level' => $this->input->post('level')
			];

			$this->m_data->update_data($where, $data, 'petugas');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data petugas berhasil diperbarui!.</div>');
            $this->petugas();
		} else {
			$id = $this->input->post('id');
			$this->edit_petugas($id);
		}
		
	}

	public function hapus_petugas($id)
	{
		$where['id_petugas'] = $id;

		$this->m_data->delete_data($where, 'petugas');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data petugas berhasil dihapus!.</div>');
        $this->petugas();
	}

	public function laporan()
	{
		$data['title'] = "Data Laporan";
		$data['tahun'] = $this->m_laporan->get_tahun();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_laporan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function laporan_aksi()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$tahun1 = $this->input->post('tahun1');
		$bln_awal = $this->input->post('blnawal');
		$bln_akhir = $this->input->post('blnakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilai = $this->input->post('nilaifilter');

		if ($nilai == "1") {
			$data['title'] = "Laporan Pengaduan Berdasarkan Tanggal";
			$data['subtitle'] = "Dari tanggal : " . $tgl_awal. " / " . $tgl_akhir;
			$data['datafilter'] = $this->m_laporan->by_tanggal($tgl_awal, $tgl_akhir);
			$this->load->view('v_laporan_print', $data);
		} else if ($nilai == "2") {
			$data['title'] = "Laporan Pengaduan Berdasarkan Bulan";
			$data['subtitle'] = "Dari bulan : " . $bln_awal. "-" . $bln_akhir . " Tahun : " . $tahun1;
			$data['datafilter'] = $this->m_laporan->by_bulan($tahun1, $bln_awal, $bln_akhir);
			$this->load->view('v_laporan_print', $data);
		} else if ($nilai == "3") {
			$data['title'] = "Laporan Pengaduan Berdasarkan Tahun";
			$data['subtitle'] = "Tahun : " . $tahun2;
			$data['datafilter'] = $this->m_laporan->by_tahun($tahun2);
			$this->load->view('v_laporan_print', $data);
		}
	}

	public function laporan_perbulan()
	{
		$data['title'] = "Data Laporan Perbulan";
		$data['laporan'] = $this->m_data->get_data('pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_laporan_perbulan', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function laporan_pertahun()
	{
		$data['title'] = "Data Laporan Pertahun";
		$data['laporan'] = $this->m_data->get_data('pengaduan')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_laporan_pertahun', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil()
	{
		$where = [
			'nik' => $this->session->userdata('nik')
		];
		
		$where1 = [
			'id_petugas' => $this->session->userdata('id_petugas')
		];

		$data['title'] = "Profil";
		$data['profil'] = $this->m_data->edit_data($where, 'masyarakat')->result();
		$data['petugas'] = $this->m_data->edit_data($where1, 'petugas')->result();
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_profil', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil_update()
	{
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('telp', 'telepon', 'trim|required|min_length[11]|max_length[13]');
		
		if ($this->form_validation->run() == TRUE) {

			$where = [
				'nik' => $this->session->userdata('nik')
			];
			
			$data = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'telp' => $this->input->post('telp')
			];

			$this->m_data->update_data($where, $data, 'masyarakat');

			$where1 = [
				'id_petugas' => $this->session->userdata('id_petugas')
			];
			
			$data = [
				'nama_petugas' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'telp' => $this->input->post('telp')
			];

			$this->m_data->update_data($where1, $data, 'petugas');

			if (!empty($_FILES['foto']['name'])) {
				$config = [
					'upload_path' => './gambar/profil/',
					'allowed_types' => 'jpg|jpeg|png|gif|'
				];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$gambar = $this->upload->data();
					$data = [
						'foto' => $gambar['file_name']
					];

					$this->m_data->update_data($where, $data, 'masyarakat');
					$this->m_data->update_data($where1, $data, 'petugas');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Profil anda berhasil diperbarui!.</div>');
                	$this->profil();
				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					$this->profil();
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Profil anda berhasil diperbarui!.</div>');
                $this->profil();
			}
		} else {
			$this->profil();
		}
		
	}

	public function ubah_kata_sandi()
	{
		$data['title'] = "Ubah Kata Sandi";
		$this->load->view('dashboard/v_header', $data);
		$this->load->view('dashboard/v_ubah_ks');
		$this->load->view('dashboard/v_footer');
	}

	public function ubah_kata_sandi_aksi()
	{
		$this->form_validation->set_rules('sandi_lama', 'kata sandi lama', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('sandi_baru', 'kata sandi baru', 'trim|required|min_length[6]|matches[konf_sandi]');
		$this->form_validation->set_rules('konf_sandi', 'konfirmasi kata sandi', 'trim|required|min_length[6]|matches[sandi_baru]');
		
		
		if ($this->form_validation->run() == TRUE) {
			$sandi_lama = $this->input->post('sandi_lama');
			$sandi_baru = $this->input->post('sandi_baru');

			$where = [
				'nik' => $this->session->userdata('nik'),
				'password' => password_verify($sandi_lama, PASSWORD_DEFAULT)	
			];
			$cek = $this->m_data->cek_login('masyarakat', $where)->num_rows();

			$where1 = [
				'id_petugas' => $this->session->userdata('id_petugas'),
				'password' => password_verify($sandi_lama, PASSWORD_DEFAULT)	
			];
			$cek1 = $this->m_data->cek_login('petugas', $where1)->num_rows();

			if ($cek || $cek1 > 0) {
				$data = [
					'password' => password_hash($sandi_baru, PASSWORD_DEFAULT)
				];
				$this->m_data->update_data($where, $data, 'masyarakat');
				$this->m_data->update_data($where1, $data, 'petugas');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Kata sandi anda berhasil diperbarui. </div>');
				$this->ubah_kata_sandi();
			} else {
				$this->ubah_kata_sandi();
			}
		} else {
			$this->ubah_kata_sandi();
		}
		
	}

	public function keluar() 
	{
		$this->session->sess_destroy();
		redirect('auth?alert=logout');
	}
}

?>