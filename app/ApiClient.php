<?php

namespace App;

use GuzzleHttp\Client;

class ApiClient
{
    public Client $client;
    public array $companies;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCompanyInfo(): array
    {
        $url = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=50';
        $response = $this->client->request('GET', $url);
        $companyData = json_decode($response->getBody()->getContents());
        $this->companies = [];
        foreach ($companyData->result->records as $record) {
            $this->companies[] = new CompanyData(
                $record->name_in_quotes,
                $record->type,
                $record->address,
                $record->regcode,
                $record->registered,
                $record->terminated
            );
        }
        return $this->companies;
    }

    public function searchByName(string $name): ?CompanyData
    {
        $nameToUperCase = strtoupper($name);
        foreach ($this->companies as $company) {
            /** @var CompanyData $company */
            if ($company->getName() == $nameToUperCase) {
                return $company;
            }
        }
        return null;
    }

    public function searchByRegNr(int $regNumber): ?CompanyData
    {
        foreach ($this->companies as $company) {
            /** @var CompanyData $company */
            if ($company->getRegNr() == $regNumber) {
                return $company;
            }
        }
        return null;
    }

}