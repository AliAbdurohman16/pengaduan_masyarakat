<?php

class M_Laporan extends CI_Model
{
		
	function get_tahun()
	{
		$query = $this->db->query("SELECT YEAR(tgl_pengaduan) AS tahun FROM pengaduan GROUP BY YEAR(tgl_pengaduan) ORDER BY YEAR(tgl_pengaduan) ASC");
		return $query->result();
		
	}

	function by_tanggal($tgl_awal, $tgl_akhir)
	{
		$query = $this->db->query("SELECT * FROM pengaduan WHERE DATE(tgl_pengaduan) BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_pengaduan ASC");
		return $query->result();
	}

	function by_bulan($tahun1, $bln_awal, $bln_akhir)
	{
		$query = $this->db->query("SELECT * FROM pengaduan WHERE YEAR(tgl_pengaduan) = '$tahun1' AND MONTH(tgl_pengaduan) BETWEEN '$bln_awal' AND '$bln_akhir' ORDER BY tgl_pengaduan ASC");
		return $query->result();
	}

	function by_tahun($tahun2)
	{
		$query = $this->db->query("SELECT * FROM pengaduan WHERE YEAR(tgl_pengaduan) = '$tahun2' ORDER BY YEAR(tgl_pengaduan) ASC");
		return $query->result();
	}

}
?>