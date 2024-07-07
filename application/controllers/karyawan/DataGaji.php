<?php

class DataGaji extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '2'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
				redirect('welcome');
        }
    }

    public function index(){
        $data['title'] = 'Data Gaji';
        $nik=$this->session->userdata('nik');
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_karyawan.nama_karyawan,data_karyawan.nik,
        data_jabatan.gaji_pokok,data_jabatan.tj_transport,data_jabatan.uang_makan,
        data_kehadiran.alpha,data_kehadiran.bulan,data_kehadiran.id_kehadiran
        FROM data_karyawan
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
        WHERE data_kehadiran.nik='$nik'
        ORDER BY data_kehadiran.bulan DESC")->result();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/dataGaji', $data);
        $this->load->view('templates_karyawan/footer');
    }

    public function cetakSlip($id){
        $data['title'] = 'Cetak Slip Gaji';
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();

        $data['print_slip'] = $this->db->query("SELECT data_karyawan.nik,data_karyawan.nama_karyawan,
            data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.tj_transport,data_jabatan.uang_makan,
            data_kehadiran.alpha,data_kehadiran.bulan FROM data_karyawan
            INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
            WHERE data_kehadiran.id_kehadiran='$id'")->result();
        $this->load->view('templates_karyawan/header', $data);
        $this->load->view('karyawan/cetakSlipGaji', $data);
    }
}

?>