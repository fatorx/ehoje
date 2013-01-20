<?php
/**
* UTILIZADO COMO REFERENCIA:
* https://github.com/lecterror/cakephp-filter-plugin/blob/26a6c2ef1299bdd4f8e59850a0f2b7e229896fd2/Test/Case/AllTest.php
*/

class AllControllersTest extends PHPUnit_Framework_TestSuite {
	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('All Controller tests');

		$suite->addTestFile(dirname(__FILE__).DS.'UsuariosControllerTest.php');
		$suite->addTestFile(dirname(__FILE__).DS.'ReceitasControllerTest.php');
		$suite->addTestFile(dirname(__FILE__).DS.'DespesasControllerTest.php');

		return $suite;
	}
        
}