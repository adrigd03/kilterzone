<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NouComentari implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private int $ruta_id;
    private Object $comentari;
    private User $user;
    private mixed $comentari_id;
    public function __construct(int $ruta_id, Object $comentari, User $user, int $comentari_id = null)
    {
        $this->ruta_id = $ruta_id;
        $this->comentari = $comentari;
        $this->user = $user;
        $this->comentari_id = $comentari_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('ruta.' . $this->ruta_id)
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'nouComentari' => $this->comentari,
            'user' => $this->user->only(['username', 'avatar', 'id']),
            'comentari_id' => $this->comentari_id
        ];
    }

    public function broadcastAs()
    {
        return 'NouComentari';
    }
}
