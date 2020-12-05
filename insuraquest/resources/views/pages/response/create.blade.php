


<!--
    GET -> url na submit = http://127.0.0.1:8000/create?_token=xqPRPORYYRBUFzHmJvqfRWRFz3BUP4oeflKzIqcC&fire=fire&car=Car
    POST -> url na submit = http://127.0.0.1:8000/create
    -->
<form method="post" action="/create">
@csrf

            <label for="elastic-search">Ask ElasticSearch: </label>

<input type="search" id="elastic-search" 

       aria-label="elasticsearch">

    <button type="submit">Get it boy!</button>

</br>

    <input type="checkbox" id="fire" name="fire" value="fire">

<label for="fire"> fire</label><br>

<input type="checkbox" id="car" name="car" value="Car">

<label for="car"> car</label><br>

</form>

