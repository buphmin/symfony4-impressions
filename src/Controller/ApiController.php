<?php
/**
 * Created by PhpStorm.
 * User: buphmin
 * Date: 10/6/18
 * Time: 2:59 PM
 */

namespace App\Controller;


use App\Entity\LeaguePlayer;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{

    /**
     * @param integer $id
     * @param Connection $conn
     * @return JsonResponse
     * @Route(path="/league_players/raw/{id}", name="league_player_raw")
     */
    public function getLeaguePlayerRawAction($id, Connection $conn)
    {
        $sql = "
            select * from 
            league_player lp
            join league l on lp.league_id = l.id
            join player p on lp.player_id = p.id
            where lp.id = :id
        ";

        $leaguePlayers = $conn->fetchAll($sql, [
            'id' => $id
        ]);

        if (count($leaguePlayers) === 0) {
            throw new NotFoundHttpException('Player not found');
        }

        return new JsonResponse($leaguePlayers[0]);
    }

    /**
     * @param LeaguePlayer $leaguePlayer
     * @param SerializerInterface $serializer
     * @return Response
     * @Route(path="/league_players/{leaguePlayer}", name="league_player")
     */
    public function getLeaguePlayerAction(LeaguePlayer $leaguePlayer, SerializerInterface $serializer)
    {
        $data = $serializer->serialize($leaguePlayer, 'json');
        return new Response($data);
    }

}