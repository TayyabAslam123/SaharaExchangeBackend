<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support_ticket';

    public function info()
    {
        return $this->hasmany('App\Ticketinfo','ticket_id');
    }
}
