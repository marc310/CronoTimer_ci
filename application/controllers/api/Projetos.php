<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';

/**
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Marcelo Motta
 */
class Projetos extends \Restserver\Libraries\REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['info_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['produtos_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['produtos_post']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function info_get($limite = FALSE)
    {
        $this->load->model('Projeto_model');
        // $params['limit'] = $limite; 
        // $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        // $config = $this->config->item('pagination');
        // $config['base_url'] = site_url('projeto/index?');
        // $config['total_rows'] = $this->Projeto_model->get_all_projetos_count();
        // $config['per_page'] = $limite; 

        // $this->pagination->initialize($config);

        // $get_projetos = $this->Projeto_model->get_all_projetos($params);
        $get_projetos = $this->Projeto_model->get_all_projetos();

        $posts = [];

        foreach ($get_projetos as $value)
        {
            $id_projeto = intval($value['id_projeto']);
            // $cat = $this->Category_model->get_all_product_category($id_projeto);
            
            // if( !empty($cat) ){
            //     if ($cat[0]['product_id'] == $id_projeto) {
            //         if(count($cat) > 1){
            //             $category = [];
            //             for ($i = 0; $i < count($cat); $i++){
            //                 $category[] = array(
            //                     'objetive_id' => $cat[$i]['id'],
            //                     'objetive_name' => $cat[$i]['cat_category_pt-br'],
            //                 );
        
            //             }
            //         } else {
            //             $i = 0;
            //             // set array clean before fill
            //             $category = []; 
            //             $category[] = array(
            //                 'objetive_id' => $cat[$i]['id'],
            //                 'objetive_name' => $cat[$i]['cat_category_pt-br'],
            //             );
            //         }
            //     }
            // }
            // else { 
            //     $category = NULL; 
            // }
            
            $posts [] = array(
                'id' => $id_projeto,
                'name' => $value['nome_projeto'],
                'description' => $value['descricao_projeto'],
                'price' => $value['preco_projeto'],
                'cliente_id' => $value['cliente_id'],
            );

        }

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users
        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($posts)
            {
                // Set the response and exit
                $this->response($posts, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'err_message' => 'Nenhum Projeto Encontrado.'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $user = NULL;

            if (!empty($posts))
            {
                foreach ($posts as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $user = $value;
                    }
                }
            }

            if (!empty($user))
            {
                $this->set_response($user, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'err_message' => 'O Projeto não existe ou não está disponível'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }


    // public function categoria_get($category)
    // {
    //     $this->load->model('Post_model');

    //     $get_posts = $this->Post_model->get_posts_by_category($category); 

    //     $posts = array();

    //     foreach ($get_posts as $value)
    //     {
    //         $posts[] = array(
    //             'id' => intval($value['id_post']),
    //             'title' => $value['pos_title'],
    //             'image' => $value['pos_image'],
    //             'cover' => $value['pos_cover_image'],
    //             'description' => $value['pos_description'],
    //             'sub_description' => $value['pos_sub_description'],
    //             'ext_description' => $value['pos_ext_description'],
    //             'text' => $value['pos_text'],
    //             'id-category' => $value['category_id'],
    //             'category' => $value['cat_category_pt-br'],
    //             'id-author' => $value['pos_author'],
    //             'author' => $value['first_name'] . ' ' . $value['last_name'],
    //             'tags' => $value['pos_tags'],
    //             'date' => $value['pos_date'],
    //             'exp_date' => $value['exp_date'],
    //             // 'active' => $value['active'],
    //         );
    //     }

    //     $id = $this->get('id');

    //     // If the id parameter doesn't exist return all the users
    //     if ($id === NULL)
    //     {
    //         // Check if the users data store contains users (in case the database result returns NULL)
    //         if ($posts)
    //         {
    //             // Set the response and exit
    //             $this->response($posts, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //         else
    //         {
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => FALSE,
    //                 'err_message' => 'No posts were found on this category'
    //             ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //         }
    //     }

    //     // Find and return a single record for a particular user.
    //     else {
    //         $id = (int) $id;

    //         // Validate the id.
    //         if ($id <= 0)
    //         {
    //             // Invalid id, set the response and exit.
    //             $this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    //         }

    //         // Get the user from the array, using the id as key for retrieval.
    //         // Usually a model is to be used for this.

    //         $user = NULL;

    //         if (!empty($posts))
    //         {
    //             foreach ($posts as $key => $value)
    //             {
    //                 if (isset($value['id']) && $value['id'] === $id)
    //                 {
    //                     $user = $value;
    //                 }
    //             }
    //         }

    //         if (!empty($user))
    //         {
    //             $this->set_response($user, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //         else
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'err_message' => 'User could not be found'
    //             ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //         }
    //     }
    // }


    // public function recent_posts_get()
    // {
    //     $this->load->model('Post_model');

    //     $get_posts = $this->Post_model->get_recent_posts('3, 3', 1); 

    //     $posts = array();

    //     foreach ($get_posts as $value)
    //     {
    //         $posts[] = array(
    //             'id' => intval($value['id_post']),
    //             'title' => $value['pos_title'],
    //             'image' => $value['pos_image'],
    //             'cover' => $value['pos_cover_image'],
    //             'description' => $value['pos_description'],
    //             'text' => $value['pos_text'],
    //             'id-category' => $value['category_id'],
    //             'category' => $value['cat_category_pt-br'],
    //             'id-author' => $value['pos_author'],
    //             'author' => $value['first_name'] . ' ' . $value['last_name'],
    //             'tags' => $value['pos_tags'],
    //             'date' => $value['pos_date'],
    //             'active' => $value['active'],
    //         );
    //     }

    //     $id = $this->get('id');

    //     // If the id parameter doesn't exist return all the users
    //     if ($id === NULL)
    //     {
    //         // Check if the users data store contains users (in case the database result returns NULL)
    //         if ($posts)
    //         {
    //             // Set the response and exit
    //             $this->response($posts, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //         else
    //         {
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => FALSE,
    //                 'err_message' => 'No Recent Posts were found'
    //             ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //         }
    //     }

    //     // Find and return a single record for a particular user.
    //     else {
    //         $id = (int) $id;

    //         // Validate the id.
    //         if ($id <= 0)
    //         {
    //             // Invalid id, set the response and exit.
    //             $this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    //         }

    //         // Get the user from the array, using the id as key for retrieval.
    //         // Usually a model is to be used for this.

    //         $user = NULL;

    //         if (!empty($posts))
    //         {
    //             foreach ($posts as $key => $value)
    //             {
    //                 if (isset($value['id']) && $value['id'] === $id)
    //                 {
    //                     $user = $value;
    //                 }
    //             }
    //         }

    //         if (!empty($user))
    //         {
    //             $this->set_response($user, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //         else
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'err_message' => 'User could not be found'
    //             ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //         }
    //     }
    // }


}