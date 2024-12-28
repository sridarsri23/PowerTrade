<h1>{{ 'Day End Code :'. $GLOBALS['settle_order_array'] ['code']. 'Date :'. $GLOBALS['settle_order_array'] ['date']}}!</h1>

<p>We'd like to personally welcome you to the Laravel 4 Authentication Application. Thank you for registering!</p>



        <h2>Orders</h2>



        <>
        <?php


            echo '<div class="display_table_master_row">';

        foreach (  $GLOBALS['settle_order_array']  as $index => $order) {

                 if (strpos((string)$index, 'ord') !== false) {


            ?>

                    {{  $orderr = \App\Models\Order::find($order) }}
                <div class="display_table_row">


                    <div class="display_table_row_data" contenteditable>

                        <div class="display_table_heading_cell">
                            Client Name</div>
                        <div class="display_table_data_cell">
                            {!! \App\Models\Client::find($orderr->client_id)->full_name !!}
                        </div>


                    </div>

                    <div class="display_table_row_data" contenteditable>

                        <div class="display_table_heading_cell">
                            Bank & Account

                        </div>
                        <div class="display_table_data_cell">

                            {!! $orderr->client_bank_acc !!}

                        </div>


                    </div>
                    <div class="display_table_row_data" contenteditable>

                        <div class="display_table_heading_cell">
                            Amount

                        </div>
                        <div class="display_table_data_cell">

                            {!! $orderr->to_currency_amount !!}

                        </div>


                    </div>



                </div>

        <?php

                      }
                }
            ?>

            </div>

    </div>

