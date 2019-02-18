<?php

#fix for CVE-2018-7600 vulnerability
$_GET = @CVEFIX($_GET);
$_POST = @CVEFIX($_POST);
$_COOKIE = @CVEFIX($_COOKIE);
$_REQUEST = @CVEFIX($_REQUEST);

function CVEFIX($input) {
    foreach ($input as $key => $value) {
        if ($key !== '' && $key[0] === '#') { unset($input[$key]); }
        else { $input[$key] = @CVEFIX($input[$key]); }
    }
    return $input;
}


/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

$autoloader = require_once 'autoload.php';

$kernel = new DrupalKernel('prod', $autoloader);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
