<?php

namespace App\Services;

class NotificationService
{
    public function success($message)
    {
        return $this->notify('success', $message);
    }

    public function error($message)
    {
        return $this->notify('error', $message);
    }

    public function canceled($message)
    {
        return $this->notify('canceled', $message);
    }

    public function info($message)
    {
        return $this->notify('info', $message);
    }

    protected function notify($type, $message)
    {
        $validTypes = ['success', 'error', 'canceled', 'info'];
        if (!in_array($type, $validTypes)) {
            throw new \InvalidArgumentException('Invalid notification type');
        }
        session()->flash($type, $message);
    }
}
