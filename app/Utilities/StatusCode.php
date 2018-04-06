<?php

namespace App\Utilities;

class StatusCode
{

    //code success
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NONAUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;

    //code client error
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    const HTTP_REQUEST_TIMEOUT = 408;
    const HTTP_CONFLICT = 409;
    const HTTP_GONE = 410;
    const HTTP_LENGTH_REQUIRED = 411;
    const HTTP_PRECONDITION_FAILED = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    const HTTP_REQUEST_URI_TOO_LONG = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const HTTP_EXPECTATION_FAILED = 417;
    const HTTP_UNPROCESSABLE_ENTITY = 422;

    //code internal error
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;

    public function ok()
    {
        return self::HTTP_OK;
    }

    public function created()
    {
        return self::HTTP_CREATED;
    }

    public function accepted()
    {
        return self::HTTP_ACCEPTED;
    }

    public function nonAuthInformation()
    {
        return self::HTTP_NONAUTHORITATIVE_INFORMATION;
    }

    public function unprocessableEntity()
    {
        return self::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function noContent()
    {
        return self::HTTP_NO_CONTENT;
    }

    public function resetContent()
    {
        return self::HTTP_RESET_CONTENT;
    }

    public function partialContent()
    {
        return self::HTTP_PARTIAL_CONTENT;
    }

    public function badRequest()
    {
        return self::HTTP_BAD_REQUEST;
    }

    public function unauthorized()
    {
        return self::HTTP_UNAUTHORIZED;
    }

    public function paymentRequired()
    {
        return self::HTTP_PAYMENT_REQUIRED;
    }

    public function forbidden()
    {
        return self::HTTP_FORBIDDEN;
    }

    public function notFound()
    {
        return self::HTTP_NOT_FOUND;
    }

    public function methodNotAllowed()
    {
        return self::HTTP_METHOD_NOT_ALLOWED;
    }

    public function notAcceptable()
    {
        return self::HTTP_NOT_ACCEPTABLE;
    }

    public function proxyAutentication()
    {
        return self::HTTP_PROXY_AUTHENTICATION_REQUIRED;
    }

    public function requestTimeout()
    {
        return self::HTTP_REQUEST_TIMEOUT;
    }

    public function conflict()
    {
        return self::HTTP_CONFLICT;
    }

    public function gone()
    {
        return self::HTTP_GONE;
    }

    public function lengthRequired()
    {
        return self::HTTP_LENGTH_REQUIRED;
    }

    public function preconditionFail()
    {
        return self::HTTP_PRECONDITION_FAILED;
    }

    public function requestEntityTooLarge()
    {
        return self::HTTP_REQUEST_ENTITY_TOO_LARGE;
    }

    public function requestUriTooLong()
    {
        return self::HTTP_REQUEST_URI_TOO_LONG;
    }

    public function unsupportedType()
    {
        return self::HTTP_UNSUPPORTED_MEDIA_TYPE;
    }

    public function notSatisfiable()
    {
        return self::HTTP_REQUESTED_RANGE_NOT_SATISFIABLE;
    }

    public function expectationFailed()
    {
        return self::HTTP_EXPECTATION_FAILED;
    }

    public function inServerError()
    {
        return self::HTTP_INTERNAL_SERVER_ERROR;
    }

    public function notImplemented()
    {
        return self::HTTP_NOT_IMPLEMENTED;
    }

    public function badGateway()
    {
        return self::HTTP_BAD_GATEWAY;
    }

    public function unavailable()
    {
        return self::HTTP_SERVICE_UNAVAILABLE;
    }

    public function gatewayTimeout()
    {
        return self::HTTP_GATEWAY_TIMEOUT;
    }

    public function notSupported()
    {
        return self::HTTP_VERSION_NOT_SUPPORTED;
    }


}