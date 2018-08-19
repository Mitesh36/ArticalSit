<?php

class loginmodel extends CI_model{


    public function isValidate($username,$password){

       // $username=$this->$username;
       // $password=$this->$password;

        $q=$this->db->where(['username'=>$username,'password'=>$password])
                 ->get('users');

                // echo "<pre>";
                //print_r($q->row());
                 
               if($q->num_rows())
                 {
                     return $q->row()->id;
                 }
                 else
                 {
                     return false;
                 }


    }
    
    public function articleList(){

        $id=$this->session->userdata('id');

        $q=$this->db->select('')
                  ->from('articles')
                  ->where(['id'=>$id])
                  ->get();
        return $q->result();

    }

    public function addArt($array){

      return $this->db->insert('articles',$array);
    }

    public function regUser($array){

        return $this->db->insert('users',$array);
      }

      public function del($array){
        return $this->db->delete('articles',['acticle_id'=>$array]);
      }

      public function findArt($artid){
        $q=$this->db->select(['acticle_id','article_title','article_body'])
                 ->where(['acticle_id'=>$artid])
                 ->get('articles');
                 return $q->row();
      }

      public function upArt($articlesid, Array $art){
        return $this->db->where('acticle_id',$articlesid)
                  ->update('articles',$art);
      }
}

?>