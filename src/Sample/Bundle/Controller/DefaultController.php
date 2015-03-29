<?php
// Symfony2 Module / Controller :: Sample
// author: radu-ovidiu
// 2015-02-25

/* Add in app/config/routing.yml :
main:
    resource: "@SampleBundle/Resources/config/routing.yml"
*/

namespace Sample\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller {


	public function getConfigurationParameter($parameter) {
		return $this->container->getParameter((string)$parameter);
	} //END FUNCTION


	public function indexAction() {

		return $this->render(
			'SampleBundle:Default:index.html.twig',
			array(
				'app_title' => 'Sample Module',
				'symfony_version' => \Symfony\Component\HttpKernel\Kernel::VERSION
			)
		);

	} //END FUNCTION


	public function mainsamplesAction(Request $request, $mode, $extra) {

		$data = array();
		$count = 0;
		if((string)$mode == 'sqlite3') {
			$model = new \Sample\Bundle\Model\DefaultModel($this);
			if((string)$extra == 'list') {
				$count = $model->writeQuery('UPDATE table_main_sample SET dtime = ? WHERE id < ?', array(date('Y-m-d H:i:s O'), '9'));
				$data = $model->readQuery('SELECT * FROM table_main_sample WHERE id < ?', array('9'));
			} else {
				$count = $model->countQuery('SELECT COUNT(1) FROM table_main_sample');
			} //end if else
		} //end if

		return $this->render(
			'SampleBundle:Default:main-samples.html.twig',
			array(
				'title' => 'Sample Module',
				'mode' => $request->get('mode'), // or can use $mode
				'extra' => $extra,
				'data' => $data,
				'count' => $count
			)
		);

	} //END FUNCTION


	public function bootstrapsamplesAction() {

		return $this->render(
			'SampleBundle:Default:bootstrap-samples.html.twig',
			array(
			)
		);

	} //END FUNCTION


	public function jsonAction($mode) {

		$data = array(
				'status' => 'OK',
				'message' => 'JSON page Status is OK',
				'unicode_test' => 'Unicode String: ( áâãäåāăąÁÂÃÄÅĀĂĄ ćĉčçĆĈČÇďĎ èéêëēĕėěęÈÉÊËĒĔĖĚĘ ĝģĜĢĥħĤĦ ìíîïĩīĭȉȋįÌÍÎÏĨĪĬȈȊĮĳĵĲĴķĶĺļľłĹĻĽŁ ñńņňÑŃŅŇóôõöōŏőøœÒÓÔÕÖŌŎŐØŒ ŕŗřŔŖŘșşšśŝßȘŞŠŚŜțţťȚŢŤùúûüũūŭůűųÙÚÛÜŨŪŬŮŰŲ ŵŴẏỳŷÿýẎỲŶŸÝźżžŹŻŽ )'
		);

		$json_data = \UXM\Utils::json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

		return $this->render(
			'SampleBundle:Default:json.json.twig',
			array('json_data' => $json_data)
		);

	} //END FUNCTION


	public function benchmarkAction() {

		return $this->render(
			'SampleBundle:Default:benchmark.html.twig',
			array(
			)
		);

	} //END FUNCTION


} //END CLASS

//end php code
?>