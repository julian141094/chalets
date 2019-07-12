<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
	} 

	public function index()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/index');
		$this->load->view('frontend/base/footer');
	}
	public function nosotros()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/nosotros');
		$this->load->view('frontend/base/footer');
	}
		public function blog()
	{
		$controller    = 'Blog';
		$rows          = $this->Blog_model->get_all();
		$data['index'] = 'blog';

		$this->load->view('frontend/base/head');
		$this->load->view('frontend/blog', compact('controller','rows'));
		$this->load->view('frontend/base/footer');
	}
			public function guias()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/guias');
		$this->load->view('frontend/base/footer');
	}
			public function tours()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/tours');
		$this->load->view('frontend/base/footer');
	}
			public function restaurantes()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/restaurantes');
		$this->load->view('frontend/base/footer');
	}
			public function localesNocturnos()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/localesNocturnos');
		$this->load->view('frontend/base/footer');
	}
			public function centrosComerciales()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/centrosComerciales');
		$this->load->view('frontend/base/footer');
	}
			public function entreOtros()
	{
		$this->load->view('frontend/base/head');
		$this->load->view('frontend/entreOtros');
		$this->load->view('frontend/base/footer');
	}
}
