<?php

/*
 * Copyright (c) 2016 PIXEL FEDERATION, s.r.o.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the PIXEL FEDERATION, s.r.o. nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL PIXEL FEDERATION, s.r.o. BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Druid\Driver\Guzzle5;

use Druid\Driver\DriverConnectionInterface;
use Druid\Driver\ResponseInterface;
use Druid\Query\QueryInterface;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;

/**
 * Class Connection.
 */
class Connection implements DriverConnectionInterface
{
    /**
     * @var Client
     */
    private $guzzle;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Connection constructor.
     *
     * @param Client              $guzzle
     * @param SerializerInterface $serializer
     */
    public function __construct(Client $guzzle, SerializerInterface $serializer)
    {
        $this->guzzle = $guzzle;
        $this->serializer = $serializer;
    }

    /**
     * @param QueryInterface $query
     *
     * @return ResponseInterface
     */
    public function send(QueryInterface $query)
    {
        $body = $this->serializer->serialize($query, 'json');
        $response = $this->guzzle->post('', ['body' => $body]);

        return new Response($response);
    }
}
