<?php

class DataAbsensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Data Absensi Karyawan";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $nik = $this->session->userdata('nik');
        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin, data_karyawan.jabatan
            FROM data_kehadiran 
            INNER JOIN data_karyawan ON data_kehadiran.nik=data_karyawan.nik
            INNER JOIN data_jabatan ON data_karyawan.jabatan = data_jabatan.nama_jabatan
            WHERE data_kehadiran.bulan='$bulantahun' and data_kehadiran.nik='$nik' ORDER BY data_karyawan.nama_karyawan ASC")->result();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/dataAbsensi', $data);
        $this->load->view('templates_karyawan/footer');
    }
}
