<header>
    <!--header start here-->
    <div class="header">
        <div class="container">
            <div class="header-main">

                <div class="mob-nav">
                    <div id="menu-icon"></div>
                    <div class="wsbheader">WSB Apeldoorn</div>
                    <ul id="navitems">
                        <% loop $Menu(1) %>
                                <li><a href="$Link" data-hover="$MenuTitle">$MenuTitle</a></li>
                        <% end_loop %>
                    </ul>
                </div>

                <div class="top-menu">
                    <nav class="cl-effect-13">
                        <ul>
                            <% loop $Menu(1) %>
                                <% if Pos == 3%>
                                    <li><a href="$Link" data-hover="$MenuTitle">$MenuTitle</a></li>
                                    <li><a href="/"> <img src="$ThemeDir/images/WsbLogo.jpg" alt=""> </a></li>
                                <% else %>
                                    <li><a href="$Link" data-hover="$MenuTitle">$MenuTitle</a></li>
                                <% end_if %>
                            <% end_loop %>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--header end here-->
</header>
