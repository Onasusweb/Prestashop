<?php

class Blocktwittercycle extends Module
{
	/* @var boolean error */
	protected $error = false;
	
	public function __construct()
	{
	 	$this->name = 'blocktwittercycle';
	 	$this->tab = 'Custom Module';
	 	$this->version = '0.1';
		$this->author = 'SiteProjet.com';
		$this->need_instance = 0;

	 	parent::__construct();

        $this->displayName = $this->l('Blocktwittercycle');
        $this->description = $this->l('Affiche un bloc avec vos derniers tweets');
		$this->confirmUninstall = $this->l('Are you sure you want to delete blocktwittercycle ?');
	}
	
	public function install()
	{
	 	if (!parent::install() OR !$this->registerHook('rightColumn' ) || !Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_VAR', 'prestashop') )
	 		return false;
	}
	
	public function uninstall()
	{
	 	if (!parent::uninstall() || !Configuration::deleteByName('MOD_BLOCKTWITTERCYCLE_VAR') )
	 		return false;
	}
	
	public function hookRightColumn($params)
	{
	 	global $cookie, $smarty;
	 	$smarty->assign('TWITTERCYCLE_VAR', Configuration::get('MOD_BLOCKTWITTERCYCLE_VAR'));
		
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


  if(Tools::isSubmit('submitTutorial'))
  {
      Configuration::updateValue('MOD_BLOCKTWITTERCYCLE_VAR', Tools::getValue('TWITTERCYCLE_VAR'));
      $html .= $this->displayConfirmation($this->l('Settings updated.'));
  }

  $TWITTERCYCLE_VAR = Configuration::get('MOD_BLOCKTWITTERCYCLE_VAR');

  $html .= '<h2 style="text-align:center">'.$this->l('Twitter Cycle').'</h2>
  <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    <fieldset>
      <legend>'.$this->l('Settings').'</legend><p align="center"><b>
      '.$this->l('Therme à rechercher :').'
      <div align="center">
        <input style="text-align:center;" type="text" name="TWITTERCYCLE_VAR" value="'.$TWITTERCYCLE_VAR.'"/>
                <input class="button" type="submit" name="submitTutorial" value="'.$this->l('Enregistrer').'"/>
      <b></p>
      </div>
     
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