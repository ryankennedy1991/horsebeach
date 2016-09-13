                    <div class="sidebar_navigation gradient">
                        <ul>
                            <li class="
                            @if ($current_page == 1)
                                active
                            @endif

                            tip-right" title="Dashboard">
                                <a href="{{ url('/dashboard') }}" class="i_dashboard">
                                    <span class="tab_label">Dashboard</span>
                                    <span class="tab_info">General info</span>
                                </a>
                            </li>

                            <li class="
                            @if ($current_page == 2)
                                active
                            @endif

                            tip-right" title="Calendar">
                                <a href="{{ url('/events') }}" class="i_dashboard">
                                    <span class="tab_label">Calendar</span>
                                    <span class="tab_info">Gigs</span>
                                </a>
                            </li>


                        </ul>
                    </div>

