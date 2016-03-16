<?php

namespace Javlon\Logger;

class Logger
{
    private $logger;

    /**
     * Logger constructor.
     * @param $logger
     */
    public function __construct(LoggerInterfaceger $logger = null)
    {
        $this->logger = $logger;
    }

    public function log($data)
    {
        if ($this->logger) {
            $this->logger->info("log");
        }
    }
}
