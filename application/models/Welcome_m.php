<?php
class Welcome_m extends CI_Model
{

    public function get_short_url()
    {
        $long_url = $this
            ->input
            ->post('long_url');
        $url = urldecode($long_url);
        if (filter_var($url, FILTER_VALIDATE_URL)) return base_url() . "?" . $this
            ->Welcome_m
            ->GetShortUrl($url);
        else return ("Not a valid URL");

    }

    public function GetShortUrl($url)
    {
        $query = $this
            ->db
            ->query("SELECT short_code FROM url_shorten WHERE url ='$url'");

        if ($query->num_rows() > 0)
        {
            $res = $query->row();
            return $res->short_code;

        }
        else
        {
            $short_code = $this
                ->Welcome_m
                ->generateUniqueID();
            $query = $this
                ->db
                ->query("INSERT INTO url_shorten (url,short_code, hits) VALUES ('$url','$short_code','0')");
            if ($query === true) return $short_code;
            else return ("Unknown Error Occured");

        }

    }

    public function generateUniqueID()
    {
        $token = substr(md5(uniqid(rand() , true)) , 0, 6);
        $query = $this
            ->db
            ->query("SELECT * FROM url_shorten WHERE short_code ='$token'");

        if ($query->num_rows() > 0) generateUniqueID();
        else return $token;

    }

    public function reterive_orginal_url($short_code)
    {
        $query = $this
            ->db
            ->query("SELECT url FROM url_shorten WHERE short_code ='$short_code'");
        if ($query->num_rows() > 0)
        {
            $res = $query->row();
            return $res->url;

        }
        else return ('Short URL not valid');

    }

    public function reterive_data()
    {
        $base=base_url();
        $query = $this
            ->db
            ->query("SELECT id,url,CONCAT('$base?',short_code) as
      short_code,hits,date_format(added_date,'%d-%m-%y %h:%i %p') as added_date FROM `url_shorten`");

        return $query;
    }

    public function get_redirect_url($params)
    {
        $query = $this
            ->db
            ->query("SELECT url,hits FROM url_shorten WHERE short_code ='$params'");
        if ($query->num_rows() > 0)
        {
            $res = $query->row();
            $hits = ($res->hits) + 1;
            $query = $this
                ->db
                ->query("update url_shorten set hits='$hits' WHERE short_code ='$params'");
            return $res->url;

        }
        else return 0;

    }

}

