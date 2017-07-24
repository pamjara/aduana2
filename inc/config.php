<?php 
//Configuración general
$config = array(
	"titulo"=>"Aduana",
	"subtitulo"=>"Inicio",
	"url"=>"http://{$_SERVER['HTTP_HOST']}/aduana/", //Con / al final
	//"url" => "http://localhost/simpleCMS/",
	"charset"=>"utf-8",

	"friendlyurls"=>false,

	//Datos para la configuracion del envio de correo
	"emailadmin"=>"",
	"emailenvios"=>"",
	"nombreenvios"=>"aduana",
	"servidor"=>"localhost",
	"basedatos"=>"aduana",
	"usuario"=>"root",
	"pass"=>"1212",

	"googleanalytics"=>false,//Codigo UA- usado en las analiticas de Google
	"googlesiteverification"=>false,
	"mssiteverification"=>false
	); ?>