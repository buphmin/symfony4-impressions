import http from "k6/http";
import { sleep } from "k6";

export let options = {
    vus: 100,
    duration: "30s"
};

export default function() {
    http.get("http://127.0.0.1/index.php/league_players/raw/1");
    sleep(1);
};