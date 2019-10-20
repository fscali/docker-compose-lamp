<?php


$ALIAS = 'ALIAS_WEB_00019218';
$SECRET_KEY = 'PTL1A2AJLRBOF9FCEMO5CTE4KT6ORM40';
$GROUP = 'GRP_36275';

$importo = 5000;
$divisa = 'EUR';
$requestUrl = "https://int-ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";
$codTrans = "TESTPS_" . date('YmdHis');
// Calcolo MAC
$mac = sha1('codTrans=' . $codTrans . 'divisa=' . $divisa . 'importo=' . $importo . $SECRET_KEY);
$merchantServerUrl = "http://" . $_SERVER['HTTP_HOST'] . "/xpay/php/pagamento-semplice/codice_base/";

// Parametri obbligatori
$obbligatori = array(
    'alias' => $ALIAS,
    'importo' => $importo,
    'divisa' => $divisa,
    'codTrans' => $codTrans,
    'url' => $merchantServerUrl . "esito.php",
    'url_back' => $merchantServerUrl . "annullo.php",
    'mac' => $mac,   
);

// Parametri facoltativi
$facoltativi = array(
);

$requestParams = array_merge($obbligatori, $facoltativi);

$aRequestParams = array();
foreach ($requestParams as $param => $value) {
    $aRequestParams[] = $param . "=" . $value;
}

$stringRequestParams = implode("&", $aRequestParams);

$redirectUrl = $requestUrl . "?" . $stringRequestParams;
?>

<html>
    <head></head>
    <body>
        <a href="<?php echo $redirectUrl ?>">
            <button>VAI ALLA PAGINA DI CASSA</button>
        </a>
    </body>
</html>

