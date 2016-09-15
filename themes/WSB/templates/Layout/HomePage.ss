<!-- wedstrijden -->
<div id="games" class="games">
    <div class="games-left">
        <div class="games-left-info">
            <div class="games-left-text">
                <h3>Wedstrijden</h3>
            </div>
            <% if $AankomendeWedstrijden %>
                <% loop $AankomendeWedstrijden %>
                    <div class="col-md-6 games-grid">
                        $Team.Title
                        <h6>$getDatumNiceLang om $getDisplayTijd</h6>
                        <div class="games-info">
                            <p>$getVerhaaltje</p>
                        </div>
                        <% if $Team.Teamfoto %>
                            $Team.Teamfoto.setWidth(317)
                        <% else %>
                            <img src="$ThemeDir/images/empty.png" width="317" height="165" alt="">
                        <% end_if %>

                    </div>
                <% end_loop %>
            <% else %>
                <b>Er wordt voorlopig geen wedstrijd gespeeld!</b>
            <% end_if %>
            <div class="rules-grids">



                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="games-right">
        <div class="games-left-info event-left-info">
            <div class="games-left-text event-left-text">
                <h3>Evenementen</h3>
            </div>
            <div class="event-grids">
                <div class="event-grid">
                    <h4>Pellentesque bibendum</h4>
                    <h6>09.00 - 11.00 | Jun 09,2014</h6>
                    <p>Duis sollicitudin vulputate felis sed iaculis. In faucibus mauris sit amet dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                </div>
                <div class="event-grid">
                    <h4>Vestibulum id lorem sit</h4>
                    <h6>09.00 - 11.00 | Jun 09,2014</h6>
                    <p>Duis sollicitudin vulputate felis sed iaculis. In faucibus mauris sit amet dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- //wedstrijden -->




<!-- Nieuws -->
<div class="news">
    <!-- container-wrap -->
    <div class="container-wrap">
        <h4>Nieuws</h4>
        <div class="news-grids">

            <% loop $NieuwsArtikelen %>


                <div class="col-md-3 news-grid">
                    <% if $FeaturedImage %>
                        $FeaturedImage.setHeight(400).PaddedImage(400,400,FFFFFF)
                    <% else %>
                        <img src="themes/WSB/images/WsbLogo.jpg" height="317" alt="WSBLogo">
                    <% end_if %>
                    <h6><a href="$Link">$Title</a></h6>
                    <p>
                        <% if $Summary %>
                            $Summary
                        <% else %>
                            <p>$Excerpt</p>
                        <% end_if %>
                        <a href="$Link" style="float:right;">
                            Lees verder &raquo;
                        </a>
                    </p>
                </div>

            <% end_loop %>

            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //container-wrap -->
</div>
<!-- //about-team -->




<!-- about -->
<div class="about">
    <!-- container-wrap -->
    <div class="container-wrap">
        <div class="about-grids">
            <div class="col-md-6 about-left">
                <h2>Ontdek beeball</h2>
                <h4>Beeball is een stoer, flitsend en leuk spel voor kinderen, jongens en meiden van 5 tot 10 jaar.</h4>
                <p>Als u geïnteresseerd bent in beeball voor uw zoon en/of dochter bekijk dan onze pagina. Deze pagina zal u voorzien van alle informatie die u nodig heeft van beeball, en zo niet dan kunt u altijd contact opnemen met ons. </p>
                <span class="beeball-url"><a href="http://wsbapeldoorn.nl/beeball">Beeball pagina &raquo;</a></span>
            </div>
            <div class="col-md-6 about-right">
                <img src="$ThemeDir/images/2.png" alt="" />
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //container-wrap -->
</div>
<!-- //about -->





