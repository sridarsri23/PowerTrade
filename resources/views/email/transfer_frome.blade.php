<h1>{{ 'Transfer Code :'.$GLOBALS['transfer_array'] ['code']. '  |  Date :'.$GLOBALS['transfer_array'] ['date']}}</h1>


        <h2>Transfer</h2>

<h3>{{ 'Agent Name :' .\App\Models\Agent::find($GLOBALS['transfer_array']['from_agent_id'])->full_name }}</h3>
<h3>{{ 'To Agent Name :' .\App\Models\Agent::find($GLOBALS['transfer_array']['to_agent_id'])->full_name }}</h3>




<h4> {{   'Note : '.$GLOBALS['transfer_array'] ['note'] }}</h4>
<?php
$fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
 echo "
<h3>    Transfer Amount (GA) : ".  $fmt->formatCurrency( $GLOBALS['transfer_array'] ['lkr'] , 'Rs ') ." </h3>

<h3>    Previous Holding Amount (PHA) : ".  $fmt->formatCurrency(   $GLOBALS['transfer_array'] ['from_agnt_pha']   , 'Rs ')."</h3>
<h3>    Total Holding Amount : ".  $fmt->formatCurrency(  ( $GLOBALS['transfer_array'] ['from_agnt_pha']  ) - ($GLOBALS['transfer_array'] ['lkr'] ) , 'Rs ')."</h3>
";

?>
