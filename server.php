<?php

require_once "lib/nusoap.php";

$server = new soap_server();

$server->configureWSDL('server', 'urn:server');

$server->register('getnim',                // method name
    array('nim' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),    // output parameters
    'urn:server',                    // namespace
    'urn:server#ambilnama',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Says hello to the caller'            // documentation
);

function getnim($nim) {
    include "koneksi.php";
	$hasil = mysqli_query($koneksi, "select * from mahasiswa where nim =$nim");
	$data = mysqli_fetch_row($hasil);
	$m = 'nim= '.$data[0].'nama= '.$data[1].'progdi= '.$data[2];
	return 'Hasil query ' .$m;
}
// $hasil = getnim(8);
// print_r($hasil);

// $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
// ? $HTTP_RAW_POST_DATA : '';
// $server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));


?>