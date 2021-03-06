<?php
// Jivoo HTTP
// Copyright (c) 2016 Niels Sonnich Poulsen (http://nielssp.dk)
// Licensed under the MIT license.
// See the LICENSE file or http://opensource.org/licenses/MIT for more information.
namespace Jivoo\Http;

/**
 * Thrown when headers have already been sent.
 */
class HeadersSentException extends \RuntimeException implements \Jivoo\Exception
{
}
