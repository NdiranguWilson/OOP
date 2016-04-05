<?php
namespace Traits;
/**
 * Cytonn Technologies.
 *
 * @author Ndirangu Wilson <wndirangu@Cytonn.com>
 */

 trait GetAttribute {
     public function get_attribute($data,$attribute) {
       $attribute_content;
         for ($i=0; $i <count($data) ; $i++) {
          $array_push( $attribute_content,$data[i]->resource->fields->$attribute);
         }
         return $attribute_content;
     }
 }
 ?>
