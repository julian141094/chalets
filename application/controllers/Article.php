<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Backend.php';

class Article extends Backend 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('category_model');
        $this->session->set_flashdata('menu', 'content');
    }

    public function index()
    {
        $this->check_session();
        $rows = $this->article_model->get_all();
        $this->load->view('backend/article',compact('rows'));
    }

    public function view($id)
    {
        $this->check_session();

        $row        = $this->article_model->get_by_id($id);

        if($row == 0)
        {
            $this->message('Error','Oh oh, algo ah salido mal, estas intentando acceder a un Articulo que no Existe','error');
            redirect('/article/', 'refresh');
        }

        $row = $row[0];
        $this->load->view('backend/article/view',compact('row'));
    }
    
    public function add($phase = 0)
    {
        $this->check_session();

        if(!$phase)
        {
            $this->load->view('backend/article/insert',compact('controller','categories'));
        }
        else
        {
            $this->form_validation->set_rules('Name'        ,'Nombre'      ,'trim|required|max_length[100]');
            $this->form_validation->set_rules('Slug'        ,'Url Amigable','trim|required');
            $this->form_validation->set_rules('Introduction','Introducción','trim');
            $this->form_validation->set_rules('Full_Text'   ,'Contenido'   ,'trim|required');
            $this->form_validation->set_rules('Category_Id' ,'Categoría'   ,'trim|required');

            $this->form_validation->set_message('required', '{field} es requerido para guardar el Articulo');
            $this->form_validation->set_message('max_length', '{field} solo puede tener máxima longitud de {param} Caracteres');
        
            if ($this->form_validation->run()==false)
            {
                $this->message('Error al Guardar','Verifique los campos para finalizar el proceso','error');
                redirect('/article/add', 'refresh');
            }
            else
            {
                if(!$this->article_model->insert($this->input))
                {
                    $this->message('Error','Oh oh, algo ah salido mal, te recomendamos contactar al administrador del sistema','error');
                    redirect('/article/add', 'refresh');
                }

                $_POST['Id'] = $this->db->insert_id();

                if($this->input->post('Home'))
                {
                    if(!$this->article_model->update_new_home($this->input->post('Id')))
                    {
                        $this->message('Advertencia','Oh oh, algo no va bien, no hemos podido garantizar un único articulo de Inicio, por favor arreglarlo manualmente','error');
                    }
                }

                if ($_FILES['File']['name'] != '')
                {
                    $this->load->helper('path');
                    $this->load->helper('string');
                    $this->load->library('image_lib');
                    $this->load->library('upload');

                    $config['file_name'] = 'a'.random_string('numeric',5);
                    $_POST['Image']       = $config['file_name'];               
                    
                    $base_dir            = $this->path.'articles'.'/'.$this->input->post('Id')."/";

                    @mkdir(set_realpath($base_dir,false), 0777, true);
                    @mkdir(set_realpath($base_dir,false), 0777, true);

                    $config['upload_path']   = './'.$base_dir;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '2000';

                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload('File'))
                    {
                        $this->message('Error on Upload File',$this->upload->display_errors(),'error');
                        redirect('/article/update_image/'.$this->input->post('Id'), 'refresh');
                    }
                    else
                    {
                        $upload_data    = $this->upload->data();
                        $_POST['Image'] .= $upload_data['file_ext'];

                        if(!$this->article_model->update_image($this->input))
                        {
                            $this->message('Error','Oh oh, algo ah salido mal, te recomendamos contactar al administrador del sistema','error');
                            redirect('/article/add', 'refresh');
                        }
                    }
                }
       
                $this->message('Éxito','Se ha completado el proceso de guardar','success');
                redirect('/article/', 'refresh');
            }
        }
    }

    public function update($id,$phase = 0)
    {
        $this->check_session();

        if(!$phase)
        {
            $row = $this->article_model->get_by_id($id);

            if($row == 0)
            {
                $this->message('Error','Oh oh, algo ah salido mal, estas intentando acceder a un Articulo que no Existe','error');
                redirect('/article/', 'refresh');
            }
            else
            {
                $row = $row[0];
                $this->load->view('backend/article/update',compact('controller','categories','row'));
            }
        }
        else
        {
            $this->form_validation->set_rules('Name'        ,'Nombre'      ,'trim|required|max_length[100]');
            $this->form_validation->set_rules('Slug'        ,'Url Amigable','trim|required');
            $this->form_validation->set_rules('Introduction','Introducción','trim|required');
            $this->form_validation->set_rules('Full_Text'   ,'Contenido'   ,'trim|required');
            $this->form_validation->set_rules('Category_Id' ,'Categoría'   ,'trim|required');

            $this->form_validation->set_message('required', '{field} es requerido para guardar el Articulo');
            $this->form_validation->set_message('max_length', '{field} solo puede tener máxima longitud de {param} Caracteres');

            if ($this->form_validation->run()==false)
            {
                $this->message('Error al Guardar','Verifique los campos para finalizar el proceso','error');
                redirect('/article/update/'.$this->input->post('Id'), 'refresh');
            }
            else
            {
                if($this->article_model->update($this->input))
                {
                    $this->message('Éxito','Se ha completado el proceso de actualizar','success');
                    redirect('/article/', 'refresh');
                }
                else
                {
                    $this->message('Error','Oh oh, algo ah salido mal, te recomendamos contactar al administrador del sistema','error');
                    redirect('/article/update/'.$this->input->post('Id'), 'refresh');
                }
            }
        }
    }

    public function delete($id)
    {
        $this->check_session();
        if($this->article_model->delete($id))
        {
            $this->message('Éxito','El Articulo ha sido eliminado exitosamente','success');
        }
        else
        {
            $this->message('Error','Oh oh, algo ah salido mal con el eliminar','error');
        }
        redirect('/article/', 'refresh');
    }
}