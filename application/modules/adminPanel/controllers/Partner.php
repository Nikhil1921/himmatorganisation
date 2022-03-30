<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends Admin_controller {

	protected $redirect = 'partner';
	protected $name = 'partner';
	protected $title = 'partners';
	protected $table = 'partner';

	public function index()
	{
		$data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTable'] = true;

		return $this->template->load('template', $this->redirect.'/home', $data);
	}

    public function get()
    {
        $this->load->model('partner_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_POST['start'] + 1;
        $data = [];
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = img(['src' => $row->image, 'height' => 100]);

            $action = '<div style="display: flex;">';

            $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id), 'image' => $row->image]).
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

    public function upload()
    {
        $config = [
            'upload_path'      => "assets/images/partner/",
            'allowed_types'    => 'jpg|jpeg|png',
            'file_name'        => time(),
            'file_ext_tolower' => TRUE
        ];

        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload("image")) { 
            $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
            return redirect($this->redirect);
        }else{
            $post = [
                    'image' => $this->upload->data("file_name")
            ];

            $id = $this->main->add($post, $this->table);
            
            if ($id) {
                $config_manip = [
                        'image_library' => 'gd2',
                        'source_image' => $this->upload->data('full_path'),
                        'new_image' => $this->upload->data('file_path'),
                        'maintain_ratio' => TRUE,
                        'width' => 340,
                        'height' => 200
                    ];
               
                $this->load->library('image_lib', $config_manip);
                $this->image_lib->resize();
           
                $this->image_lib->clear();
            }else
                unlink($config['upload_path'].$post['image']);

            flashMsg($id, "Image uploaded successfully.","Image not uploaded. Try again.", $this->redirect);
        }   
    }

    public function delete()
    {
        $id = $this->main->delete($this->table, ['id' => d_id($this->input->post('id'))]);
     
        if ($id && file_exists($this->input->post('image')))
            unlink($this->input->post('image'));

        flashMsg($id, ucwords($this->title)." deleted successfully.", ucwords($this->title)." not deleted. Try again.", $this->redirect);
    }
}
