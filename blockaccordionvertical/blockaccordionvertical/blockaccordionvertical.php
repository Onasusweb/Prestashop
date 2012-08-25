<?php

class Blockaccordionvertical extends Module
{
	/* @var boolean error */
	protected $error = false;
	
	public function __construct()
	{
	 	$this->name = 'blockaccordionvertical';
	 	$this->tab = 'Custom Module';
	 	$this->version = '0.1';
		$this->author = 'SiteProjet.com';
		$this->need_instance = 0;

	 	parent::__construct();

        $this->displayName = $this->l('Blockaccordionvertical');
        $this->description = $this->l('Images dans un block vertical en accordéon avec animations jquery.');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall blockaccordionvertical ?');
	}
	
	public function install()
	{
	 	if (!parent::install() OR !$this->registerHook('rightColumn' ) || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T1', 'Première zone de texte') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T2', 'Seconde zone de texte') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T3', 'Troisième zone de texte') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T4', 'Quatrième zone de texte') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U1', 'http://SiteProjet.com') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U2', 'http://SiteProjet.com') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U3', 'http://SiteProjet.com') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U4', 'http://SiteProjet.com') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L1', '{$modules_dir}blockaccordionvertical/img/accordion_menu_street1.jpg') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L2', '{$modules_dir}blockaccordionvertical/img/accordion_menu_nature1.jpg') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L3', '{$modules_dir}blockaccordionvertical/img/accordion_menu_landscape1.jpg') || !Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L4', '{$modules_dir}blockaccordionvertical/img/accordion_menu_air1.jpg')  )
	 		return false;
	}
	
	public function uninstall()
	{
	 	if (!parent::uninstall() || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_T1') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_T2') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_T3') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_T4') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_U1') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_U2') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_U3') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_U4') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_L1') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_L2') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_L3') || !Configuration::deleteByName('MOD_BLOCKACCORDIONVERTICAL_L4') )
	 		return false;
	}
	
	public function hookRightColumn($params)
	{
	 	global $cookie, $smarty;
	 	$smarty->assign('ACCORDIONVERTICAL_T1', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T1'));
	 	$smarty->assign('ACCORDIONVERTICAL_T2', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T2'));
	 	$smarty->assign('ACCORDIONVERTICAL_T3', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T3'));
	 	$smarty->assign('ACCORDIONVERTICAL_T4', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T4'));

	 	$smarty->assign('ACCORDIONVERTICAL_U1', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U1'));
	 	$smarty->assign('ACCORDIONVERTICAL_U2', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U2'));
	 	$smarty->assign('ACCORDIONVERTICAL_U3', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U3'));
	 	$smarty->assign('ACCORDIONVERTICAL_U4', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U4'));

	 	$smarty->assign('ACCORDIONVERTICAL_L1', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L1'));
	 	$smarty->assign('ACCORDIONVERTICAL_L2', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L2'));
	 	$smarty->assign('ACCORDIONVERTICAL_L3', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L3'));
	 	$smarty->assign('ACCORDIONVERTICAL_L4', Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L4'));

		
		$smarty->assign(array(
		));
		
		return $this->display(__FILE__, 'blockaccordionvertical.tpl');
	}

	public function hookLeftColumn( $params )
	{
		return $this->hookRightColumn( $params );
	}
	
	

	public function getContent()
    {
  $html = '';


  if(Tools::isSubmit('submitBlockAccordion'))
  {
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T1', Tools::getValue('ACCORDIONVERTICAL_T1'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T2', Tools::getValue('ACCORDIONVERTICAL_T2'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T3', Tools::getValue('ACCORDIONVERTICAL_T3'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_T4', Tools::getValue('ACCORDIONVERTICAL_T4'));

      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U1', Tools::getValue('ACCORDIONVERTICAL_U1'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U2', Tools::getValue('ACCORDIONVERTICAL_U2'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U3', Tools::getValue('ACCORDIONVERTICAL_U3'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_U4', Tools::getValue('ACCORDIONVERTICAL_U4'));

      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L1', Tools::getValue('ACCORDIONVERTICAL_L1'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L2', Tools::getValue('ACCORDIONVERTICAL_L2'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L3', Tools::getValue('ACCORDIONVERTICAL_L3'));
      Configuration::updateValue('MOD_BLOCKACCORDIONVERTICAL_L4', Tools::getValue('ACCORDIONVERTICAL_L4'));


      $html .= $this->displayConfirmation($this->l('Settings updated.'));
  }

  $ACCORDIONVERTICAL_T1 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T1');
  $ACCORDIONVERTICAL_T2 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T2');
  $ACCORDIONVERTICAL_T3 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T3');
  $ACCORDIONVERTICAL_T4 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_T4');

  $ACCORDIONVERTICAL_U1 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U1');
  $ACCORDIONVERTICAL_U2 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U2');
  $ACCORDIONVERTICAL_U3 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U3');
  $ACCORDIONVERTICAL_U4 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_U4');

  $ACCORDIONVERTICAL_L1 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L1');
  $ACCORDIONVERTICAL_L2 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L2');
  $ACCORDIONVERTICAL_L3 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L3');
  $ACCORDIONVERTICAL_L4 = Configuration::get('MOD_BLOCKACCORDIONVERTICAL_L4');

  $html .= '<h2 style="text-align:center">'.$this->l('Module Accordéon Vertical').'</h2>
  <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    <fieldset>
      <legend>'.$this->l('Settings').'</legend>

<div class="SiteProjetTable" >
	<table ><b>
		<tr> 
			<td colspan="3">
				Paramètres
			</td>
		</tr>
		<tr>
			<td >
'.$this->l('Texte').'
			</td>
			<td>
URL de l\'image
			</td>
			<td>
Lien de l\'image
			</td>
		</tr>
		<tr>
			<td >
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_T1" value="'.$ACCORDIONVERTICAL_T1.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_U1" value="'.$ACCORDIONVERTICAL_U1.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_L1" value="'.$ACCORDIONVERTICAL_L1.'"/>
			</td>
		</tr>
		<tr>
			<td >
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_T2" value="'.$ACCORDIONVERTICAL_T2.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_U2" value="'.$ACCORDIONVERTICAL_U2.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_L2" value="'.$ACCORDIONVERTICAL_L2.'"/>
			</td>
		</tr>
		<tr>
			<td >
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_T3" value="'.$ACCORDIONVERTICAL_T3.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_U3" value="'.$ACCORDIONVERTICAL_U3.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_L3" value="'.$ACCORDIONVERTICAL_L3.'"/>
			</td>
		</tr>
		<tr>
			<td >
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_T4" value="'.$ACCORDIONVERTICAL_T4.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_U4" value="'.$ACCORDIONVERTICAL_U4.'"/>
			</td>
			<td>
<input style="text-align:center;" type="text" name="ACCORDIONVERTICAL_L4" value="'.$ACCORDIONVERTICAL_L4.'"/>
			</td>
		</tr>
	<b></table>
</div>

<br />
<p align="center"><input class="button" type="submit" name="submitBlockAccordion" value="'.$this->l('Enregistrer').'"/></p>
								

<style>
.SiteProjetTable {

	margin-left: auto;
	margin-right: auto;
	width:500px;
	box-shadow: 10px 10px 5px #888888;

	border:1px solid #000000;

	

	-moz-border-radius-bottomleft:0px;

	-webkit-border-bottom-left-radius:0px;

	border-bottom-left-radius:0px;

	

	-moz-border-radius-bottomright:0px;

	-webkit-border-bottom-right-radius:0px;

	border-bottom-right-radius:0px;

	

	-moz-border-radius-topright:0px;

	-webkit-border-top-right-radius:0px;

	border-top-right-radius:0px;

	

	-moz-border-radius-topleft:0px;

	-webkit-border-top-left-radius:0px;

	border-top-left-radius:0px;

}.SiteProjetTable table{

	width:100%;

	height:100%;

	margin:0px;padding:0px;

}.SiteProjetTable tr:last-child td:last-child {

	-moz-border-radius-bottomright:0px;

	-webkit-border-bottom-right-radius:0px;

	border-bottom-right-radius:0px;

}

.SiteProjetTable table tr:first-child td:first-child {

	-moz-border-radius-topleft:0px;

	-webkit-border-top-left-radius:0px;

	border-top-left-radius:0px;

}

.SiteProjetTable table tr:first-child td:last-child {

	-moz-border-radius-topright:0px;

	-webkit-border-top-right-radius:0px;

	border-top-right-radius:0px;

}.SiteProjetTable tr:last-child td:first-child{

	-moz-border-radius-bottomleft:0px;

	-webkit-border-bottom-left-radius:0px;

	border-bottom-left-radius:0px;

}.SiteProjetTable tr:hover td{

	

}
.SiteProjetTable tr:nth-child(odd){ background-color:#e5e5e5; }

.SiteProjetTable tr:nth-child(even)    { background-color:#ffffff; }
.SiteProjetTable td{

	vertical-align:middle;

	

	

	border:1px solid #000000;

	border-width:0px 1px 1px 0px;

	text-align:left;

	padding:7px;

	font-size:14px;

	font-family:Arial;

	font-weight:normal;

	color:#000000;

}.SiteProjetTable tr:last-child td{

	border-width:0px 1px 0px 0px;

}.SiteProjetTable tr td:last-child{

	border-width:0px 0px 1px 0px;

}.SiteProjetTable tr:last-child td:last-child{

	border-width:0px 0px 0px 0px;

}

.SiteProjetTable tr:first-child td{

		background:-o-linear-gradient(bottom, #4c4c4c 5%, #000000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4c4c4c), color-stop(1, #000000) );
	background:-moz-linear-gradient( center top, #4c4c4c 5%, #000000 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#4c4c4c", endColorstr="#000000");	background: -o-linear-gradient(top,#4c4c4c,000000);


	background-color:#4c4c4c;

	border:0px solid #000000;

	text-align:center;

	border-width:0px 0px 1px 1px;

	font-size:14px;

	font-family:Arial;

	font-weight:bold;

	color:#ffffff;

}

.SiteProjetTable tr:first-child:hover td{

	background:-o-linear-gradient(bottom, #4c4c4c 5%, #000000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4c4c4c), color-stop(1, #000000) );
	background:-moz-linear-gradient( center top, #4c4c4c 5%, #000000 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#4c4c4c", endColorstr="#000000");	background: -o-linear-gradient(top,#4c4c4c,000000);


	background-color:#4c4c4c;

}

.SiteProjetTable tr:first-child td:first-child{

	border-width:0px 0px 1px 0px;

}

.SiteProjetTable tr:first-child td:last-child{

	border-width:0px 0px 1px 1px;

}
</style>



    </fieldset>
  </form>';
  return $html;

    }
	
	private function _displayForm()
	{
	 	global $cookie;
	 	/* Language */
	 	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'text¤title';

	 	$this->_html .= '';
	}
}
?>