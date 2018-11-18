import http from "k6/http";
import { sleep } from "k6";

export default function() {
    http.get("http://127.0.0.1/index.php/api/league_players/1");
    sleep(1);
};