<?php
class index extends Controller
{
	function __construct() {
		require CORE.'TBLink.php';
	}

	function denglurenci() {
		$rihuo = new TBLink('rihuo');
		$rs = $rihuo->query('SELECT * FROM rihuo order by date desc limit 7');
		$data['rihuo'] = array_reverse($rs);
		$this->display('denglurenci.php',$data);
	}

}
?>