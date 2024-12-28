<h1>{{ 'Day End Code :'. $GLOBALS['settle_order_array'] ['code']. '  |  Date :'. $GLOBALS['settle_order_array'] ['date']}}</h1>




<h3>{{ 'Agent Name :' .\App\Models\Agent::find($GLOBALS['settle_order_array'] ['agent_id'])->full_name }}</h3>
<h3>{{ 'Agent Payment Details:' .$GLOBALS['settle_order_array'] ['agent_bank_acc'] }}</h3>
<h2 align="center">Orders</h2>
        <table border="1">
        <?php


            echo '<tr>
                        <th> Client Name</th> <th>Client Payment Detail</th> <th> Amount</th> <th> Commission</th>
                   </tr>
    ';
                
        foreach (  $GLOBALS['settle_order_array']  as $index => $order) {

                 if (strpos((string)$index, 'ord') !== false) {
              $orderr = \App\Models\Order::find($order);



                     $fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
            echo '<tr>
                <td>'.\App\Models\Client::find($orderr->client_id)->full_name.'</td>
                <td>'.$orderr->client_bank_acc .'</td>
                <td>'.

                  $fmt->formatCurrency( $orderr->to_currency_amount, "Rs ")
                   .'</td>
                <td>'. $fmt->formatCurrency( $orderr-> comission_amount, "Rs ").'</td>
            </tr>
            ';

                      }
                }
            ?>

        </table>

<h4> {{   'Note : '.$GLOBALS['settle_order_array'] ['note'] }}</h4>

<h3> {{   'Total Orders Amount : '.  $fmt->formatCurrency( $GLOBALS['settle_order_array'] ['total_lkr'] , "Rs ")}}</h3>
<h3> {{   'Total Commission : '.  $fmt->formatCurrency( $GLOBALS['settle_order_array'] ['total_cmn'], "Rs ") }}</h3>
<h2> {{   'Total Day End Amount (TDEA) : '.  $fmt->formatCurrency( ($GLOBALS['settle_order_array'] ['total_cmn'] + $GLOBALS['settle_order_array'] ['total_lkr'] ), "Rs ") }}</h2>
<h3> {{   'Previous Holding Amount (PHA) : '.  $fmt->formatCurrency( $GLOBALS['settle_order_array'] ['pha']  , "Rs ")}}</h3>
<h3> {{   'PHA - TDEA (Amount Payable): '.  $fmt->formatCurrency(  ( $GLOBALS['settle_order_array'] ['pha'] ) - ($GLOBALS['settle_order_array'] ['total_cmn'] + $GLOBALS['settle_order_array'] ['total_lkr'] ) , "Rs ")}}</h3>



