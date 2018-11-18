import http from "k6/http";
import { sleep } from "k6";


export default function() {
    http.get("http://127.0.0.1/index.php/league_players/raw/1");
    sleep(1);
};