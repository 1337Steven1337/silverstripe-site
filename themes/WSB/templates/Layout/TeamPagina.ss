<img src="$Teamfoto.URL" alt="$Title foto" width="600px" height="300px">
<br/>
Welkom bij de <b>$Title</b> pagina!
<br/>


<h2>Teaminhoud:</h2>
<% loop $Spelers %>
    $getVolledigeNaam<br/>
<% end_loop %>


<h2>Teamtaken:</h2>
<% loop $Taken %>
    $getAlleNamen moeten $Taakbeschrijving $getNiceDatum om $getNiceTijd<br/>
<% end_loop %>



<h2>Traindata:</h2>
<br>
<% loop $Traindata %>
    $getDagByID($Dag) om $Tijd <br/>
<% end_loop %>


<br>
<h2>Competitie</h2>
<% loop $Competitie.Items %>
    $Value <br/>
<% end_loop %>

<br>
<h2>Rijschema</h2>
<% loop $Rijschema %>
    $Wedstrijd.getDatumNiceLang $Bestuurders <br/>
<% end_loop %>


<br>
<h2>Wedstrijden</h2>

<% loop $Wedstrijden %>
    test<br/>
<% end_loop %>