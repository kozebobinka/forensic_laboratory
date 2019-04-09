<?

include 'includes/safemysql.php';
$main_page = FALSE;
$docs_page = FALSE;
switch ($_SERVER['SERVER_NAME']) {
	case "audit.peritus.ru" :
		$db = new SafeMySQL(array("user" => "peritu6z_audit", "pass" => "8&icsKur", "db" => "peritu6z_audit"));
		break;
	case "build.peritus.ru" :
		$db = new SafeMySQL(array("user" => "peritu6z_build", "pass" => "UhcIyI4K", "db" => "peritu6z_build"));
		break;
	case "docs.peritus.ru" :
		$db = new SafeMySQL(array("user" => "peritu6z_docs", "pass" => "oN7*GPOj", "db" => "peritu6z_docs"));
		break;
	default :
		$db = new SafeMySQL(array("user" => "peritu6z_main", "pass" => "6i*MtQC1", "db" => "peritu6z_main"));
}