<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
session_start();
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer('./templates');
function DBConnection(){
	return new PDO('mysql:dbhost=localhost;dbname=primabase', 'root', '');
}

//MIDDLEWARE
$middleware1 = (function ($request, $response, $next) {
	$loggedIn = $_SESSION['isLoggedIn'];
	if ($loggedIn != 'admin') {
		return $response->withRedirect("/formLogin");
	}
	$response = $next($request, $response);
	return $response;
});
$middleware2 = (function ($request, $response, $next) {
	$loggedIn = $_SESSION['isLoggedIn'];
	if ($loggedIn != 'user') {
		return $response->withRedirect("/formLogin");
	}
	$response = $next($request, $response);
	return $response;
});

//TEMPLATES
$app->get('/formLogin', function ($request, $response){
	return $this->renderer->render($response, '/formLogin.php');
});
$app->get('/home', function ($request, $response){
	return $this->renderer->render($response, '/home.php');
})->add($middleware1);
$app->get('/formTenant', function ($request, $response){
	return $this->renderer->render($response, '/formTenant.php');
})->add($middleware1);
$app->get('/formInsertTenant', function ($request, $response){
	return $this->renderer->render($response, '/formInsertTenant.php');
})->add($middleware1);
$app->get('/formUpdateTenant', function ($request, $response){
	return $this->renderer->render($response, '/formUpdateTenant.php');
})->add($middleware1);
$app->get('/formLogger', function ($request, $response){
	return $this->renderer->render($response, '/formLogger.php');
})->add($middleware1);
$app->get('/formInsertLogger', function ($request, $response){
	return $this->renderer->render($response, '/formInsertLogger.php');
})->add($middleware1);
$app->get('/formUpdateLogger', function ($request, $response){
	return $this->renderer->render($response, '/formUpdateLogger.php');
})->add($middleware1);
$app->get('/formPos', function ($request, $response){
	return $this->renderer->render($response, '/formPos.php');
})->add($middleware1);
$app->get('/formInsertPos', function ($request, $response){
	return $this->renderer->render($response, '/formInsertPos.php');
})->add($middleware1);
$app->get('/formUpdatePos', function ($request, $response){
	return $this->renderer->render($response, '/formUpdatePos.php');
})->add($middleware1);
$app->get('/formPeriodic', function ($request, $response){
	return $this->renderer->render($response, '/formPeriodic.php');
})->add($middleware1);

$app->get('/homeUser', function ($request, $response){
	return $this->renderer->render($response, '/homeUser.php');
})->add($middleware2);

//LOGIN
$app->post('/login', function ($request, $response) {
	$username = $request->getParsedBody()['username'];
	$password = $request->getParsedBody()['password'];
	$ps = (DBConnection()->query("select password from user where username = '".$username."' LIMIT 1")->fetch());
	$ut = (DBConnection()->query("select usertype from user where username = '".$username."' LIMIT 1")->fetch());
	$db_ps = $ps['password'];
	$db_ut = $ut['usertype'];
	if($password === $db_ps && $db_ut === "admin"){
		$_SESSION['isLoggedIn'] = 'admin';
		session_regenerate_id();
		$response = $response->withRedirect("/home");
		return $response;
	}else if($password === $db_ps && $db_ut === "user"){
		$_SESSION['isLoggedIn'] = 'user';
		$_SESSION['username'] = $username;
		session_regenerate_id();
		$response = $response->withRedirect("/homeUser");
		return $response;
	}
	else{
		$message = "Username atau Password Anda Salah !";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->renderer->render($response, '/formLogin.php');
	}
});

//LOGOUT
$app->get('/logout', function ($request, $response, $args) {
	unset($_SESSION['isLoggedIn']);
	unset($_SESSION['username']);
	session_regenerate_id();
	$response = $response->withRedirect("/formLogin");
	return $response;
});

//CRUD TENANT
//READ TENANT
$app->get('/showTenant', function ($request, $response, $args){
	echo json_encode(DBConnection()->query("select * from tenant")->fetchAll());
});
//INSERT TENANT
$app->post('/insertTenant', function ($request, $response, $args) {
	$name = $request->getParsedBody()['name'];
	$addr = $request->getParsedBody()['addr'];
	DBConnection()->exec("insert into tenant values('".$name."','".$addr."');");
	$response = $response->withRedirect("/formTenant");
	return $response;
});
//UPDATE TENANT
$app->map(['PUT', 'POST'],'/updateTenant/{name}', function ($request, $response, $args) {
	$addr = $request->getParsedBody()['addr'];
	DBConnection()->exec("update tenant set addr = '".$addr."' where name = '".$args['name']."';");
	$response = $response->withRedirect("/formTenant");
	return $response;
});
//DELETE TENANT
$app->map(['DELETE', 'GET'],'/hapusTenant/{name}', function ($request, $response, $args) {
	DBConnection()->exec("delete from tenant where name = '".$args['name']."';");
	$response = $response->withRedirect("/formTenant");
	return $response;
});

//CRUD LOGGER
//READ LOGGER
$app->get('/showLogger', function ($request, $response, $args){
	echo json_encode(DBConnection()->query("select * from logger")->fetchAll());
});
//INSERT LOGGER
$app->post('/insertLogger', function ($request, $response, $args) {
	$sn = $request->getParsedBody()['sn'];
	DBConnection()->exec("insert into logger values('".$sn."');");
	$response = $response->withRedirect("/formLogger");
	return $response;
});
//UPDATE LOGGER
$app->map(['PUT', 'POST'],'/updateLogger/{sn}', function ($request, $response, $args) {
	$sn = $request->getParsedBody()['sn'];
	DBConnection()->exec("update logger set sn = '".$sn."' where sn = '".$args['sn']."';");
	$response = $response->withRedirect("/formLogger");
	return $response;
});
//DELETE LOGGER
$app->map(['DELETE', 'GET'],'/hapusLogger/{sn}', function ($request, $response, $args) {
	DBConnection()->exec("delete from logger where sn = '".$args['sn']."';");
	$response = $response->withRedirect("/formLogger");
	return $response;
});

//CRUD POS
//READ POS
$app->get('/showPos', function ($request, $response, $args){
	echo json_encode(DBConnection()->query("select * from pos")->fetchAll());
});
//INSERT POS
$app->post('/insertPos', function ($request, $response, $args) {
	$nama = $request->getParsedBody()['nama'];
	$lonlat = $request->getParsedBody()['lonlat'];
	$desa = $request->getParsedBody()['desa'];
	$kec = $request->getParsedBody()['kec'];
	$kab = $request->getParsedBody()['kab'];
	$pengamat = $request->getParsedBody()['pengamat'];
	DBConnection()->exec("insert into pos values('".$nama."','".$lonlat."','".$desa."','".$kec."','".$kab."','".$pengamat."');");
	$response = $response->withRedirect("/formPos");
	return $response;
});
//UPDATE POS
$app->map(['PUT', 'POST'],'/updatePos/{nama}', function ($request, $response, $args) {
	$lonlat = $request->getParsedBody()['lonlat'];
	$desa = $request->getParsedBody()['desa'];
	$kec = $request->getParsedBody()['kec'];
	$kab = $request->getParsedBody()['kab'];
	$pengamat = $request->getParsedBody()['pengamat'];
	DBConnection()->exec("update pos set lonlat = '".$lonlat."',desa = '".$desa."',kec = '".$kec."',kab = '".$kab."',pengamat = '".$pengamat."' where nama = '".$args['nama']."';");
	$response = $response->withRedirect("/formPos");
	return $response;
});
//DELETE POS
$app->map(['DELETE', 'GET'],'/hapusPos/{nama}', function ($request, $response, $args) {
	DBConnection()->exec("delete from pos where nama = '".$args['nama']."';");
	$response = $response->withRedirect("/formPos");
	return $response;
});

//VIEW PERIODIC
//READ POS
$app->get('/showPeriodic', function ($request, $response, $args){
	echo json_encode(DBConnection()->query("select * from periodic order by sampling desc")->fetchAll());
});

$app->run();
?>
