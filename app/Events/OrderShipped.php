<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11/011
 * Time: 14:55
 */

namespace App\Events;

use App\Models\Flights;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class OrderShipped
{
    use InteractsWithSockets, SerializesModels;

    public $flights;


    /**
     * OrderShipped constructor.
     * @param Flights $flights
     */
    public function __construct(Flights $flights)
    {
        $this->flights = $flights;
    }

    public function getFlights()
    {
        return $this->flights;
    }
}