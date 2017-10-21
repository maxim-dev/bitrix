<?

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Error;
use Bitrix\Main\Context;
use Bitrix\Main\UserConsent\AgreementLink;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

Loc::loadMessages(__FILE__);

class MainUserConsentViewComponent extends CBitrixComponent
{
	/** @var ErrorCollection $errors */
	protected $errors;

	protected function checkRequiredParams()
	{
		return true;
	}

	protected function initParams()
	{
		if (!isset($this->arParams['PARAMS']))
		{
			$this->arParams['PARAMS'] = Context::getCurrent()->getRequest()->toArray();
		}
		if (!is_array($this->arParams['PARAMS']))
		{
			$this->arParams['PARAMS'] = array();
		}
	}

	protected function prepareResult()
	{
		$agreement = AgreementLink::getAgreementFromUriParameters($this->arParams['PARAMS']);
		if (!$agreement)
		{
			//use user-friendly text instead of AgreementLink::getErrors();
			$this->errors->add(array(new Error(Loc::getMessage('MAIN_USER_CONSENT_VIEW_ERROR'))));
			return false;
		}
		else
		{
			$this->arResult['TEXT'] = $agreement->getText();
		}

		return true;
	}

	protected function printErrors()
	{
		foreach ($this->errors as $error)
		{
			ShowError($error);
		}
	}

	public function executeComponent()
	{
		$this->errors = new \Bitrix\Main\ErrorCollection();
		$this->initParams();
		if (!$this->checkRequiredParams())
		{
			$this->printErrors();
			return;
		}

		if (!$this->prepareResult())
		{
			$this->printErrors();
			return;
		}

		$this->includeComponentTemplate();
	}
}