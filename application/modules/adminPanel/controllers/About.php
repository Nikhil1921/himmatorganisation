<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class About extends Admin_controller {
	
	protected $redirect = 'about';
	protected $name = 'about';
	protected $title = 'about';
	protected $table = 'about';

	public function index()
	{
		$this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
			return $this->view();
		else{
			$img = $this->input->post('image');
			$post = [
                        'title'  => $this->input->post('title'),
                        'sub_title'  => $this->input->post('sub_title'),
                        'details'  => $this->input->post('details'),
                        'image'  => $this->uploadImage($img)
                    ];

            $uid = $this->main->update([], $post, $this->table);

            if ($uid && !empty($_FILES['image']['name']) && $img != 'default.jpg' && file_exists('assets/images/about/'.$img))
            	unlink('assets/images/about/'.$img);

            flashMsg($uid, ucwords($this->title)." updated successfully.", ucwords($this->title)." not updated. Try again.", $this->redirect);
		}
	}

	public function view()
	{
		$data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['data'] = $this->main->get($this->table, 'title, sub_title, details, image, banner', []);

        if (!$data['data']) {
        	$post = [
        				'title' 	=> 'A LITTLE BIT MORE',
        				'sub_title' => 'We serve the huminity',
        				'image' 	=> 'default.jpg',
						'banner' 	=> 'banner.jpg',
        				'details' 	=> '<p>Himmat is a nonprofit organization registered in 2005 under Bombaypublic charitable Trust act &ndash; F/11507/Ahmedabad and under Society acts Reg. no. Guj/11646/Ahmedabad.</p><p>Himmat is a self sustaining collective committed to generating livelihood for its members. The women have kept their own machines at a &lsquo;production centre&rsquo; in Vatwa, where they sit together and fulfill fabrication orders.</p><p>Himmat was formed and named so by women survivors of Naroda-Patiya carnage, who were relocated to Vatwa &ndash; an area on the outskirts of Ahmedabad city in 2003. It began as a training programme to empower the women with sewing, stitching skills. Some members of the original group, who were trained at Himmat, went on to find successful employment or home based work.</p>'
        			];

        	$this->main->add($post, $this->table);
        	$data['data'] = $this->main->get($this->table, 'title, sub_title, details, image, banner', []);
        }

		return $this->template->load('template', $this->redirect.'/home', $data);
	}

    private function uploadImage($unlink='')
    {
        if (!empty($_FILES['image']['name'])) {
            $config = [
                'upload_path'      => 'assets/images/about/',
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload("image"))
                $return = 'default.jpg';
            else
                $return = $this->upload->data("file_name");
        }else
            if (!$unlink)
                $return = 'default.jpg';
            else
                $return = $unlink;

        return $return;
    }

	protected $validate = [
        [
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'sub_title',
            'label' => 'Sub title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'details',
            'label' => 'About',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];
}