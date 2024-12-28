          <div id="top_left_DIV" class="fluid">
                              <div id="logo_DIV" class="fluid">{!!HTML::image('images/logo.png', null, null)!!}</div>
                              <div id="project_name_DIV" class="fluid" style="margin-top: 50px;"><h2>Dilan Trading System</h2></div>
                    </div>
                     <div id="top_right_divi" class="fluid">
                    <div id="top_right_top_divi" class="fluid">
                       <div id="top_right_top_top_divi" class="fluid"> @yield('top_right_top_top_divi')</div>
                        <div id="top_right_top_bottom_divi" class="fluid"> @yield('top_right_top_bottom_divi')

                            {{--
                            {!!  link_to_route('language.select', 'English', array('en'))!!}

                            {!!link_to_route('language.select', 'Sinhala', array('si'))!!}

                            --}}


                            <div id="clock" class="light">
                                <div class="display">
                                    <div class="weekdays"></div>
                                    <div class="ampm"></div>
                                    <div class="digits"></div>
                                </div>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
                            <script src="{!!URL::to('js/script.js')!!}"></script>


                              {!! 
                                 'Welcome, '. Auth::user()->name
                              !!}
                              <a href="{!!URL::to('logout')!!}" class="btn">Logout</a>
                        </div>
                    
                    </div>
                    <div id="top_right_bottom_divi" class="fluid">@yield('top_right_bottom_divi')</div>
                    </div>

