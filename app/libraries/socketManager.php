<?php

namespace app\libraries;
use socket_accept;
use socket_create;

class socketManager
{
    protected $address;
    protected $port;
    protected $timeLimit;
    protected $sock;
    protected $msgSock;
    protected $buf;
    public function __construct()
    {
        // error_reporting(E_ALL);
    }
    public function config($address, $port)
    {
        $this->setPort($port);
        $this->setAddress($address);
    }
    public function setAddress($address)
    {
        if (!empty($address)) {
            $this->address = $address;
        }
    }
    public function setPort($port)
    {
        if (!empty($port)) {
            $this->port = $port;
        }
    }
    public function getPort()
    {
        return $this->port;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setTimeLimit($limit)
    {
        if (!empty($limit)) {
            set_time_limit($limit);
            $this->timeLimit = $limit;
        }
    }
    public function getTimeLimit()
    {
        return $this->timeLimit;
    }
    public function setMsgSock($msg)
    {
        if (!empty($msg)) {
            set_time_limit($msg);
            $this->msgSock = $msg;
        }
    }
    public function getMsgSock()
    {
        return $this->msgSock;
    }
    public function getSock()
    {
        return $this->sock;
    }

    public function create()
    {
        if (($this->sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
            echo "socket_create() failed : reason: " . socket_strerror(socket_last_error()) . "\n";
        }
    }
    public function bind()
    {
        if (socket_bind($this->getSock(), $this->getAddress(), $this->getPort()) === false) {
            echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($this->getSock())) . "\n";
        }
    }
    public function listen()
    {
        if (socket_listen($this->getSock(), 5)) {
            echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($this->getSock())) . "\n";
        }
    }
    public function init()
    {
        ob_implicit_flush();
        $this->create();
        $this->bind();
        $this->listen();

        do {
            if (($this->msgSock = socket_accept($this->getSock())) === false) {
                echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($this->getSock())) . "\n";
                break;
            }
            /* Send instructions. */
            $msg = "\nWelcome to the PHP Test Server. \n" .
                "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";
            socket_write($this->msgSock, $msg, strlen($msg));
            do {
                if (false === ($this->buf = socket_read($this->msgSock, 2048, PHP_NORMAL_READ))) {
                    echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($this->getSock())) . "\n";
                    break 2;
                }
                if (!$this->buf = trim($this->buf)) {
                    continue;
                }
                if ($this->buf == 'quit') {
                    break;
                }
                if ($this->buf == 'shutdown') {
                    socket_close($this->msgSock);
                    break 2;
                }
                $talkback = "PHP: You said '$this->buf'.\n";
                socket_write($this->msgSock, $talkback, strlen($talkback));
                echo "$this->buf\n";
            } while (true);
        } while (true);
    }
}
