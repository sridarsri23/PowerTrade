<h1>{{ 'Giving Code :'.$GLOBALS['receiving_array'] ['code']. '  |  Date :'.$GLOBALS['receiving_array'] ['date']}}</h1>


        <h2>Received</h2>

<h3>{{ 'Agent Name :' .\App\Models\Agent::find($GLOBALS['receiving_array']['agent_id'])->full_name }}</h3>



<h4> {{   'Note : '.$GLOBALS['receiving_array'] ['note'] }}</h4>
<?php
$fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
 echo "
<h3>    Received Amount (RA) : ".  $fmt->formatCurrency( $GLOBALS['receiving_array'] ['lkr'] , 'Rs ') ." </h3>
<h3>    Transport Charge (TC) : ".  $fmt->formatCurrency( $GLOBALS['receiving_array'] ['kooli'] , 'Rs ') ." </h3>
<h3>    Total Charge (RA + TC) : ".  $fmt->formatCurrency( ($GLOBALS['receiving_array'] ['kooli'] + $GLOBALS['receiving_array'] ['lkr'] ) , 'Rs ') ." </h3>

<h3>    Previous Holding Amount (PHA) : ".  $fmt->formatCurrency(   $GLOBALS['receiving_array'] ['pha']   , 'Rs ')."</h3>
<h3>    Total Holding Amount : ".  $fmt->formatCurrency(  ( $GLOBALS['receiving_array'] ['pha']  ) - ($GLOBALS['receiving_array'] ['kooli'] + $GLOBALS['receiving_array'] ['lkr'] ) , 'Rs ')."</h3>
";

?>
