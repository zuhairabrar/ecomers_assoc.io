<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_map extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->sandal_model->menu_kategori('0','0');
		$data['judul'] = "Site Map Produk dan Website - BitCom Online, Toko Komputer Termurah dan Terlengkap di Jember - BitCom Jember";
		$data['slide_atas'] = $this->sandal_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->sandal_model->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_produk_home'] = $this->sandal_model->tampil_produk(12);
		$data['slide_baru'] = $this->sandal_model->tampil_produk(5);
		$data['intermezzo'] = $this->sandal_model->tampil_semua_berita(5,0);
		$data['testimonial'] = $this->sandal_model->tampil_testimonial(10,0);
		$data['banner'] = $this->sandal_model->tampil_banner();
	
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
			
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_sitemap');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
