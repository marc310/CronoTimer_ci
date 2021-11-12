<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';

/**
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Marcelo Motta
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Info extends \Restserver\Libraries\REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['loja_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['produtos_get']['limit'] = 1000; // 500 requests per hour per user/key
        // $this->methods['menu_get']['limit'] = 1000; // 500 requests per hour per user/key
    }


    public function loja_get()
    {
        $this->load->model('Setting_model');

        $get_setting = $this->Setting_model->get_all_settings(); 

        $setting = array();

        foreach ($get_setting as $value)
        {
            $setting[] = array(
                // 'id' => intval($value['idsettings']),
                'title' => $value['web_title'],
                'description' => $value['description'],
                'slogan' => $value['slogan'],
                'tags' => $value['site_tags'],
                'url' => $value['site_url'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'logo_menu' => $value['logo_menu'],
                'logo_footer' => $value['logo_footer'],
            );
        }

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users
        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($setting)
            {
                // Set the response and exit
                $this->response($setting, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Nenhuma informação da loja encontrada.'
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

            if (!empty($setting))
            {
                foreach ($setting as $key => $value)
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
                    'message' => 'A informação que você está buscando não foi encontrada'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }


    // produtos
    public function produtos_get($sessao = FALSE)
    {
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->model('Ext_description_model');

        $sessao == 'todos' ? $sessao = 'all' : $sessao;
        if ($sessao == 'all'){
            $get_posts = $this->Product_model->get_all_products(); 
        }else if ( ($sessao != FALSE) && ($sessao != 'all') ) {
            $get_posts = $this->Product_model->get_all_products('', 1, $sessao); 
        }else{
            $get_posts = $this->Product_model->get_all_products('', 1); 
        }

        $posts = [];

        foreach ($get_posts as $value)
        {
            $id_prod = intval($value['idproducts']);
            $cat = $this->Category_model->get_all_product_category($id_prod);
            $desc = $this->Ext_description_model->get_all_by_product($id_prod, true);
            
            if( !empty($cat) ){
                if ($cat[0]['product_id'] == $id_prod) {
                    if(count($cat) > 1){
                        $category = [];
                        for ($i = 0; $i < count($cat); $i++){
                            $category[] = array(
                                'objetive_id' => $cat[$i]['id'],
                                'objetive_name' => $cat[$i]['cat_category_pt-br'],
                            );
        
                        }
                    } else {
                        $i = 0;
                        // set array clean before fill
                        $category = []; 
                        $category[] = array(
                            'objetive_id' => $cat[$i]['id'],
                            'objetive_name' => $cat[$i]['cat_category_pt-br'],
                        );
                    }
                }
            } else { 
                $category = NULL; 
            }

            if( !empty($desc) ){
                if ($desc[0]['pro_extra_id'] == $id_prod) {
                    if(count($desc) > 1){
                        $description = [];
                        for ($i = 0; $i < count($desc); $i++){
                            $description[] = array(
                                'id' => $desc[$i]['ide_description'],
                                'title' => $desc[$i]['ext_title'],
                                'description' => $desc[$i]['ext_description'],
                            ); 
                        }
                    } else {
                        $i = 0;
                        $description = [];
                        $description[] = array(
                            'id' => $desc[$i]['ide_description'],
                            'title' => $desc[$i]['ext_title'],
                            'description' => $desc[$i]['ext_description'],
                        ); 
                    }
                }
            } else { 
                $description = NULL; 
            }
            
            $posts [] = array(
                'id' => $id_prod,
                'name' => $value['pro_name'],
                'description' => $value['pro_description'],
                'text' => $value['pro_text'],
                'price' => $value['price'],
                'old_price' => $value['old_price'],
                'discount' => $value['discount'],
                'discount_value' => $value['discount_value'],
                'image' => $value['pro_image'],
                'extra_descriptions' => $description,
                'objectives' => $category,
                'destaque' => $value['pro_destaque'],
                'active' => $value['active'],
                // 'date' => $value['date_created'],
                // 'modified' => $value['modified'],
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
                    'err_message' => 'Nenhum Produto Encontrado.'
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
                    'err_message' => 'Produto não existe ou não está disponível'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function menu_get()
    {
        $this->load->model('Menu_model');

        $countPosts =  get_posts_count() > 0 ? true : false;
        $temProdutos = ( getSetting('show_products') == 1)  ? false : true;
        $temDestaques = ((getSetting('show_destaque') == 1) || (getSetting('show_discounts') == 1)) ? false : true;
        $temPromo = getSetting('show_promo') == 1 ? false : true ;
        $get_menu = $this->Menu_model->get_all_menu($countPosts, $temProdutos, $temDestaques, $temPromo);

        $menu = array();

        foreach ($get_menu as $value)
        {
            $menu[] = array(
                // 'id' => intval($value['idmenus']),
                'label' => $value['mnu_label_pt-br'],
                // 'label_pt' => $value['mnu_label_pt-br'],
                // 'label_en' => $value['mnu_label_en'],
                // 'label_fr' => $value['mnu_label_fr'],
                'link' => $value['mnu_link'],
            );
        }

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users
        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($menu)
            {
                // Set the response and exit
                $this->response($menu, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Nenhum item de menu encontrado.'
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

            if (!empty($menu))
            {
                foreach ($menu as $key => $value)
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
                    'message' => 'O menu que você está buscando não foi encontrado'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }


}