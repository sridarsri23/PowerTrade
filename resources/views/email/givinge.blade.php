<h1>{{ 'Giving Code :'.$GLOBALS['giving_array'] ['code']. '  |  Date :'.$GLOBALS['giving_array'] ['date']}}</h1>


        <h2>Giving</h2>

<h3>{{ 'Agent Name :' .\App\Models\Agent::find($GLOBALS['giving_array']['agent_id'])->full_name }}</h3>
<h3>{{ 'Agent Payment Details:' .$GLOBALS['giving_array']['agent_bank_acc'] }}</h3>



<h4> {{   'Note : '.$GLOBALS['giving_array'] ['note'] }}</h4>
<?php
$fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
 echo "
<h3>    Giving Amount (GA) : ".  $fmt->formatCurrency( $GLOBALS['giving_array'] ['lkr'] , 'Rs ') ." </h3>

<h3>    Previous Holding Amount (PHA) : ".  $fmt->formatCurrency(   $GLOBALS['giving_array'] ['pha']   , 'Rs ')."</h3>
<h3>    Total Holding Amount : ".  $fmt->formatCurrency(  ( $GLOBALS['giving_array'] ['pha']  ) + ($GLOBALS['giving_array'] ['lkr'] ) , 'Rs ')."</h3>
";

?>
