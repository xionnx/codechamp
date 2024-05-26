<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != 1) {
			if ($this->session->userdata('role') != 2) {
				if ($this->session->userdata('role') != 3) {
					redirect(base_url('auth/login?alert=akses_ditolak'));
				}
			}
		}
	}

	public function index()
	{
		// $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]', [
		// 	'required' 		=> 'Silahkan Masukan Password Baru Anda !',
		// 	'matches' 		=> 'Password tidak sama !',
		// 	'min_length' 	=> 'Password Harus Lebih dari 6 Karakter'
		// ]);
		// $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|matches[password1]');

		$password = $this->input->post('password1');
		$confirm_bassword = $this->input->post('password2');

		if (!empty($password)){
            $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[4]|matches[password2]', [
			'required' 		=> 'Silahkan Masukan Password Baru Anda.',
			'matches' 		=> 'Password tidak sama.',
			'min_length' 	=> 'Password Harus Lebih dari 4 Karakter'
			]);
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[4]|matches[password1]');
        };

		if ($this->form_validation->run() == false) {
			if ($this->session->userdata('role') == 1) {
				$this->load->view('admin/v_password');
			} else if ($this->session->userdata('role') == 2) {
				$this->load->view('admin/v_password_tutor');
			} else if ($this->session->userdata('role') == 3) {
				$this->load->view('user/v_password');
			} 

		} else {
			$id = $this->session->userdata('id');
			$where 	= array('id_user' => $id);
			$data 	= array('password' => md5($password));;

			$this->m_data->update_data($where, $data, 'user');
			?>
            <script src="<?= base_url() ?>assets/dist/js/sweetalert2.all.min.js"></script>
            <?php
			?>
			<body></body>
			<script>
				Swal({
					title: 'Ubah Password',
					type: 'success',
					text: 'Berhasil mengubah password, anda kembali dialihkan ke halaman login.'
				}).then((result => {
					window.location ='<?= site_url('auth/logout') ?>';
				}))
			</script>;
			<?php
		}
	}
}
