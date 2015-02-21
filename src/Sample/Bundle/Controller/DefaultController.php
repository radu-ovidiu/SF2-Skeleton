<?php

/* Add in app/config/routing.yml :

sample:
    resource: "@SampleBundle/Resources/config/routing.yml"
    prefix:   /

*/

namespace Sample\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller {


	public function indexAction() {

		return $this->render(
			'SampleBundle:Default:index.html.twig',
			array(
				'app_title' => 'Sample Module',
				'symfony_version' => '2.6.4' // this must get real version !!
			)
		);

	} //END FUNCTION


	public function mainsamplesAction($mode, $extra) {

		return $this->render(
			'SampleBundle:Default:main-samples.html.twig',
			array(
				'title' => 'Sample Module',
				'mode' => $mode,
				'extra' => $extra,
				'data' => array()
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