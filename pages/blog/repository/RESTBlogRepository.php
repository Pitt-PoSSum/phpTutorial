<?php
namespace pages\blog\repository;

class RESTBlogRepository implements BlogRepositoryInterface
{
    protected $restClient;
    private $infoDetails = [];
    private $restURL = 'http://phptutorial.localhost/restServer';

    public function __construct()
    {
        $this->restClient = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',

        );
        curl_setopt($this->restClient, CURLOPT_URL, $this->restURL);
        curl_setopt($this->restClient, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($this->restClient, CURLOPT_HEADER, 0);
        curl_setopt($this->restClient, CURLOPT_RETURNTRANSFER, true);
    }

    function __destruct()
    {
        curl_close($this->restClient);
    }

    public function getAllData()
    {
        curl_setopt($this->restClient, CURLOPT_CUSTOMREQUEST, 'GET' );
        $returnValue = json_decode(curl_exec($this->restClient), true);
        $this->setInfoDetails($returnValue);
        return $returnValue;
    }

    public function find($id)
    {
        curl_setopt($this->restClient, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt($this->restClient, CURLOPT_URL, $this->restURL.'?'.http_build_query(['id'=>$id]));
        $returnValue = json_decode(curl_exec($this->restClient), true);
        $this->setInfoDetails($returnValue);

        return $returnValue;
    }

    public function save(Blogdata $blogdata)
    {
        $returnValue = false;

        curl_setopt($this->restClient, CURLOPT_CUSTOMREQUEST, 'PUT' );
        curl_setopt($this->restClient, CURLOPT_POSTFIELDS,json_encode($blogdata));
        curl_setopt($this->restClient, CURLOPT_URL, $this->restURL);
        $returnJson = json_decode(curl_exec($this->restClient), true);
        $this->setInfoDetails($returnJson, $blogdata);
        if($returnJson && isset($returnJson['id'])){
            $returnValue = $returnJson['id'];
        }

        return $returnValue;
    }

    public function remove($id)
    {
        curl_setopt($this->restClient, CURLOPT_CUSTOMREQUEST, 'DELETE' );
        curl_setopt($this->restClient, CURLOPT_URL, $this->restURL.'?'.http_build_query(['id'=>$id]));
        $result = json_decode(curl_exec($this->restClient), true);
        $this->setInfoDetails($result);
    }

    private function setInfoDetails($response, $requestData = false){
        if(!$this->infoDetails) {
            $curlInfo = curl_getinfo($this->restClient);
            $this->infoDetails['requestHeader']['url'] = $curlInfo['url'];
            if ($requestData) {
                $this->infoDetails['requestBody'] = json_encode($requestData, JSON_PRETTY_PRINT);
            }

            $this->infoDetails['responseHeader']['header_size '] = curl_getinfo($this->restClient, CURLINFO_HEADER_SIZE);
            $this->infoDetails['responseHeader']['http_code '] = curl_getinfo($this->restClient, CURLINFO_RESPONSE_CODE);
            $this->infoDetails['responseHeader']['content_type'] = $curlInfo['content_type'];

            $this->infoDetails['responseBody'] = json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    public function getInfoDetails(){
        return $this->infoDetails;
    }
}