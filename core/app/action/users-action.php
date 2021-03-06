<?php
if (isset($_SESSION["id"])) {
	if (isset($_GET["opt"]) && $_GET["opt"] == "add") {
		if (count($_POST) > 0) {
			$user = new UserData();
			$user->id = $_POST["id"];
			$user->nombre = $_POST["nombre"];
			$user->apellidos = $_POST["apellidos"];
			$user->email = $_POST["email"];
			$user->dni = $_POST["dni"];
			$user->kind = $_POST["kind"];
			$user->add();
			Core::alert("Usuario agreado correctamente!");
			Core::redir("./?view=prof_tutor&opt=all");
		}
	} else if (isset($_GET["opt"]) && $_GET["opt"] == "upd") {
		if (count($_POST) > 0) {
			$user = UserData::getById($_POST["id"]);
			$user->nombre = $_POST["nombre"];
			$user->apellidos = $_POST["apellidos"];
			$user->dni = $_POST["dni"];
			$user->email = $_POST["email"];
			$user->update();

			if ($_POST["password"] != "") {
				$user->password = sha1(md5($_POST["password"]));
				$user->update_passwd();
				Core::alert("Se ha actualizado el password!");
			}
			Core::alert("Usuario actualizado!");
			Core::redir("./?view=users&opt=all");
		}
	} else if (isset($_GET["opt"]) && $_GET["opt"] == "del") {
		$user = UserData::getById($_GET["id"]);
		if ($user->id != $_SESSION["id"]) {
			$user->del();
		}
		Core::alert("Usuario eliminado!");
		Core::redir("./?view=users&opt=all");
	}
}
