<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_controller {

	protected $redirect = 'gallery';
	protected $name = 'gallery';
	protected $title = 'gallery';
	protected $table = 'gallery';

	public function index()
	{
		$data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTable'] = true;
        if (!$data['data'] = $this->main->get('images', 'title, image', ['page'  => $this->title])):
        $post = [
        'title' => 'OUR GREAT WORK',
        'image' => 'default.jpg',
        'page'  => $this->title
        ];
        $this->main->add($post, 'images');
        $data['data'] = $this->main->get('images', 'title, image', ['page'  => $this->title]);
        endif;

		return $this->template->load('template', $this->redirect.'/home', $data);
	}

    public function get()
    {
        $this->load->model('gallery_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_POST['start'] + 1;
        $data = [];
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->title;

            $action = '<div style="display: flex;">';

            $action .= anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-primary btn-outline-primary btn-icon mr-1"');

            $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                form_button([ 'content' => '<i class="fa fa-trash"></i>', 
                    'type'  => 'button',
                    'class' => 'btn btn-danger btn-outline-danger btn-icon', 
                    'onclick' => "script.delete(".e_id($row->id)."); return false;"]).
                form_close();

            $action .= '</div>';
            $sub_array[] = $action;

            $data[] = $sub_array;  
            $sr++;
        }

        $output = [
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->data->count(),
            "recordsFiltered"   => $this->data->get_filtered_data(),
            "data"              => $data
        ];
        
        echo json_encode($output);
    }

	public function add()
    {
        $this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['url'] = $this->redirect;
            $data['operation'] = 'add';
            
            return $this->template->load(admin('template'), $this->redirect.'/add', $data);
        }
        else
        { 
            $post = [
                        'title'  => $this->input->post('title')
                    ];
            
            $id = $this->main->add($post, $this->table);

            flashMsg($id, ucwords($this->title)." added successfully.", ucwords($this->title)." not added. Try again.", $this->redirect.'/upload/'.e_id($id));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['id'] = $id;
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['url'] = $this->redirect;
            $data['operation'] = 'update';
            $data['data'] = $this->main->get($this->table, 'title', ['id' => d_id($id)]);
            if ($data['data'])
                return $this->template->load(admin('template'), $this->redirect.'/update', $data);
            else
                return $this->error_404();
        }
        else
        { 
            $post = [
                        'title'  => $this->input->post('title')
                    ];

            $uid = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($uid, ucwords($this->title)." updated successfully.", ucwords($this->title)." not updated. Try again.", $this->redirect.'/upload/'.$id);
        }
    }

    public function title()
    {
        $post = [
                    'title'  => $this->input->post('title')
                ];

        $uid = $this->main->update(['page'  => $this->title], $post, 'images');

        flashMsg($uid, ucwords($this->title)." title updated successfully.", ucwords($this->title)." title not updated. Try again.", $this->redirect);
    }

    public function upload($id)
    {
    	$images = $this->main->get($this->table, 'images', ['id' => d_id($id)]);
        if (!$this->input->is_ajax_request()) {
        	$data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['url'] = $this->redirect;
            $data['upload'] = TRUE;
            $data['operation'] = 'upload';
            $data['id'] = $id;

        	if ($images)
                return $this->template->load(admin('template'), $this->redirect.'/upload', $data);
            else
                return $this->error_404();
        }else{
        	$this->load->library('upload');
		    $dataInfo = array();
		    $files = $_FILES;
		    $cpt = count($_FILES['image']['name']);
		    for($i=0; $i<$cpt; $i++)
		    {           
		        $_FILES['image']['name']= $files['image']['name'][$i];
		        $_FILES['image']['type']= $files['image']['type'][$i];
		        $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
		        $_FILES['image']['error']= $files['image']['error'][$i];
		        $_FILES['image']['size']= $files['image']['size'][$i];

		        $this->upload->initialize($this->set_upload_options());
		        if ($this->upload->do_upload("image")):
		        	$dataInfo[$i] = $this->upload->data('file_name');
		    	endif;
		    }
		    if ($images['images']) {
		    	$image = explode(',', $images['images']);
		    	$image = array_merge($image, $dataInfo);
		    }else{
		    	$image = $dataInfo;
		    }

		    if ($this->main->update(['id' => d_id($id)], ['images' => implode(',', $image)], $this->table))
		    	$return = ['error' => false, 'message' => "Images uploaded."];
		    else
		    	$return = ['error' => true, 'message' => "Images not uploaded."];

		    echo json_encode($return); die();
        }
    }

    public function showImages($id)
    {
    	$images = $this->main->get($this->table, 'images', ['id' => d_id($id)]);
    	if ($images['images']) {
    		$return = '';
    		foreach (explode(',', $images['images']) as $v)
    			$return .= '<li class="col-4"><img src="'.base_url('assets/images/gallery/').$v.'" class="img-fluid p-absolute d-block text-center" onclick="script.removeImage(\''.$id.'\', \''.$v.'\')"></li>';
    	}else
    		$return = '<li class="col-12"><h6>No Image uploaded.</h6></li>';
    	echo $return; die();
    }

    public function removeImage()
    {
    	$id = d_id($this->input->post('id'));
    	$img = $this->input->post('image');
    	$images = $this->main->check($this->table, ['id' => $id], 'images');
    	$images = explode(',', $images);
    	$key = array_search($this->input->post('image'), $images);
    	unset($images[$key]);
    	if ($this->main->update(['id' => $id], ['images' => implode(',', $images)], $this->table))
	    	$return = ['error' => false, 'message' => "Image removed."];
	    else
	    	$return = ['error' => true, 'message' => "Image not removed."];

	    echo json_encode($return); die();
    }

    private function set_upload_options()
	{
	    $config = [
	            'upload_path'      => "assets/images/gallery/",
	            'allowed_types'    => 'jpg|jpeg|png',
	            'file_name'        => time(),
	            'file_ext_tolower' => TRUE
	        ];

	    return $config;
	}

    public function delete()
    {
        $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);

        flashMsg($id, ucwords($this->title)." deleted successfully.", ucwords($this->title)." not deleted. Try again.", $this->redirect);
    }

    protected $validate = [
        [
            'field' => 'title',
            'label' => 'Gallery title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];
}
