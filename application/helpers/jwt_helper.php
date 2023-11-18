<?php
class JWT{

	static function verify($token,$key = JWT_KEY){
		$token_part = explode('.',$token);

		$signature = hash_hmac('sha256',$token_part[0].$token_part[1],$key);
		if($signature==$token_part[2]) return false;

		$payload = json_decode(base64_decode($token_part[1]),true);

		return $payload;
	}
}