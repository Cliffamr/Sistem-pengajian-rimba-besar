<?php

class dataKaryawan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
				redirect('welcome');
        }
    }

    public function index(){
        $data['title'] = "Data Karyawan";
        $data['karyawan'] = $this->penggajianModel->get_data('data_karyawan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataKaryawan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData(){
        $data['title'] = "Tambah Data Karyawan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahKaryawan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nik            = $this->input->post('nik');
            $nama_karyawan  = $this->input->post('nama_karyawan');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $tanggal_masuk  = $this->input->post('tanggal_masuk');
            $jabatan        = $this->input->post('jabatan');
            $status         = $this->input->post('status');
            $hak_akses      = $this->input->post('hak_akses');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $photo          = $_FILES['photo']['name'];
            if($photo=''){}else{
                $config ['upload_path']      = './template/photo';
                $config ['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo gagal diupload!";
                }else{
                    $photo = $this->upload->data('file_name');
                }
            }  

            $data = array(
                'nik'               => $nik,
                'nama_karyawan'     => $nama_karyawan,
                'jenis_kelamin'     => $jenis_kelamin,
                'jabatan'           => $jabatan,
                'tanggal_masuk'     => $tanggal_masuk,
                'status'            => $status,
                'hak_akses'         => $hak_akses,
                'username'          => $username,
                'password'          => $password,
                'photo'             => $photo,
            );

            $this->penggajianModel->insert_data($data, 'data_karyawan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
            redirect('admin/dataKaryawan');
        }
    }

    public function updateData($id){
        $where = array('id_karyawan' => $id);
        $data['title'] = "Update Data Karyawan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['karyawan'] = $this->db->query("SELECT * FROM data_karyawan WHERE id_karyawan='$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateKaryawan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $id             = $this->input->post('id_karyawan');
            $this->updateData($id);
        }else{
            $id             = $this->input->post('id_karyawan');
            $nik            = $this->input->post('nik');
            $nama_karyawan  = $this->input->post('nama_karyawan');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $tanggal_masuk  = $this->input->post('tanggal_masuk');
            $jabatan        = $this->input->post('jabatan');
            $status         = $this->input->post('status');
            $hak_akses      = $this->input->post('hak_akses');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $photo          = $_FILES['photo']['name'];
            if($photo){
                $config ['upload_path']      = './template/photo';
                $config ['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                }else{
                    echo $this->upload->display_errors();
                }
            }  

            $data = array(
                'nik'               => $nik,
                'nama_karyawan'     => $nama_karyawan,
                'jenis_kelamin'     => $jenis_kelamin,
                'jabatan'           => $jabatan,
                'tanggal_masuk'     => $tanggal_masuk,
                'status'            => $status,
                'hak_akses'         => $hak_akses,
                'username'          => $username,
                'password'          => $password,
            );

            $where = array(
                'id_karyawan'  => $id
            );

            $this->penggajianModel->update_data('data_karyawan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
            redirect('admin/dataKaryawan');
        }
    }


    public function _rules(){
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function deleteData($id){
        $where = array('id_karyawan' => $id);
        $this->penggajianModel->delete_data($where, 'data_karyawan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
            redirect('admin/dataKaryawan');
    }

}
?>