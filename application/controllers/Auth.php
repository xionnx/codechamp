<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login() {

        $this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'Kolom Email tidak boleh kosong.']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Kolom Password tidak boleh kosong.']);

		$post = $this->input->post(null, TRUE);
        if ($this->form_validation->run() != false) {
            $query = $this->m_data->login($post);
            ?>
            <script src="<?= base_url() ?>assets/dist/js/sweetalert2.all.min.js"></script>
            <style>
                body {
                    font-family: "Nunito";
                    font-size: 12px;
                    font-weight: 900;
                }
            </style>
            <body></body>
            <?php
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id_user,
                    'email' => $row->email,
                    'nama' => $row->nama_user,
                    'role' => $row->role
                );
                $this->session->set_userdata($params);
                if ($row->role == 1) {
                    ?>
                    <script>
                        Swal({
                            title: 'Login',
                            type: 'success',
                            text: 'Berhasil login sebagai Admin!'
                        }).then((result => {
                            window.location ='<?= site_url('home') ?>';
                        }))
                    </script>;
                    <?php
                } else if ($row->role == 2) {
                    ?>
                    <script>
                        Swal({
                            title: 'Login',
                            type: 'success',
                            text: 'Berhasil login sebagai Tutor!'
                        }).then((result => {
                            window.location ='<?= site_url('home') ?>';
                        }))
                    </script>;
                    <?php
                } else {
					?>
                    <script>
                        Swal({
                            title: 'Login',
                            type: 'success',
                            text: 'Berhasil login sebagai User!'
                        }).then((result => {
                            window.location ='<?= site_url('home') ?>';
                        }))
                    </script>;
                    <?php
				}
            } else {
                ?>
                <script>
                    Swal({
                        title: 'Login',
                        type: 'error',
                        text: 'Email atau password Anda salah!'
                    }).then((result => {
                        window.location ='<?= site_url('auth/login') ?>';
                    }))
                </script>;
                <?php
            }
        } else {
            $this->load->view('v_login');
        }
	}

    public function register() {
        $this->form_validation->set_rules('nama_user','Nama','trim|required', [
            'required' => 'Kolom nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email yang anda masukkan tidak benar.',
            'required' => 'Kolom email tidak boleh kosong!',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password','Password','required|matches[confirm_password]', [
            'required' => 'Kolom password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', [
            'required' => 'Kolom ulangi password tidak boleh kosong!'
        ]);
        ?>
        <script src="<?= base_url('') ?>assets/dist/js/sweetalert2.all.min.js"></script>
        <style>
            body {
                font-family: "Nunito";
                font-size: 12px;
                font-weight: 900;
            }
        </style>
        <body></body>
        <?php

        if($this->form_validation->run() == false){
            //Views
            $this->load->view('v_register');
        } else {
            //Create Data Array
                $nama_user           = $this->input->post('nama_user');
                $email               = $this->input->post('email');
                $password            = md5($this->input->post('password'));
                $role               = 3;
        
                $data = array(
                    'nama_user' => $nama_user,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role
                );
        
                $this->m_data->insert_data($data, 'user');
                ?>
                <script>
                    Swal({
                        title: 'Registrasi',
                        type: 'success',
                        text: 'Berhasil mendaftarkan akun, silahkan login jika ingin!'
                    }).then((result => {
                        window.location ='<?= site_url('auth/login') ?>';
                    }))
                </script>;
                <?php
                $this->session->set_flashdata('berhasil_registrasi', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Registrasi berhasil, silahkan login jika ingin.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                // redirect('auth/login');
        };
    }


	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center">Anda sudah logout</div>');
		redirect(base_url('auth/login'));
	}
}
