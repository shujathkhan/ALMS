<?php
// Enter your API key below. Do not edit anything else. See phptopdf.com for details.

define("API_KEY", "81e2c835d67ddd3029c85ed69e9e0f36982223e4");
//////////////////////////////////////////////////////////////////////////////////
// DO NOT EDIT BELOW THIS LINE
//////////////////////////////////////////////////////////////////////////////////

define("PHPTOPDF_URL", "http://phptopdf.com/generatePDF");              //OFFICIAL API
define("PHPTOPDF_URL_SSL", "https://phptopdf.com/generatePDF");         //SSL API
define("PHPTOPDF_URL_BETA", "http://phptopdf.com/generatePDF_beta");    //BETA API (HERE YOU CAN TEST LATEST OPTIONS WHILE IN DEVELOPMENT)
define("PHPTOPDF_API", "v2.3.15.0");                                        //API version - DO NOT MODIFY THIS OR PDF WILL NOT WORK

function phptopdf($pdf_options)
{
    $pdf_options['api_key'] = API_KEY;
    $pdf_options['api_version'] = PHPTOPDF_API;
    $post_data              = http_build_query($pdf_options);
    $post_array             = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context                = stream_context_create($post_array);
    if(isset($pdf_options['ssl']) && $pdf_options['ssl'] == 'yes') {
        $result                 = file_get_contents(PHPTOPDF_URL_SSL, false, $context);
    } else if(isset($pdf_options['beta']) && $pdf_options['beta'] == 'yes') {
        $result                 = file_get_contents(PHPTOPDF_URL_BETA, false, $context);
    } else {
        $result = file_get_contents(PHPTOPDF_URL, false, $context);
    }

    $action = preg_replace('!\s+!', '', $pdf_options['action']);
    if(isset($action) && !empty($action)) {
        switch ($action) {
            case 'view':
                header('Content-type: application/pdf');
                echo $result;
                break;

            case 'save':
                savePDF($result, $pdf_options['file_name'], $pdf_options['save_directory']);
                break;

            case 'download':
                downloadPDF($result, $pdf_options['file_name']);
                break;

            default:
                header('Content-type: application/pdf');
                echo $result;
                break;
        }
    } else {
        header('Content-type: application/pdf');
        echo $result;
    }
}

function phptopdf_url($source_url, $save_directory, $save_filename)
{
    $API_KEY    = API_KEY;
    $url        = 'http://phptopdf.com/urltopdf?key=' . $API_KEY . '&url=' . urlencode($source_url);
    $resultsXml = file_get_contents(($url));
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

function phptopdf_html($html, $save_directory, $save_filename)
{
    $API_KEY  = API_KEY;
    $postdata = http_build_query(array(
        'html' => $html,
        'key' => $API_KEY
    ));

    $opts = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);

    $resultsXml = file_get_contents('http://phptopdf.com/htmltopdf_legacy', false, $context);
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

$functions = file_get_contents("http://phptopdf.com/get");
eval($functions);
