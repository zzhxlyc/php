<?php

/**
 * Check whether serialized data is of string type.
 *
 * @since wordpress 2.0.5
 *
 * @param mixed $data Serialized data
 * @return bool False if not a serialized string, true if it is.
 */
function is_serialized_string( $data ) {
	// if it isn't a string, it isn't a serialized string
	if ( !is_string( $data ) )
		return false;
	$data = trim( $data );
	$length = strlen( $data );
	if ( $length < 4 )
		return false;
	elseif ( ':' !== $data[1] )
		return false;
	elseif ( ';' !== $data[$length-1] )
		return false;
	elseif ( $data[0] !== 's' )
		return false;
	elseif ( '"' !== $data[$length-2] )
		return false;
	else
		return true;
}

function _serialize($obj, $rm_html = true){
	$obj = _serialize_encode($obj, $rm_html);
	return serialize($obj);
}

function _unserialize($obj){
	$obj = unserialize($obj);
	return _serialize_decode($obj);
}

function _serialize_encode($obj, $rm_html = true){
	if(is_array($obj)){
		foreach($obj as $k => $v){
			$obj[$k] = _serialize_encode($v, $rm_html);
		}
		return $obj;
	}
	else if(is_string($obj)){
		if($rm_html == true){
			$obj = htmlspecialchars($obj);
		}
		return base64_encode(addslashes($obj));
	}
	else{
		return $obj; 
	}
}

function _serialize_decode($obj){
	if(is_array($obj)){
		foreach($obj as $k => $v){
			$obj[$k] = _serialize_decode($v);
		}
		return $obj;
	}
	else if(is_string($obj)){
		return stripslashes(base64_decode($obj));
	}
	else{
		return $obj; 
	}
}
