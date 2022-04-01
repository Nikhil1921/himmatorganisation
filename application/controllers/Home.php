<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller  {

	private $banner = "assets/images/banner/";
	private $program = "assets/images/program/";
	private $gallery = "assets/images/gallery/";
	private $trustee = "assets/images/trustee/";
	private $compliance = "assets/images/compliance/";
	private $reports = "assets/images/report/";
	private $partners = "assets/images/partner/";
	private $about = "assets/images/about/";
	private $programs = "assets/images/donation_program/";

	public function index()
	{
		$data['name'] = 'home';
		$data['title'] = 'home';
		$data['banners'] = $this->main->getall('banner', 'CONCAT("'.$this->banner.'", banner) banner', ['id !=' => 0]);
		$data['gallery'] = $this->main->get('gallery', 'title, images', ['is_deleted' => 0]);
		$data['gallery']['path'] = $this->gallery;
		$data['program'] = $this->program;
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['about'] = $this->main->get('about', 'title, sub_title, LEFT(details, 400) details, CONCAT("'.$this->about.'", image) image, CONCAT("'.$this->about.'", banner) banner', []);
        if (!$data['about']) {
        	$post = [
        				'title' 	=> 'A LITTLE BIT MORE',
        				'sub_title' => 'We serve the huminity',
        				'image' 	=> 'default.jpg',
						'banner' 	=> 'banner.jpg',
        				'details' 	=> '<p>Himmat is a nonprofit organization registered in 2005 under Bombaypublic charitable Trust act &ndash; F/11507/Ahmedabad and under Society acts Reg. no. Guj/11646/Ahmedabad.</p><p>Himmat is a self sustaining collective committed to generating livelihood for its members. The women have kept their own machines at a &lsquo;production centre&rsquo; in Vatwa, where they sit together and fulfill fabrication orders.</p><p>Himmat was formed and named so by women survivors of Naroda-Patiya carnage, who were relocated to Vatwa &ndash; an area on the outskirts of Ahmedabad city in 2003. It began as a training programme to empower the women with sewing, stitching skills. Some members of the original group, who were trained at Himmat, went on to find successful employment or home based work.</p>'
        			];

        	$this->main->add($post, 'about');
        	$data['about'] = $this->main->get('about', 'title, sub_title, LEFT(details, 400) details, CONCAT("'.$this->about.'", image) image, CONCAT("'.$this->about.'", banner) banner', []);
        }

        if (!$data['prog'] = $this->main->get('images', 'title, image', ['page'  => 'program'])):
        $post = [
        'title' => 'WHAT WE DO',
        'image' => 'We Can Save More Life',
        'page'  => 'program'
        ];
        $this->main->add($post, 'images');
        $data['prog'] = $this->main->get('images', 'title, image', ['page'  => 'program']);
        endif;
		
		return $this->template->load('template', 'home', $data);
	}

	public function about()
	{
		$data['name'] = 'about';
		$data['title'] = 'about';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['about'] = $this->main->get('about', 'title, sub_title, details, CONCAT("'.$this->about.'", image) image, CONCAT("'.$this->about.'", banner) banner', []);
        if (!$data['about']) {
        	$post = [
        				'title' 	=> 'A LITTLE BIT MORE',
        				'sub_title' => 'We serve the huminity',
        				'image' 	=> 'default.jpg',
						'banner' 	=> 'banner.jpg',
        				'details' 	=> '<p>Himmat is a nonprofit organization registered in 2005 under Bombaypublic charitable Trust act &ndash; F/11507/Ahmedabad and under Society acts Reg. no. Guj/11646/Ahmedabad.</p><p>Himmat is a self sustaining collective committed to generating livelihood for its members. The women have kept their own machines at a &lsquo;production centre&rsquo; in Vatwa, where they sit together and fulfill fabrication orders.</p><p>Himmat was formed and named so by women survivors of Naroda-Patiya carnage, who were relocated to Vatwa &ndash; an area on the outskirts of Ahmedabad city in 2003. It began as a training programme to empower the women with sewing, stitching skills. Some members of the original group, who were trained at Himmat, went on to find successful employment or home based work.</p>'
        			];

        	$this->main->add($post, 'about');
        	$data['about'] = $this->main->get('about', 'title, sub_title, details, CONCAT("'.$this->about.'", image) image, CONCAT("'.$this->about.'", banner) banner', []);
        }

        $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'about']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'about'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'about']);
        }

		return $this->template->load('template', 'about', $data);
	}

	public function trustee($slug='')
	{
		$data['name'] = 'trustee';
		$data['title'] = 'Board of trustees';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'trustee']);
        if (!$data['banner']) {
            $post = [
                        'title' => 'OUR Trustees',
                        'image' => 'default.jpg',
                        'page'  => 'trustee'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'trustee']);
        }
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		if (!$slug) {
			$data['trustee'] = $this->main->getall('trustee', 'name, designation, slug, CONCAT("'.$this->trustee.'", image) image', ['is_deleted' => 0]);

			return $this->template->load('template', 'trustee', $data);
		}else{
			$data['trustee'] = $this->main->get('trustee', 'name, description, CONCAT("'.$this->trustee.'", image) image', ['slug' => $slug]);
			if ($data['trustee']) {
				$data['title'] = $data['trustee']['name'];
				return $this->template->load('template', 'trustee_details', $data);
			}else{
				$data['trustee'] = $this->main->getall('trustee', 'name, designation, slug, CONCAT("'.$this->trustee.'", image) image', ['is_deleted' => 0]);

				return $this->template->load('template', 'trustee', $data);	
			}
		}
	}

	public function compliance()
	{
		$data['name'] = 'compliance';
		$data['title'] = 'compliance';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['compliance'] = $this->main->getall('compliance', 'title, CONCAT("'.$this->compliance.'", image) image', ['is_deleted' => 0]);
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'compliance']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'compliance'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'compliance']);
        }

		return $this->template->load('template', 'compliance', $data);
	}

	public function reports()
	{
		$data['name'] = 'reports';
		$data['title'] = 'reports';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['reports'] = $this->main->getall('report', 'title, CONCAT("'.$this->reports.'", image) image', ['is_deleted' => 0]);
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'report']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'report'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'report']);
        }

		return $this->template->load('template', 'reports', $data);
	}

	public function partners()
	{
		$data['name'] = 'partners';
		$data['title'] = 'partners';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['partners'] = $this->main->getall('partner', 'CONCAT("'.$this->partners.'", image) image', ['id != ' => 0]);
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'partners']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'partners'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'partners']);
        }

		return $this->template->load('template', 'partners', $data);
	}

	public function media()
	{
		$data['name'] = 'media';
		$data['title'] = 'media links';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['media'] = $this->main->getall('media', 'link', ['is_deleted' => 0]);
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'media']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'media'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'media']);
        }

		return $this->template->load('template', 'media', $data);
	}

	public function contact()
	{
		$validate = [
	        [
	            'field' => 'name',
	            'label' => 'Your Name',
	            'rules' => 'required',
	            'errors' => [
	                'required' => "%s is Required"
	            ]
	        ],
	        [
	            'field' => 'email',
	            'label' => 'Your E-mail',
	            'rules' => 'required',
	            'errors' => [
	                'required' => "%s is Required"
	            ]
	        ],
	        [
	            'field' => 'phone',
	            'label' => 'Your phone',
	            'rules' => 'required',
	            'errors' => [
	                'required' => "%s is Required"
	            ]
	        ]
	    ];

		$this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = 'contact';
			$data['title'] = 'contact';
			$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
			$data['contact'] = $this->main->get('admins', 'mobile, email', ['id !=' => 0]);
			$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'contact']);
	        if (!$data['banner']) {
	            $post = [
	                        'title' => null,
	                        'image' => 'default.jpg',
	                        'page'  => 'contact'
	                    ];

	            $this->main->add($post, 'images');
	            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'contact']);
	        }
			return $this->template->load('template', 'contact', $data);
        }
        else
        { 
            $post = [
                        'name'    => $this->input->post('name'),
                        'email'   => $this->input->post('email'),
                        'phone'   => $this->input->post('phone'),
                        'message' => $this->input->post('message')
                    ];
            
            $id = $this->main->add($post, 'contact');

            flashMsg($id, "Message added successfully.", "Message not added. Try again.", 'contact');
        }
	}

	public function gallery()
	{
		$data['name'] = 'gallery';
		$data['title'] = 'gallery';
		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['gallery'] = $this->main->getall('gallery', 'title, images', ['is_deleted' => 0]);
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'gallery']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'gallery'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'gallery']);
        }
		$data['path'] = $this->gallery;
		
		return $this->template->load('template', 'gallery', $data);
	}

	public function donate()
	{
		$data['name'] = 'donate';
		$data['title'] = 'donate';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'donate']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'donate'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'donate']);
        }

		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		$data['donation_programs'] = $this->main->getall('donation_program', 'name, CONCAT("'.$this->programs.'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', 'donate', $data);
	}

	public function donate_online()
	{
		$data['name'] = 'donate_online';
		$data['title'] = 'donate online';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'donate-online']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'donate-online'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'donate-online']);
        }

		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', 'donate_online', $data);
	}

	public function save_donation()
	{
		if (!$this->input->is_ajax_request()) die;

		$post = [
					'name'       => $this->input->post('name'),
					'mobile'     => $this->input->post('mobile'),
					'email'      => $this->input->post('email'),
					'amount'     => $this->input->post('amount'),
					'payment_id' => $this->input->post('payment_id'),
				];
		
		if(! $this->main->check('donation', ['payment_id' => $post['payment_id']], 'id') && $this->main->add($post, 'donation'))
			$response = [
				'error' => false,
				'msg' => "Donation success."
			];
		else
			$response = [
				'error' => true,
				'msg' => "Donation not success."
			];
		
		die(json_encode($response));
	}

	public function programs($slug)
	{
		$data['name'] = 'programs';
		$data['title'] = 'programs';
		$data['program'] = $this->main->get('program', 'title, details, CONCAT("'.$this->program.'", image) image', ['slug' => $slug]);

		if ($data['program']) {
			$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
			return $this->template->load('template', 'programs', $data);
		}else{
			return $this->error_404();			
		}
	}

	public function privacy()
	{
		$data['name'] = 'privacy';
		$data['title'] = 'Privacy Policy';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'privacy']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'privacy'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'privacy']);
        }

		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', 'privacy', $data);
	}
	public function refund()
	{
		$data['name'] = 'refund';
		$data['title'] = 'refund';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'refund']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'refund'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'refund']);
        }

		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', 'refund', $data);
	}
	public function terms()
	{
		$data['name'] = 'terms';
		$data['title'] = 'terms & conditions';
		$data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'terms']);
        if (!$data['banner']) {
            $post = [
                        'title' => null,
                        'image' => 'default.jpg',
                        'page'  => 'terms'
                    ];

            $this->main->add($post, 'images');
            $data['banner'] = $this->main->get('images', 'title, CONCAT("assets/images/", image)image', ['page'  => 'terms']);
        }

		$data['programs'] = $this->main->getall('program', 'title, slug, CONCAT("'.$this->program.'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', 'terms', $data);
	}

	public function error_404()
	{
		return $this->load->view('error_404');
	}
}