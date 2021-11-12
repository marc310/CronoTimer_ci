<?php
/**
 * Name:    CodeX Upload Library
 * Author:  Marcelo Motta
 *          marcelomotta.dev@gmail.com
 *
 *
 * Created:  17.01.2020
 *
 * Description:  This helps controller to upload with some extra functions to send email
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-CodeX-Upload
 * @author     Marcelo Motta
 * @link       Private Repository: marcelomotta.com
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

define('RENAME_F', 1); 

/**
 * Class Upload Library
 */
class Sendmail_lib
{
    /**
     * __construct
     *
     * @author Marcelo Motta
     */


	public function __construct()
	{
        
    }
    
    public function sendMail()
    {
        $ci =& get_instance();
        $ci->config->load('ion_auth');
        $email_config = $ci->config->item('admin_email', 'ion_auth');

        $errors = array();

        // Check if name has been entered
        if (!isset($_POST['name'])) {
            $errors['name'] = 'Por favor insira seu nome.';
        }
    
        // Check if email has been entered and is valid
        if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Por favor entre com um e-mail válido.';
        }
    
        //Check if message has been entered
        if (!isset($_POST['message'])) {
            $errors['message'] = 'Por favor insira sua mensagem.';
        }

        //Check if message has been entered
        if (!isset($_POST['telefono'])) {
            $errors['message'] = 'Por favor insira sua mensagem.';
        }
    
        //Check if message has been entered
        if (!isset($_POST['ciudad'])) {
            $errors['message'] = 'Por favor insira sua mensagem.';
        }

        $errorOutput = '';
    
        if(!empty($errors)){
    
            $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
             $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    
            $errorOutput  .= '<ul>';
    
            foreach ($errors as $key => $value) {
                $errorOutput .= '<li>'.$value.'</li>';
            }
    
            $errorOutput .= '</ul>';
            $errorOutput .= '</div>';
    
            echo $errorOutput;
            die();
        }
    
    
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $ciudad = $_POST['ciudad'];
        $message = $_POST['message'];
        $from = $email;
        // $to = 'marcelomotta.dev@gmail.com';  // please change this email id
        $to = $email_config;
        $subject = 'Contato : App Me Website';
    
        $body = "De: $name\n E-Mail: $email\n Teléfono: $telefono  \n Ciudad: $ciudad\n Menssagem:\n $message";
    
        $headers = "From: ".$from;
    
    
        //send the email
        $result = '';
        if (mail ($to, $subject, $body, $headers)) {
            $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
             $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $result .= 'E-mail enviado com sucesso! Obrigado, entraremos em contato em breve';
            $result .= '</div>';
    
            echo $result;
            die();
        }
    
        $result = '';
        $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= 'Alguma coisa aconteceu errado enquanto seu e-mail era enviado. Por favor tente mais tarde';
        $result .= '</div>';
    
        echo $result;
    }


}