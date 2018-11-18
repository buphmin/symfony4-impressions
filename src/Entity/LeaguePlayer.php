<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeaguePlayer
 *
 * @ORM\Table(name="league_player", indexes={@ORM\Index(name="league_player_league___fk", columns={"league_id"}), @ORM\Index(name="league_player_team___fk", columns={"team_id"})})
 * @ORM\Entity
 */
class LeaguePlayer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     * })
     */
    private $team;

    /**
     * @var League
     *
     * @ORM\ManyToOne(targetEntity="League")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     * })
     */
    private $league;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Player")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    private $player;

    public function getId()
    {
        return $this->id;
    }

    public function getLeague()
    {
        return $this->league;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getTeam()
    {
        return $this->team;
    }
}
