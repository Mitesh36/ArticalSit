<?php
class Admin extends MY_Controller{



 public function index(){

   
    $this->form_validation->set_rules('uname','username','required');
    $this->form_validation->set_rules('pass','password','required|max_length[10]');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    if( $this->form_validation->run() )
    {
       
        $uname=$this->input->post('uname');
        $pass=$this->input->post('pass');
        
        $this->load->model('loginmodel');
      
        $id=$this->loginmodel->isValidate($uname,$pass);
        if($id)
        {
         
           // $this->load->library('session');
          $this->session->set_userdata('id',$id);  
          return redirect('Admin/welcome');
        }
        else
        {
           // echo "sorry wrng id pass word111";
           // $this->load->view('Admin/login');
           $this->session->set_flashdata('login_failed','Invalid Username or Password');
           return redirect('Admin/index');
        }
    }    
    else
    {
       // echo "sorry wrng id pass word";
       $this->load->view('Admin/login');
       
     }
 }

public function welcome(){
    
    if(!$this->session->userdata('id')){ 
       return redirect('Admin/index');
    }
    $this->load->model('loginmodel');
    $articles = $this->loginmodel->articleList();
    $this->load->view('Admin/dashboard',['articles'=>$articles]);

 }
 public function logout(){
    $this->session->unset_userdata('id');  
    return redirect('Admin/index');
 }

public function addArticle(){
    if(!$this->session->userdata('id')){ 
        return redirect('Admin/index');
     }
    $this->load->view('Admin/add_articles');
}

public function signUp(){
    

    
    $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
    $this->form_validation->set_rules('password','Password','required|max_length[10]');
    $this->form_validation->set_rules('firstname','First Name','required|max_length[10]');
    $this->form_validation->set_rules('lastname','Last Name','required|max_length[10]');
    $this->form_validation->set_error_delimiters('<div class="text-warning">','</div>');
    
    if( $this->form_validation->run() )
    {
        
        $post=$this->input->post();
        $this->load->model('loginmodel');
        if($this->loginmodel->regUser($post))
        {
            $this->session->set_flashdata('user_added','Succesfully Registered...');
            return redirect('Admin/signUp');
        }
      
    }
    
    $this->load->view('Admin/reg');
    




}



public function insertArt(){


    $this->form_validation->set_rules('article_title','Article Title','required|alpha');
    $this->form_validation->set_rules('article_body','Article Body','required|max_length[250]');
    $this->form_validation->set_error_delimiters('<div class="text-warning">','</div>');
   
    if($this->form_validation->run())
    {
        
        $post=$this->input->post();
        $this->load->model('loginmodel');
        if($this->loginmodel->addArt($post))
        {
         
            $this->session->set_flashdata('Art_added','Article Added...');
            return redirect('Admin/insertArt');
        }
        else
        {
           
            $this->load->view('Admin/add_articles');
        }

    }
    else{
        $this->load->view('Admin/add_articles');
    }
}



public function delArt(){

    $post=$this->input->post('id');
   // print_r($post);
    //exit;
    $this->load->model('loginmodel');
    if($this->loginmodel->del($post))
    {
        
        $this->session->set_flashdata('Art_del','Article Deleted...');
        $this->session->set_flashdata('msg_class','alert alert-success');
        
    }
    else
    {
        $this->session->set_flashdata('Art_del','Article Not Deleted...');
        $this->session->set_flashdata('msg_class','alert alert-danger');
    }
    return redirect('Admin/welcome');
}

public function editArt(){

    $post=$this->input->post('id');
    $this->load->model('loginmodel');
    $res=$this->loginmodel->findArt($post);
    $this->load->view('Admin/edit_articles',['articles'=> $res]);
   // echo "<pre>";
  //  print_r($res);
}

public function updateArt($articles){

    
    //echo $articles;
    $post=$this->input->post();
    //print_r($post);
    //exit;

    //$artid=$post['acticle_id'];
    //exit;
    $this->load->model('loginmodel');
    if($this->loginmodel->upArt($articles,$post))
    {
        $this->session->set_flashdata('Art_up','Article Added...');
        $this->session->set_flashdata('msg_class','alert alert-success');
    }
    else
    {
        $this->session->set_flashdata('Art_up','Article Not Added...');
        $this->session->set_flashdata('msg_class','alert alert-danger');
   }
   return redirect('Admin/welcome');
}
}
?>