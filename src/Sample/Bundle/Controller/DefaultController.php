<?php

/* Add in app/config/routing.yml :

sample:
    resource: "@SampleBundle/Resources/config/routing.yml"
    prefix:   /

*/

namespace Sample\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller {


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

		if((string)$mode == 'sqlite3') {
			$data = array();
			if((string)$extra == 'list') {
				$data[] = array(
					'id' => '1',
					'name' => 'Name "1"',
					'description' => "Description '1'"
				);
			} else {
				$data[] = array(
					'total' => '1'
				);
			} //end if else
		} else {
			$data = array();
		} //end if else

		return $this->render(
			'SampleBundle:Default:main-samples.html.twig',
			array(
				'title' => 'Sample Module',
				'mode' => $request->get('mode'), // or can use $mode
				'extra' => $extra,
				'data' => $data
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

		$json_data = @json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

		return $this->render(
			'SampleBundle:Default:json.json.twig',
			array('json_data' => $json_data)
		);

	} //END FUNCTION


} //END CLASS

//end php code
?>