<?php


/**
 * Cytonn Technologies.
 *
 * @author Ndirangu Wilson <wndirangu@Cytonn.com>
 */

 trait GetAttribute {
     public function get_attribute($data,$attribute) {
       $attribute_content= array();
         for ($i=0;$i <count($data); $i++) {
          array_push($attribute_content,$data[$i]->resource->fields->$attribute);
         }
         return $attribute_content;
     }
 }


class Get_Yahoo_Data{

use GetAttribute;

    private $URL = 'http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json';
    private $price;
    private $symbol;
    private $time;
    private $json;

    private function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function decode_json_object()
    {
        $jason_obj = json_decode($this->file_get_contents_curl($this->URL));
        $result = $jason_obj->list->resources;
        $this->json= $result;
        return $result;
    }

    public function get_price()
    {

        $this->price=$this->get_attribute($this->decode_json_object(),"price");
        return $this->price;
    }
    public function get_name()
    {

        $this->symbol=$this->get_attribute($this->decode_json_object(),"name");
        return $this->symbol;
    }
    public function get_time()
    {

        $this->time=$this->get_attribute($this->decode_json_object(),"utctime");
        return $this->time;
    }
}
$get = new Get_Yahoo_Data();
//var_dump($get->decode_json_object());
var_dump($get->get_price());
