<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
				'errors' => [
					'Mandatory field Name is not filled',
					'Mandatory field BIC is not filled',
					'Mandatory field BankName is not filled',
					'Mandatory field CorrespAcc is not filled',
					'Mandatory field PersonalAcc is not filled'
					]
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				],
				'errors' => [
					'Mandatory field Name is not filled',
					'Mandatory field BIC is not filled',
					'Mandatory field BankName is not filled',
					'Mandatory field CorrespAcc is not filled',
					'Mandatory field PersonalAcc is not filled'
				]
			],
			'filled incorrectly' => [
				[
					'Name' =>'NameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameNameName',
					'BIC'=>'BICBICBICBIC',
					'BankName'=>'BankNameBankNameBankNameBankNameBankNameBankNameBankNameBankName',
					'CorrespAcc'=>'CorrespondentAccountCorrespondentAccountCorrespondentAccount',
					'PersonalAcc'=>'PersonalAccountPersonalAccountPersonalAccountPersonalAccount'
				],
				'errors' => [
					"The value of Name is too long",
					"The value of BIC is too long",
					"The value of BankName is too long",
					"The value of CorrespAcc is too long",
					"The value of PersonalAcc is too long"
				]
			]
		];
	}

	public function getDataSamples(): array
	{
		return ['empty' => [
					[],
					'ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc='
				],
				'filled' => [
					['samples%Text', 'some data', 'samples~Text||'],
					'ST00012_Name=_PersonalAcc=_BankName=_BIC=_CorrespAcc=_0=samples%Text_1=some data_2=samples~Text||'
				],
				'filled with exceptions' =>[
					['|', '~', '_', '#', '$' , '^', '&', '*', '/', '`', '@', '%'],
					'ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=|0=||1=~|2=_|3=#|4=$|5=^|6=&|7=*|8=/|9=`|10=@|11=%'
				]

		];
	}
	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 * @param array $errors
	 */
	public function testValidateFail(array $fields, array $errors): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();

		$errorMassages = $result->getErrorMessages();

		foreach ($errors as $error){
			static:: assertContains($error, $errorMassages);
		}
		static::assertFalse($result->isSuccess());
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$dataGenerator
			->setName('Name')
			->setBIC('BIC')
			->setBankName('BankName')
			->setCorrespondentAccount('CorrespondentAccount')
			->setPersonalAccount('PersonalAccount')
		;

		$result = $dataGenerator->validate();

		static::assertTrue($result->isSuccess());
	}
	/**
	 * @dataProvider getDataSamples
	 * @param array $fields
	 * @param string $result
	 */
	public function testGetData(array $fields, string $result): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals($result, $data);
	}
}
