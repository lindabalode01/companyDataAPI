<?php
require_once 'vendor/autoload.php';

use App\ApiClient;
use App\CompanyData;

$api = new ApiClient();

foreach ($api->getCompanyInfo() as $company) {
    /** @var CompanyData $company */
    echo '----------------------------------------------' . PHP_EOL;
    echo '> Company name - ' . $company->getName() . PHP_EOL;
    echo '> Type - ' . $company->getType() . PHP_EOL;
    echo '> Address - ' . $company->getAddress() . PHP_EOL;
    echo '> Registration number - ' . $company->getRegNr() . PHP_EOL;
    echo '> Opened - ' . $company->getRegisterDate() . PHP_EOL;
    echo '> Terminated - ' . $company->getTerminated() . PHP_EOL;
    echo '----------------------------------------------' . PHP_EOL;
}

$usersChoise = (string)(readline('Enter 1 to search by name, Enter 2 to search by registration number! : '));
switch ($usersChoise) {
    case '1':
        $nameToSearch = (string)(readline('Enter name by which to search: '));
        $companyFound = $api->searchByName($nameToSearch);
        if ($companyFound != null) {
            echo '----------------------------------------------' . PHP_EOL;
            echo '> Company name - ' . $companyFound->getName() . PHP_EOL;
            echo '> Type - ' . $companyFound->getType() . PHP_EOL;
            echo '> Address - ' . $companyFound->getAddress() . PHP_EOL;
            echo '> Registration number - ' . $companyFound->getRegNr() . PHP_EOL;
            echo '> Opened - ' . $companyFound->getRegisterDate() . PHP_EOL;
            echo '> Terminated - ' . $companyFound->getTerminated() . PHP_EOL;
            echo '----------------------------------------------' . PHP_EOL;
        } else {
            echo 'Not found!' . PHP_EOL;
        }
        break;
    case '2';
        $regNumberToSearch = (int)(readline('Enter registration number to search for: '));
        $found = $api->searchByRegNr($regNumberToSearch);
        if ($found != null) {
            echo '----------------------------------------------' . PHP_EOL;
            echo '> Company name - ' . $found->getName() . PHP_EOL;
            echo '> Type - ' . $found->getType() . PHP_EOL;
            echo '> Address - ' . $found->getAddress() . PHP_EOL;
            echo '> Registration number - ' . $found->getRegNr() . PHP_EOL;
            echo '> Opened - ' . $found->getRegisterDate() . PHP_EOL;
            echo '> Terminated - ' . $found->getTerminated() . PHP_EOL;
            echo '----------------------------------------------' . PHP_EOL;
        } else {
            echo 'Not found!' . PHP_EOL;
        }
        break;
    default:
        echo 'Invalid option.' . PHP_EOL;

}




