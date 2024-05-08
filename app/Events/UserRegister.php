<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegister
{
    use Dispatchable, SerializesModels;

    /**
     * The name of the user.
     *
     * @var string
     */
    protected $name;

    /**
     * The email of the user.
     *
     * @var string
     */
    protected $email;

    /**
     * The password of the user.
     *
     * @var string
     */
    protected $password;

    /**
     * Create a new event instance.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the name of the user.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the email of the user.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the password of the user.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
