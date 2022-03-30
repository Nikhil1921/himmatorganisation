<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Images extends Admin_controller {
	
	protected $redirect = 'images';
	protected $name = 'images';
	protected $title = 'image';
	protected $table = 'images';

	public function index()
	{
		$data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['url'] = $this->redirect;

		return $this->template->load('template', $this->redirect.'/home', $data);
	}

    public function upload()
    {
        $config = [
            'upload_path'      => 'assets/images/',
            'allowed_types'    => 'jpg|jpeg|png',
            'file_name'        => time(),
            'file_ext_tolower' => TRUE
        ];

        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload("image"))
            flashMsg(0, '', strip_tags($this->upload->display_errors()), $this->redirect);
        else{
            $img = $this->input->post('image');
            $post = [
                        'image'  => $this->upload->data("file_name")
                    ];

            $uid = $this->main->update(['page'  => $this->input->post('page')], $post, 'images');

            if ($uid && !empty($_FILES['image']['name']) && $img != 'default.jpg' && file_exists('assets/images/'.$img))
                unlink('assets/images/'.$img);

            flashMsg($uid, ucwords($this->title)." updated successfully.", ucwords($this->title)." not updated. Try again.", $this->redirect);
        }
    }
}