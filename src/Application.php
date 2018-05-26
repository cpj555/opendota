<?php

namespace OpenDota;

use OpenDota\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \OpenDota\Matches\MacthesClient $matches
 * @property \OpenDota\Matches\ProMatchesClient $promatches
 * @property \OpenDota\Matches\PublicMatchesClient $publicmatches
 * @property \OpenDota\Players\PlayersClient $players
 * @property \OpenDota\Players\ProPlayersClient $proplayers
 * @property \OpenDota\Explore\Client $explore
 * @property \OpenDota\Metadata\Client $metadata
 * @property \OpenDota\Distributions\Client $distributions
 * @property \OpenDota\Search\Client $search
 * @property \OpenDota\Rankings\Client $ranking
 * @property \OpenDota\Benchmarks\Client $benchmarks
 * @property \OpenDota\Status\Client $status
 * @property \OpenDota\Health\Client $health
 * @property \OpenDota\ORequest\Client $orequest
 * @property \OpenDota\Heroes\Client $heroes
 * @property \OpenDota\Leagues\Client $leagues
 * @property \OpenDota\Teams\Client $teams
 * @property \OpenDota\Replays\Client $replays
 * @property \OpenDota\Records\Client $records
 * @property \OpenDota\Live\Client $live
 * @property \OpenDota\Scenarios\Client $scenarios
 * @property \OpenDota\Schema\Client $schema
 *
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Matches\ServiceProvider::class,
        Players\ServiceProvider::class,
        Explore\ServiceProvider::class,
        Metadata\ServiceProvider::class,
        Distributions\ServiceProvider::class,
        Search\ServiceProvider::class,
        Rankings\ServiceProvider::class,
        Benchmarks\ServiceProvider::class,
        Status\ServiceProvider::class,
        Health\ServiceProvider::class,
        ORequest\ServiceProvider::class,
        Heroes\ServiceProvider::class,
        Leagues\ServiceProvider::class,
        Teams\ServiceProvider::class,
        Replays\ServiceProvider::class,
        Records\ServiceProvider::class,
        Live\ServiceProvider::class,
        Scenarios\ServiceProvider::class,
        Schema\ServiceProvider::class
    ];
}