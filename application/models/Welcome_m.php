<?php
class Welcome_m extends CI_Model
{

   public function get_short_url()
   {
        $long_url=$this->input->post('long_url');
        $url=urldecode($long_url);
                if (filter_var($url, FILTER_VALIDATE_URL)) 
                   return base_url()."short/".$this->Welcome_m->GetShortUrl($url);
                else 
                   return ("Not a valid URL");
                
   }


   public function GetShortUrl($url)
   {
    $query=$this->db->query("SELECT short_code FROM url_shorten WHERE url ='$url'");

    if ($query->num_rows() > 0)
     {
        $res = $query->row();
        return $res->short_code;
             
     } 
   else 
     {
            $short_code =$this->Welcome_m->generateUniqueID();
            $sql = "INSERT INTO url_shorten (url, short_code, hits) VALUES ('".$url."', '".$short_code."', '0')";
            $query=$this->db->query("INSERT INTO url_shorten (url,short_code, hits) VALUES ('$url','$short_code','0')");
            if ($query === TRUE) 
                return $short_code;
            else 
                 return ("Unknown Error Occured");
   
     }


   }

   public function generateUniqueID()
   {
        $token = substr(md5(uniqid(rand(), true)),0,6); 
        $query=$this->db->query( "SELECT * FROM url_shorten WHERE short_code ='$token'");

        if ($query->num_rows() > 0) 
           generateUniqueID();
        else 
           return $token;
         
   }
   
}