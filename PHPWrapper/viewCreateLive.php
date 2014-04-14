<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>
            <form action="" method="POST">
                <p>broadcaster id: <input type="text" name="bid"> <p>
                <p>apikey: <input type="text" name="apikey"> <p>
                <p>title: <input type="text" name="title"> <p>
                <p>description: <input type="text" name="description"> <p>
                <p>custom data: <input type="text" name="customData"> <p>
                <p>Online: <select>
                        <option value="0" name="stream_type" selected="true"  >Channel Offline</option>
                        <option value="1" name="stream_type">Channel Online</option>
                    </select> 
                <p>stream_type
                    <select>
                        <option value="1"selected="true"name="stream_type">video Live</option>
                        <option value="3"name="stream_type"  >radio Live</option>
                    </select> 
                <p>
                <p>backup URL: <input type="text" name="backupUrl"> <p>
                <p>stream category: <select>
                        <option value="1"name="stream_category" >Animals</option>
                        <option value="2" name="stream_category" >Comedy</option>
                        <option value="3" name="stream_category" >Education</option>
                        <option value="4" name="stream_category" >Entertainement</option>
                        <option value="5" name="stream_category" >Film</option>
                        <option value="6" name="stream_category" >Gaming<option>
                        <option value="7" name="stream_category" >Life</option>
                        <option value="8" name="stream_category" >Music</option>
                        <option value="9" name="stream_category" >News</option>
                        <option value="10" name="stream_category" >People</option>
                        <option value="11" name="stream_category" >Politics</option>
                        <option value="13" name="stream_category" >Sports</option>
                        <option value="14" name="stream_category" >Technology</option>
                        <option value="15" name="stream_category" >Travel</option>
                        <option value="16" name="stream_category" >Shows</option>
                        <option value="17" name="stream_category" >Events</option>
                        <option value="19" name="stream_category" >Faith</option>
                        <option value="20" name="stream_category" selected="true"  >Default</option>
                    </select> 
                <p>activateChat: <input type="" name="activateChat"> <p>
                <p>autoplay: <select>
                        <option value="1" name="stream_type" >Enable</option>
                        <option value="0" name="stream_type" selected="true" >Disable</option>
                    </select>
                <p>publish on dacast: <select>
                        <option value="1" name="stream_type" selected="true">Enable</option>
                        <option value="0" name="stream_type" >Disable (require to set external video page)</option>
                    </select>
                <p>external video page: <input type="text" name="external_video_page"> <p>
                <p>player_width: <input type="number" name="player_width"> <p>
                <p>player_height: <input type="number" name="player_height"> <p>
                <p>countries_id: <input type="number" name="countries_id"> <p>
                <p>referers_id: <input type="number" name="referers_id"> <p>
                <p><input type="submit" value="Submit"></p>



            </form>
        </div>
    </body>
</html>