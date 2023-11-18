<?php
function role($value=''){
	 $arr = array(
      "1"=>'User',
      "2"=>'Vendor',
    
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}
function confirm($value=''){
   $arr = array(
      "0"=>'Not Confirmed',
      "1"=>'Confirmed',
    
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}
function status($value=''){
   $arr = array(
      "0"=>'Hide',
      "1"=>'Show',
    
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}
function bid_status($value=''){
   $arr = array(
      "0"=>'Closed',
      "1"=>'Open',
    
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}

function user_testing(){
   $arr = array(
      "114"=>'Ankit',
      "115"=>'Bhupendra',
      "116"=>'Chirag',
      "117"=>'Deepak',
    
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}

function state($value=''){
  $arr = array(
      "1"=>'Andhra Pradesh',
      "2"=>'Arunachal Pradesh',
      "3"=>'Assam',
      "4"=>'Bihar',
      "5"=>'Chhattisgarh',
      "6"=>'Haryana',
      "7"=>'Himachal Pradesh',
      "8"=>'Goa',
      "9"=>'Gujarat',
      "10"=>'Jharkhand',
      "11"=>'Karnataka',
      "12"=>'Kerala',
      "13"=> 'Madhya Pardesh',
      "14"=> 'Maharashtra',
      "15"=> 'Manipur',
      "16"=> 'Meghalaya',
      "17"=> 'Mizoram',
      "18"=> 'Nagaland',
      "19"=> 'Odisha',
      "20"=> 'Punjab',
      "21"=> 'Rajasthan',
      "22"=> 'Sikkim',
      "23"=> 'Tamil Nadu',
      "24"=> 'Telangana',
      "25"=> 'Tripura',
      "26"=> 'Uttar Pradesh',
      "27"=> 'Uttarakhand',
      "28"=> 'West Bengal',
      "29"=> 'Telangana',
      "30"=> 'New Delhi',
      "31"=> 'Mizoram',
         
      
  );
  if(empty($value))
    return $arr;
  return $arr[$value];
}

function unit($value=''){
  $arr = array(
      "1"=>'METER',
      "2"=>'LOT',
      "3"=>'CFT',
      "4"=>'CMT',
      "5"=>'EACH',
      "6"=>'KG',
      "7"=>'MT',
      "8"=>'PIECES',
      "9"=>'SQ FT',
      "10"=>'VEHICLE',
  );
  if(empty($value))
    return $arr;
  return $arr[$value];
}

function type($value='')
{
    $arr = array(
      "01"=> 'E-Auction',
      "02"=>'Direct Sell',
      "03"=>'Sale Notice',
      "04"=> 'Auction',
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
}

function color_for_tag($value=''){
  $arr = array(
      "01"=> 'bg bg-primary',
      "02"=>'bg bg-success',
      "03"=>'bg bg-danger',
      "04"=> 'bg bg-warning',
    );
    if(empty($value))
      return $arr;
    return $arr[$value];
} 

function slug($text,$table='') {
  $ci =& get_instance();
      $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $text));

      // Check if the slug already exists in the database
      $ci->db->where('slug', $slug);
      $query = $ci->db->get($table);

      if ($query->num_rows() === 0) {
          return $slug; // Slug is unique, no need for modification
      }

      // Slug already exists, add a unique identifier
      $counter = 1;
      while (true) {
          $newSlug = $slug . '-' . $counter;

          // Check if the new slug exists in the database
          $ci->db->where('slug', $newSlug);
          $query = $ci->db->get($table);

          if ($query->num_rows() === 0) {
              return $newSlug; // Found a unique slug
          }

          $counter++;
      }
}

function convertScientificToFullNumber($scientificNotation) {
  $decimalPlaces = strlen(substr(strrchr($scientificNotation, "."), 0));
  return number_format($scientificNotation, $decimalPlaces);
}

function response($msg="",$code,$data=array()){

    $result['message'] = $msg;
    $result['status']  = $code;
    $result['data']  = $data;
    return $result;
}


function is_admin_login(){
  $ci =& get_instance();
  if(!$ci->session->has_userdata('admin_id'))
    redirect(base_url('admin/login'));
}

function is_vendor_login(){
  $ci =& get_instance();
  if(!$ci->session->has_userdata('vendor_id'))
    redirect(base_url('vendor/login'));
}


function is_user_login(){
  $ci =& get_instance();

  if(!$ci->session->userdata('logined')){
    redirect(base_url('login'));
  }
  else return $ci->session->userdata('user_id');
  
}


function validMobileNumber($number=""){
  $pattern = "/^\+(?:[0-9] ?){6,14}[0-9]$/";
    return preg_match($pattern, $number) === 1;
}
