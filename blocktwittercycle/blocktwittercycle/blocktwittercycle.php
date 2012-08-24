<?php

class Blocktwittercycle extends Module
{
	/* @var boolean error */
	protected $error = false;
	
	public function __construct()
	{
	 	$this->name = 'blocktwittercycle';
	 	$this->tab = 'Custom Module';
	 	$this->version = '0.5';
		$this->author = 'SiteProjet.com';
		$this->need_instance = 0;

	 	parent::__construct();

        $this->displayName = $this->l('Blocktwittercycle');
        $this->description = $this->l('Affiche un bloc avec vos derniers tweets');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall blocktwittercycle ?');
	}
	
	public function install()
	{
	 	if (!parent::install() OR !$this->registerHook('rightColumn' ) || !Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_VAR', 'prestashop') || !Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_TIMEOUT', '5000') || !Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_DATE', 'true') )
	 		return false;
	}
	
	public function uninstall()
	{
	 	if (!parent::uninstall() || !Configuration::deleteByName('MOD_BLOCKTWITTERCYCLE_VAR') || !Configuration::deleteByName('MOD_BLOCKTWITTERCYCLE_TIMEOUT') || !Configuration::deleteByName('MOD_BLOCKTWITTERCYCLE_DATE') )
	 		return false;
	}
	
	public function hookRightColumn($params)
	{
	 	global $cookie, $smarty;
	 	$smarty->assign('TWITTERCYCLE_TIMEOUT', Configuration::get('MOD_BLOCKTWITTERCYCLE_TIMEOUT'));
	 	$smarty->assign('TWITTERCYCLE_VAR', Configuration::get('MOD_BLOCKTWITTERCYCLE_VAR'));
	 	$smarty->assign('TWITTERCYCLE_DATE', Configuration::get('MOD_BLOCKTWITTERCYCLE_DATE'));

		
		$smarty->assign(array(
		));
		
		return $this->display(__FILE__, 'blocktwittercycle.tpl');
	}

	public function hookLeftColumn( $params )
	{
		return $this->hookRightColumn( $params );
	}
	
	

	public function getContent()
    {
  $html = '';


  if(Tools::isSubmit('submitBlockTwitter'))
  {
      Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_VAR', Tools::getValue('TWITTERCYCLE_VAR'));
      Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_TIMEOUT', Tools::getValue('TWITTERCYCLE_TIMEOUT'));
      Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_DATE', Tools::getValue('TWITTERCYCLE_DATE'));
      $html .= $this->displayConfirmation($this->l('Settings updated.'));
  }

  $TWITTERCYCLE_VAR = Configuration::get('MOD_BLOCKTWITTERCYCLE_VAR');
  $TWITTERCYCLE_TIMEOUT = Configuration::get('MOD_BLOCKTWITTERCYCLE_TIMEOUT');
  $TWITTERCYCLE_DATE = Configuration::get('MOD_BLOCKTWITTERCYCLE_DATE');

  $html .= '<h2 style="text-align:center">'.$this->l('Twitter Cycle').'</h2>
  <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    <fieldset>
      <legend>'.$this->l('Settings').'</legend>

<div class="SiteProjetTable" >
	<table >
		<tr> 
			<td colspan="2">
				Paramètres
			</td>
		</tr>
		<tr>
			<td >
'.$this->l('Therme à rechercher :').'
			</td>
			<td>
<input style="text-align:center;" type="text" name="TWITTERCYCLE_VAR" value="'.$TWITTERCYCLE_VAR.'"/>
			</td>
		</tr>
		<tr>
			<td >
'.$this->l('Vitesse en ms (ex : 5000, 2000, ...) :').'
			</td>
			<td>
<input style="text-align:center;" type="text" name="TWITTERCYCLE_TIMEOUT" value="'.$TWITTERCYCLE_TIMEOUT.'"/>
			</td>
		</tr>
		<tr>
			<td >
'.$this->l('Afficher le timing (true : oui; false: non):').'
			</td>
			<td>
<input style="text-align:center;" type="text" name="TWITTERCYCLE_DATE" value="'.$TWITTERCYCLE_DATE.'"/>
			</td>
		</tr>
	</table>
</div>

<br />
<p align="center"><input class="button" type="submit" name="submitBlockTwitter" value="'.$this->l('Enregistrer').'"/></p>
								

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