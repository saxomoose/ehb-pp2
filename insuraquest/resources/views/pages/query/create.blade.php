


<!--
    GET -> url na submit = http://127.0.0.1:8000/create?_token=xqPRPORYYRBUFzHmJvqfRWRFz3BUP4oeflKzIqcC&fire=fire&car=Car
    POST -> url na submit = http://127.0.0.1:8000/create
    -->
<form method="post" action="/create">
@csrf
    <label for="elastic-search">Ask ElasticSearch: </label>
    <input type="search" id="elastic-search" name="searchtext" aria-label="elasticsearch">
</br>
    <label for="elastic-search">Exclude:  </label>
    <input type="exclude" id="mustNot" name="excludetext" aria-label="mustNot">
        <button type="submit">Get it boy!</button>
    </br>
    <input type="checkbox" id="leven" name="leven" value="leven">
        <label for="leven"> Leven</label><br>
    <input type="checkbox" id="Nederlands" name="Nederlands" value="Nederlands">
        <label for="Nederlands"> Nederlands</label><br>
</form>

