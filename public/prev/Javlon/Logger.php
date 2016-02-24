<?php

namespace Javlon;

class Logger
{
    private $logger;

    /**
     * Logger constructor.
     * @param LoggerInterfaceger|null $logger
     */
    public function __construct(LoggerInterfaceger $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * @param $data
     */
    public function log($data)
    {
        if ($this->logger) {
            $this->logger->info("log");
        }
    }
}
