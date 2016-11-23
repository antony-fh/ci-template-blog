<?php
	class Template{
		protected $ci;
		public function __construct()
		{
			$this->ci = &get_instance();	
		}
		function view( $template = null, $data = null){
			if ($template!=null) {
				$data['body'] = $this->ci->load->view($template,$data,TRUE);
				$data['header'] = $this->ci->load->view('bagian/header',$data,TRUE);
				$data['sidebar'] = $this->ci->load->view('bagian/sidebar',$data,TRUE);
				$data['footer'] = $this->ci->load->view('bagian/footer',$data,TRUE);
				echo $data['template'] = $this->ci->load->view('template',$data,TRUE);
			}
		}
	}
?>