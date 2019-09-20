<?php
/**
 * PingApi
 * PHP version 5
 *
 * @category Class
 * @package  RusticiSoftware\Cloud\V2
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * SCORM Cloud Rest API
 *
 * REST API used for SCORM Cloud integrations.
 *
 * OpenAPI spec version: 2.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace RusticiSoftware\Cloud\V2\Api;

use \RusticiSoftware\Cloud\V2\ApiClient;
use \RusticiSoftware\Cloud\V2\ApiException;
use \RusticiSoftware\Cloud\V2\Configuration;
use \RusticiSoftware\Cloud\V2\ObjectSerializer;

/**
 * PingApi Class Doc Comment
 *
 * @category Class
 * @package  RusticiSoftware\Cloud\V2
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PingApi
{
    /**
     * API Client
     *
     * @var \RusticiSoftware\Cloud\V2\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \RusticiSoftware\Cloud\V2\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\RusticiSoftware\Cloud\V2\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \RusticiSoftware\Cloud\V2\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \RusticiSoftware\Cloud\V2\ApiClient $apiClient set the API client
     *
     * @return PingApi
     */
    public function setApiClient(\RusticiSoftware\Cloud\V2\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation pingAppId
     *
     * 
     *
     * @throws \RusticiSoftware\Cloud\V2\ApiException on non-2xx response
     * @return \RusticiSoftware\Cloud\V2\Model\PingSchema
     */
    public function pingAppId()
    {
        list($response) = $this->pingAppIdWithHttpInfo();
        return $response;
    }

    /**
     * Operation pingAppIdWithHttpInfo
     *
     * 
     *
     * @throws \RusticiSoftware\Cloud\V2\ApiException on non-2xx response
     * @return array of \RusticiSoftware\Cloud\V2\Model\PingSchema, HTTP status code, HTTP response headers (array of strings)
     */
    public function pingAppIdWithHttpInfo()
    {
        // parse inputs
        $resourcePath = "/ping";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\RusticiSoftware\Cloud\V2\Model\PingSchema',
                '/ping'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\RusticiSoftware\Cloud\V2\Model\PingSchema', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\RusticiSoftware\Cloud\V2\Model\PingSchema', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
