<?php
namespace pages\blog\repository;

class SOAPBlogRepository implements BlogRepositoryInterface
{
    protected $soapClient;
    private $infoDetails = [];

    public function __construct()
    {
        /*
        $url = "http://phptutorial.localhost/blog";
        //$url = "http://www.google.de";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_PORT, 8080);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($curl);

        var_dump($response);
        exit();
*/

        $wsdl = 'http://phptutorial.localhost:8080/pages/soapServer/rules.wsdl';
        $this->soapClient = new \SoapClient($wsdl, array('soap_version' => SOAP_1_2,'trace' => 1 ));
    }

    public function getAllData()
    {
        $returnValue = $this->soapClient->getAllBlogData();
        $this->setInfoDetails();

        return $returnValue;
    }

    public function find($id)
    {
        $returnValue = $this->soapClient->getBlogData($id);
        $this->setInfoDetails();

        return $returnValue;
    }

    public function save(Blogdata $blogdata)
    {
        $returnValue = false;

        if ($newId = $this->soapClient->setBlogData($blogdata)){
            $returnValue = $newId;
        }
        $this->setInfoDetails();

        return $returnValue;
    }

    public function remove($id)
    {
        $this->soapClient->deleteBlogData($id);
        $this->setInfoDetails();
    }

    protected function setInfoDetails(){
        if(!$this->infoDetails) {
            $this->infoDetails['getLastRequestHeaders'] = $this->soapClient->__getLastRequestHeaders();
            $this->infoDetails['getLastRequest'] = $this->formatXml($this->soapClient->__getLastRequest());
            $this->infoDetails['getLastResponseHeaders'] = $this->soapClient->__getLastResponseHeaders();
            $this->infoDetails['getLastResponse'] = $this->formatXml($this->soapClient->__getLastResponse());
        }
    }

    public function getInfoDetails(){
        return $this->infoDetails;
    }

    private function formatXml($value){
        $returnValue = '';
        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        if($dom->loadXML($value)) {
            $dom->formatOutput = TRUE;
            $returnValue = $dom->saveXML();
        }
        return $returnValue;
    }
}