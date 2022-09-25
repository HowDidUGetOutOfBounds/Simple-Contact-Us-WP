<?php
/**
 * GDPRApi
 * PHP version 7.3
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Objects
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CRM Objects
 *
 * CRM objects such as companies, contacts, deals, line items, products, tickets, and quotes are standard objects in HubSpot’s CRM. These core building blocks support custom properties, store critical information, and play a central role in the HubSpot application.  ## Supported Object Types  This API provides access to collections of CRM objects, which return a map of property names to values. Each object type has its own set of default properties, which can be found by exploring the [CRM Object Properties API](https://developers.hubspot.com/docs/methods/crm-properties/crm-properties-overview).  |Object Type |Properties returned by default | |--|--| | `companies` | `name`, `domain` | | `contacts` | `firstname`, `lastname`, `email` | | `deals` | `dealname`, `amount`, `closedate`, `pipeline`, `dealstage` | | `products` | `name`, `description`, `price` | | `tickets` | `content`, `hs_pipeline`, `hs_pipeline_stage`, `hs_ticket_category`, `hs_ticket_priority`, `subject` |  Find a list of all properties for an object type using the [CRM Object Properties](https://developers.hubspot.com/docs/methods/crm-properties/get-properties) API. e.g. `GET https://api.hubapi.com/properties/v2/companies/properties`. Change the properties returned in the response using the `properties` array in the request body.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Objects\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Crm\Objects\ApiException;
use HubSpot\Client\Crm\Objects\Configuration;
use HubSpot\Client\Crm\Objects\HeaderSelector;
use HubSpot\Client\Crm\Objects\ObjectSerializer;

/**
 * GDPRApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Objects
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class GDPRApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation purgeByEmail
     *
     * DELETE
     *
     * @param  string $object_type object_type (required)
     * @param  string $email email (required)
     *
     * @throws \HubSpot\Client\Crm\Objects\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function purgeByEmail($object_type, $email)
    {
        $this->purgeByEmailWithHttpInfo($object_type, $email);
    }

    /**
     * Operation purgeByEmailWithHttpInfo
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  string $email (required)
     *
     * @throws \HubSpot\Client\Crm\Objects\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function purgeByEmailWithHttpInfo($object_type, $email)
    {
        $request = $this->purgeByEmailRequest($object_type, $email);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Objects\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation purgeByEmailAsync
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  string $email (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purgeByEmailAsync($object_type, $email)
    {
        return $this->purgeByEmailAsyncWithHttpInfo($object_type, $email)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation purgeByEmailAsyncWithHttpInfo
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  string $email (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purgeByEmailAsyncWithHttpInfo($object_type, $email)
    {
        $returnType = '';
        $request = $this->purgeByEmailRequest($object_type, $email);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'purgeByEmail'
     *
     * @param  string $object_type (required)
     * @param  string $email (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function purgeByEmailRequest($object_type, $email)
    {
        // verify the required parameter 'object_type' is set
        if ($object_type === null || (is_array($object_type) && count($object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_type when calling purgeByEmail'
            );
        }
        // verify the required parameter 'email' is set
        if ($email === null || (is_array($email) && count($email) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $email when calling purgeByEmail'
            );
        }

        $resourcePath = '/crm/v3/objects/gdpr/{objectType}/email/{email}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'objectType' . '}',
                ObjectSerializer::toPathValue($object_type),
                $resourcePath
            );
        }
        // path params
        if ($email !== null) {
            $resourcePath = str_replace(
                '{' . 'email' . '}',
                ObjectSerializer::toPathValue($email),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation purgeById
     *
     * DELETE
     *
     * @param  string $object_type object_type (required)
     * @param  int $object_id object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Objects\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function purgeById($object_type, $object_id)
    {
        $this->purgeByIdWithHttpInfo($object_type, $object_id);
    }

    /**
     * Operation purgeByIdWithHttpInfo
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  int $object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Objects\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function purgeByIdWithHttpInfo($object_type, $object_id)
    {
        $request = $this->purgeByIdRequest($object_type, $object_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Objects\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation purgeByIdAsync
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  int $object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purgeByIdAsync($object_type, $object_id)
    {
        return $this->purgeByIdAsyncWithHttpInfo($object_type, $object_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation purgeByIdAsyncWithHttpInfo
     *
     * DELETE
     *
     * @param  string $object_type (required)
     * @param  int $object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purgeByIdAsyncWithHttpInfo($object_type, $object_id)
    {
        $returnType = '';
        $request = $this->purgeByIdRequest($object_type, $object_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'purgeById'
     *
     * @param  string $object_type (required)
     * @param  int $object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function purgeByIdRequest($object_type, $object_id)
    {
        // verify the required parameter 'object_type' is set
        if ($object_type === null || (is_array($object_type) && count($object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_type when calling purgeById'
            );
        }
        // verify the required parameter 'object_id' is set
        if ($object_id === null || (is_array($object_id) && count($object_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_id when calling purgeById'
            );
        }

        $resourcePath = '/crm/v3/objects/gdpr/{objectType}/{objectId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'objectType' . '}',
                ObjectSerializer::toPathValue($object_type),
                $resourcePath
            );
        }
        // path params
        if ($object_id !== null) {
            $resourcePath = str_replace(
                '{' . 'objectId' . '}',
                ObjectSerializer::toPathValue($object_id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
