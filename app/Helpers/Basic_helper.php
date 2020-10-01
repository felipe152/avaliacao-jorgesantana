<?php 

function testLogin(){
	$session = session();
	if ($session->get('user') === NULL) {
		return false;
	}
	return true;
}